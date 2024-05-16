<?php

namespace App\Controllers;

class Manager extends BaseController
{
    public function dashboard(): string
    {
        return view("manager_dashboard");
    }

    public function ticket(): string
    {
        return view("manager_tickets");
    }

    public function assignment(): string
    {
        return view("manager_assignment");
    }
}
