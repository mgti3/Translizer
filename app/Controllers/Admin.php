<?php
namespace App\Controllers;

use App\Models\addEmployeeModel;
use App\Models\usersModel;
use App\Models\teamModel;
use App\Models\managersModel;


class Admin extends BaseController
{
    public function dashboard(): string
    {
        $usersModel = new usersModel();
        $managersModel = new managersModel();

        // جمع عدد الموظفين من جدول users
        $employeesCount = $usersModel->countAll();

        // جمع عدد المديرين من جدول managers
        $managersCount = $managersModel->countAll();

        // مجموع عدد الموظفين والمديرين
        $totalEmployeesCount = $employeesCount + $managersCount;

        // إرسال النتيجة إلى الفيو
        return view("admin_dashboard", ['totalEmployeesCount' => $totalEmployeesCount]);
    }

    public function adminTeamManagement(): string
    {
        return view("admin_team_management");
    }

    public function adminEmployeesManagement()
    {
        $teamsModel = new teamModel();
        $data['departments'] = $teamsModel->findAll();

        $usersModel = new usersModel();
        $data['employees'] = $usersModel->findAll();

        // Load the managers model
        $managersModel = new managersModel();
        $data['managers'] = $managersModel->findAll();

        // Loop through the employees to fetch and attach the manager's name
        foreach ($data['employees'] as &$employee) {
            foreach ($data['managers'] as $manager) {
                if ($manager['Team_id'] == $employee['Team_id']) {
                    $employee['manager_name'] = $manager['username'];
                    break;
                }
            }
            // If no manager is found, assign a default value
            if (!isset($employee['manager_name'])) {
                $employee['manager_name'] = "No manager assigned";
            }
        }


    return view("admin_employees_management", $data);
    }


    public function addEmployee()
    {
        $teamModel = new teamModel();
        $managersModel = new managersModel();
        $usersModel = new usersModel();
        $data['departments'] = $teamModel->findAll();
        $data['managers'] = $managersModel->findAll(); // جلب جميع المدراء
        $data['employees'] = $usersModel->findAll(); // جلب جميع الموظفين

        if ($this->request->getMethod() === 'POST') {
            $operation = $this->request->getPost('operation');
            $user_id = $this->request->getPost('user_id');

            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'Role' => $this->request->getPost('Role'),
                'Team_id' => $this->request->getPost('dep')
            ];

            if ($operation === 'edit' && !empty($user_id)) {
                // منطق تحديث البيانات إذا كانت عملية تعديل
                if ($userData['Role'] == 4) {
                    if ($usersModel->find($user_id)) {
                        $usersModel->delete($user_id);
                        $managersModel->insert($userData);
                    } else {
                        $managersModel->update($user_id, $userData);
                    }
                } else {
                    if ($managersModel->find($user_id)) {
                        $managersModel->delete($user_id);
                        $usersModel->insert($userData);
                    } else {
                        $usersModel->update($user_id, $userData);
                    }
                }
            } else {
                // منطق إضافة بيانات جديدة
                if ($userData['Role'] == 4) {
                    if ($managersModel->insert($userData)) {
                        return view('admin_employees_management', $data);
                    } else {
                        return "Error occurred while adding manager.";
                    }
                } else {
                    if ($usersModel->insert($userData)) {
                        return view('admin_employees_management', $data);
                    } else {
                        return "Error occurred while adding employee.";
                    }
                }
            }
        }

        return view('admin_employees_management', $data);
    }


    public function __construct()
    {
        $this->teamModel = new teamModel();
    }

    public function addTeam()
    {
        $teamModel = new teamModel();
        $userModel = new usersModel();
        $managersModel = new managersModel();

        $data['teams'] = $teamModel->findAll();

        // Load helper functions for form and URL handling
        helper(['form', 'url']);

        // Check if the request method is POST
        if ($this->request->getMethod() === 'POST') {
            // Get form data
            $teamName = $this->request->getPost('teamName');

            // Prepare data for insertion
            $addTeam = [
                'Team_name' => $teamName,
            ];

            // Insert data into the teams table
            $teamModel->insert($addTeam);

            // Redirect to a success page or login page
            return redirect()->to(base_url('admin_team_management'))->with('success', 'Team added successfully.');
        }

        $data['managers'] = [];
        foreach ($data['teams'] as $team) {
            $managerName = $managersModel->where('Team_id', $team['Tid'])->first();
            if ($managerName) {
                $data['managers'][$team['Tid']] = $managerName['username'];
            } else {
                $data['managers'][$team['Tid']] = null;
            }
        }

        $data['employees'] = [];
        foreach ($data['teams'] as $team) {
            $employees = $userModel->where('Role', 1)->where('Team_id', $team['Tid'])->findAll();
            $data['employees'][$team['Tid']] = $employees;
        }

        return view('admin_team_management', $data);
    }



    public function deleteUser($userId)
    {
        // Check if user is logged in and has appropriate permissions
        // You can implement your authentication and authorization logic here

        // Load necessary models
        $userModel = new usersModel();
        $managerModel = new managersModel();

        // Check if the user exists in the users table
        $user = $userModel->find($userId);
        if ($user) {
            // Delete the user
            $userModel->delete($userId);
            // Redirect to appropriate page after deletion
            return redirect()->to(base_url('admin_employees_management'))->with('success', 'User deleted successfully.');
        }

        // Check if the user exists in the managers table
        $manager = $managerModel->find($userId);
        if ($manager) {
            // Delete the manager
            $managerModel->delete($userId);
            // Redirect to appropriate page after deletion
            return redirect()->to(base_url('admin_employees_management'))->with('success', 'Manager deleted successfully.');
        }

        // If user doesn't exist in either tables, redirect with error
        return redirect()->to(base_url('admin_employees_management'))->with('error', 'User or Manager not found.');
    }
}




 

