<?php
namespace App\Controllers;

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
}
