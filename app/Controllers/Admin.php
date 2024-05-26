<?php
namespace App\Controllers;
use App\Models\addEmployeeModel;
use App\Models\usersModel;


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

    public function adminEmployeesManagement(): string
    {
        return view("admin_employees_management");
    }

    public function addEmployee()
    {
        $data = [
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

    public function addTeam()
    {
       $userModel = new usersModel();
       $data['usersWithRoleOne'] = $userModel->where('Role', 1)->findAll();
       return view('admin_team_management',$data);
    }
}