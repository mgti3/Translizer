<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("home");
    }

    public function adminTeamManagement(): string
    {
        return view("admin_team_management");
    }

    public function adminEmployeesManagement(): string
    {
        return view("admin_employees_management");
    }

    public function User(): string
    {
        return view("User_dashboard");
    }
}
