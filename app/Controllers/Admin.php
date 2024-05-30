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

//     public function adminEmployeesManagement()
// {
//     $teamsModel = new teamModel();
//     $data['departments'] = $teamsModel->findAll();
    
//     $usersModel = new usersModel();
//     $data['employees'] = $usersModel->where('Role', 1)->findAll();
//     $data['admins'] = $usersModel->where('Role', 0)->findAll();

//     // Load the managers model
//     $managersModel = new managersModel();
//     $data['managers'] = $managersModel->findAll();

//     // Loop through the employees to fetch and attach the manager's name
//     foreach ($data['employees'] as &$employee) {
//         foreach ($data['managers'] as $manager) {
//             if ($manager['Team_id'] == $employee['Team_id']) {
//                 $employee['manager_name'] = $manager['username'];
//                 break;
//             }
//         }
//         // If no manager is found, assign a default value
//         if (!isset($employee['manager_name'])) {
//             $employee['manager_name'] = "No manager assigned";
//         }
//     }


//     return view("admin_employees_management", $data);
// }
// public function addEmployee()
// {
//     $teamModel = new teamModel();
//     $data['departments'] = $teamModel->findAll();

//     if ($this->request->getMethod() === 'POST') {
//         // إذا لم يتم إرسال edit_mode أو كانت قيمته false، فسنقوم بالإضافة
//         if ($this->request->getPost('edit_mode') !== 'true') {
//             $userData = [
//                 'username' => $this->request->getPost('username'),
//                 'email' => $this->request->getPost('email'),
//                 'password' => $this->request->getPost('password'),
//                 'Role' => $this->request->getPost('Role'),
//                 'Team_id' => $this->request->getPost('dep')
//             ];

//             // Check Role value
//             if ($userData['Role'] == 4) {
//                 // If Role is 1 (Manager), insert data into managers table
//                 $managersModel = new managersModel();
//                 if ($managersModel->insert($userData)) {
//                     return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
//                 } else {
//                     return "Error occurred while adding manager.";
//                 }
//             } else {
//                 // If Role is not 1 (Admin or Employee), insert data into users table
//                 $usersModel = new usersModel();
//                 if ($usersModel->insert($userData)) {
//                     return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
//                 } else {
//                     return "Error occurred while adding employee.";
//                 }
//             }
//         } else {
//             // If edit_mode is true, redirect to the appropriate controller method for editing
//             return redirect()->to('http://localhost/Translizer/public/Admin/editEmployee');
//         }
//     }
//     return view('admin_employees_management', $data); 
// }

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
        $employees = $userModel->where('Role', 1)->where('Team_id', $team['Tid'])->findAll();
        $data['employees'][$team['Tid']] = $employees;
    }
    
    return view('admin_team_management', $data);
}



public function editEmployee()
{
    if ($this->request->getMethod() === 'POST' && $this->request->getPost('edit_mode') === 'true') {
        // Set $editMode to true
        $editMode = true;
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'Role' => $this->request->getPost('Role'),
            'Team_id' => $this->request->getPost('dep'),
            'password' => $this->request->getPost('password'), // Added password field
            // 'userId' => $this->request->getPost('user_id');
        ];

        $managerData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'Team_id' => $this->request->getPost('dep'),
            'password' => $this->request->getPost('password'), // Added password field
        ];

        $userId = $this->request->getPost('user_id');
        error_log("The value of the variable is:" . $userId);

        $usersModel = new usersModel();
        $managersModel = new managersModel();

        // $idManager = $usersModel->where('User_id', $this->request->getPost('user_id'))
        // ->where('username', $this->request->getPost('username'))->findAll();
        // $idUsers = $managersModel->where('manager_id', $this->request->getPost('user_id'))->
        // where('username', $this->request->getPost('username'))->findAll();

        // Check if the role is being changed from Employee/Admin to Manager
        if ($userData['Role'] == 4) {
            // Remove from users table and insert into managers table
            // $managerData['password'] = ''; // Clear password field for managers
            if ($usersModel->delete($userId)) {
                if ($managersModel->insert($managerData)) {
                   // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                } else {
                    return "Error occurred while editing employee.";
                }
            } else {
                return "Error occurred while editing employee.";
            }
        } else {
            // Check if the role is being changed from Manager to Employee/Admin
            $oldManagerData = $managersModel->find($userId); // Find the user in managers table
            if ($oldManagerData) {
                // Remove from managers table and insert into users table
                if ($managersModel->delete($userId)) {
                    if ($usersModel->insert($userData)) {
                       // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                    } else {
                        return "Error occurred while editing manager.";
                    }
                } else {
                    return "Error occurred while editing manager.";
                }
            } else {
                // Update user data directly
                if ($usersModel->update($userId, $userData)) {
                   // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                } else {
                    return "Error occurred while editing employee.";
                }
            }
        }
    }
}


public function editEmployees()
{
    if ($this->request->getMethod() === 'POST')
    {
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'Role' => $this->request->getPost('Role'),
            'Team_id' => $this->request->getPost('dep'),
            'password' => $this->request->getPost('password'), // Added password field
        ];

        $managerData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'Team_id' => $this->request->getPost('dep'),
            'password' => $this->request->getPost('password'), // Added password field
        ];

        $usersModel = new usersModel();
        $managersModel = new managersModel();

        $idManager = $usersModel->where('User_id', $this->request->getPost('user_id'))
        ->where('username', $this->request->getPost('username'))->findAll();
        $idUsers = $managersModel->where('manager_id', $this->request->getPost('user_id'))->
        where('username', $this->request->getPost('username'))->findAll();


        return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
    }

    

    // if (!empty($idManager)) {
        
    // }
}

public function addEditEmployee()
{
    $teamModel = new teamModel();
    $data['departments'] = $teamModel->findAll();

    if ($this->request->getMethod() === 'POST') {
        // تحديد العملية المطلوبة بناءً على قيمة الحقل الخفي
        $operation = $this->request->getPost('operation');
        
        if ($operation === 'add') {
            // إذا كانت العملية إضافة، يتم تنفيذ كود الإضافة
            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'Role' => $this->request->getPost('Role'),
                'Team_id' => $this->request->getPost('dep')
            ];

            // Check Role value
            if ($userData['Role'] == 4) {
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
        } else {
            // إذا كانت العملية تعديل، يتم تنفيذ كود التعديل
            $userId = $this->request->getPost('user_id');
            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'Role' => $this->request->getPost('Role'),
                'Team_id' => $this->request->getPost('dep'),
                'password' => $this->request->getPost('password'), // Added password field
            ];

            $managerData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'Team_id' => $this->request->getPost('dep'),
                'password' => $this->request->getPost('password'), // Added password field
            ];

            $usersModel = new usersModel();
            $managersModel = new managersModel();

            if ($userData['Role'] == 4) {
                // Remove from users table and insert into managers table
                if ($usersModel->delete($userId)) {
                    if ($managersModel->insert($managerData)) {
                        // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                    } else {
                        return "Error occurred while editing employee.";
                    }
                } else {
                    return "Error occurred while editing employee.";
                }
            } else {
                // Check if the role is being changed from Manager to Employee/Admin
                $oldManagerData = $managersModel->find($userId); // Find the user in managers table
                if ($oldManagerData) {
                    // Remove from managers table and insert into users table
                    if ($managersModel->delete($userId)) {
                        if ($usersModel->insert($userData)) {
                            // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                        } else {
                            return "Error occurred while editing manager.";
                        }
                    } else {
                        return "Error occurred while editing manager.";
                    }
                } else {
                    // Update user data directly
                    if ($usersModel->update($userId, $userData)) {
                        // return redirect()->to('http://localhost/Translizer/public/admin_employees_management'); 
                    } else {
                        return "Error occurred while editing employee.";
                    }
                }
            }
        }
    }

    return view('admin_employees_management', $data); 
}

}


 

