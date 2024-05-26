<?php
namespace App\Controllers;
use App\Models\addEmployeeModel;
use App\Models\usersModel;
use App\Models\teamModel;


class Admin extends BaseController
{
    public function dashboard(): string
    {
        return view("admin_dashboard");
    }

    public function adminTeamManagement(): string
    {
        return view("admin_team_management");
    }

    public function adminEmployeesManagement()
    {
        $teams = new teamModel();
        $data['departments'] = $teams->findAll();
        return view("admin_employees_management",$data);
    }

    public function addEmployee()
    {
        $dataa = [
            'username' => 'user',
            'password' => 'pass',
            'email' => 'emailuser',
            'Role' => '3',
            'Team_id' => 'none',
        ];
        if($this->request->getMethod() == 'POST'){
            $model = new addEmployeeModel();
            $model->save($_POST);
        }
        return view('admin_employees_management',$data);
    }

    // public function addTeam()
    // {
    //    $userModel = new usersModel();
    //    $data['usersWithRoleOne'] = $userModel->where('Role', 1)->findAll();
    //    return view('admin_team_management',$data);
    // }


    public function __construct()
    {
        $this->teamModel = new teamModel();
    }

    public function addTeam()
{
    $userModel = new usersModel();
    $data['usersWithRoleOne'] = $userModel->where('Role', 1)->findAll();
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

        // Insert data into the signup model
        $this->teamModel->insert($addTeam);

        // Redirect to a success page or login page
        return redirect()->to('http://localhost/Translizer/public/admin_team_management')->with('success', 'Registration successful. Please log in.');
    }

    return view('admin_team_management', $data);
}

// public function views(){
//     $teamModel = new teamModel();
//     $data['teams'] = $teamModel->findAll(); 
//     return view('admin_team_management', $data);
// }


//     public function add()
// {
//     $newTeam = new teamModel();
//     // Load helper functions for form and URL handling
//     helper(['form', 'url']);

//     // Get form data
//     $teamName = $this->request->getPost('teamName');

//     // Prepare data for insertion
//     $data = [
//         'Team_name' => $teamName,
//     ];

//     // Insert data into the signup model
//     $this->newTeam->insert($data);

//     // Redirect to a success page or login page
//     return redirect()->to('http://localhost/Translizer/public/admin_team_management')->with('success', 'Registration successful. Please log in.');
// }
}