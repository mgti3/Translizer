<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("landing");
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

    public function Orders(): string
    {
        return view("Orders_page");
    }

    public function Reports(): string
    {
        return view("Reports_page");
    }

    public function login(): string
    {
        return view("login");
    }

    public function register(): string
    {
        return view("register");
    }

    public function landing(): string
    {
        return view("landing");
    }

}
