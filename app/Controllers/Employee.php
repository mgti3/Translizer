<?php

namespace App\Controllers;

class Employee extends BaseController
{
    public function dashboard(): string
    {
        return view("employee_dashboard");
    }

    public function orderHistory(): string
    {
        return view("employee_orderHistory");
    }

    public function orderDetails(): string
    {
        return view("employee_orderDetails");
    }
}
