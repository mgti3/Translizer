<?php

namespace App\Controllers;
use App\Models\OrderSubmission_model;

class Employee extends BaseController
{

    public function __construct()
    {
        $this->OrderSubmit = new OrderSubmission_model();
    }
    
    public function dashboard(): string
    {
        return view("employee_dashboard");
    }

    public function orderHistory(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $data['orders'] = $this->OrderSubmit->where('User_id', $user_id)->findAll();

        return view("employee_orderHistory", $data);
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
