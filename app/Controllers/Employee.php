<?php

namespace App\Controllers;
use App\Models\addEmployeeModel;
use App\Models\OrderSubmission_model;



class Employee extends BaseController
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new addEmployeeModel();
        $this->OrderSubmit = new OrderSubmission_model();

    }

    public function dashboard(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');
        $username= $session->get('username');


        $data = [
            'orders' => 0,
            'progress' => 0,
            'completed' => 0,
            'ordersCount' => 0,
            'rating' => 0,
            'username' => $username
        ];
        $data['completed'] = $this->OrderSubmit->where('employee_id', $user_id)
                           ->where('state', 'done')
                           ->countAllResults();
        $data['ordersCount'] = $this->OrderSubmit->where('employee_id', $user_id)->countAllResults();
        $data['orders'] = $this->OrderSubmit->where('employee_id', $user_id)->findAll();
        $data['progress'] = floor(($data['completed'] / $data['ordersCount']) * 100);


        return view("employee_dashboard",$data);
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
