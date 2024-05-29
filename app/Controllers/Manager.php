<?php

namespace App\Controllers;
use App\Models\OrderSubmission_model;

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

    public function assignment()
    {
        $model = new OrderSubmission_model();

        $documents = $model->where('employee_id', null)->findAll();

        $data = [
            'documents' => $documents
        ];

        return view('manager_assignment', $data);
    }
    

    public function clicked()
    {
        $data = array(
            'list' => 10
        );
        echo json_encode($data);
    }

}
