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

    public function viewDoc(): string
    {
        return view("employee_viewDoc");
    }

    public function employee_translationUpload(): string
    {
        return view("employee_translationUpload");
    }

    public function employee_viewTranslation(): string 
    {
        return view("employee_viewTranslation");
    }
}
