<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("admin_dashboard");
    }

    public function User(): string
    {
        return view("User_dashboard");
    }
}
