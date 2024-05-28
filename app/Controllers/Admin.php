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
        $data['departments'] = $teamModel->findAll();

        if ($this->request->getMethod() === 'POST') {
            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'Role' => $this->request->getPost('Role'),
                'Team_id' => $this->request->getPost('dep')
            ];

            // Check Role value
            if ($userData['Role'] == 1) {
                // If Role is 1 (Manager), insert data into managers table
                $managersModel = new managersModel();
                if ($managersModel->insert($userData)) {
                    return redirect()->to('http://localhost/Translizer/public/admin_employees_management');
                } else {
                    return "Error occurred while adding manager.";
                }
            } else {
                // If Role is not 1 (Admin or Employee), insert data into users table
                $usersModel = new usersModel();
                if ($usersModel->insert($userData)) {
                    return redirect()->to('http://localhost/Translizer/public/admin_employees_management');
                } else {
                    return "Error occurred while adding employee.";
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
        $userModel = new usersModel();
        $data['teams'] = $this->teamModel->findAll();

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
            $this->teamModel->insert($addTeam);

            // Redirect to a success page or login page
            return redirect()->to('http://localhost/Translizer/public/admin_team_management')->with('success', 'Team added successfully.');
        }

        $managersModel = new managersModel();
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
            $employees = $userModel->where('Role', 2)->where('Team_id', $team['Tid'])->findAll();
            $data['employees'][$team['Tid']] = $employees;
        }

        return view('admin_team_management', $data);
    }
    // public function addTeam()
// {
//     $userModel = new usersModel();
//     $data['teams'] = $this->teamModel->findAll();

    //     // Load helper functions for form and URL handling
//     helper(['form', 'url']);

    //     // Create an instance of the managers model
//     $managersModel = new managersModel();
//     $data['managers'] = [];
//     foreach ($data['teams'] as $team) {
//         $managerName = $managersModel->where('Team_id', $team['Tid'])->first();
//         if ($managerName) {
//             $data['managers'][$team['Tid']] = $managerName['username'];
//         } else {
//             $data['managers'][$team['Tid']] = null;
//         }
//     }

    //     // جلب الموظفين الذين لديهم الـRole المساوي للـ1
//     $employeesModel = new usersModel();
//     $data['employees'] = $employeesModel->where('Role', 1)->findAll();

    //     return view('admin_team_management', $data);
// }


}