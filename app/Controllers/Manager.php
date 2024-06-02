<?php

namespace App\Controllers;
use App\Models\OrderSubmission_model;
use App\Models\usersModel;
use App\Models\teamModel;
use App\Models\managersModel;

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
        $documentsModel = new OrderSubmission_model();
        $documents = $documentsModel->where('employee_id', null)->findAll();

        $session = session();
        $managerId = $session->get('user_id');

        $managerModel = new managersModel();
        $teamId = $managerModel->where('manager_id', $managerId)->first()['Team_id'];

        $userModel = new usersModel();
        $employees = $userModel->where('Team_id', $teamId)->findAll();

        $data = [
            'documents' => $documents,
            'employees' => $employees
        ];


        return view('manager_assignment', $data);
    }

    public function taskAssignment()
    {
        $documentsModel = new OrderSubmission_model();
        if ($this->request->getMethod() === 'POST') {
            $taskName = $this->request->getPost('taskName');
            $assignedTo = $this->request->getPost('assignedTo');
    
            if (is_numeric($taskName)) {
                $documentsModel->update($taskName, ['employee_id' => $assignedTo]);
                return redirect()->to(base_url('manager_assignment'))->with('message', 'Task assigned successfully.');
            } else {
                return redirect()->back()->with('error', 'Task Name must content just a number.');
            }
        }
         return redirect()->to(base_url('manager_assignment'))->with('success', 'Team added successfully.');
    }
    

    public function clicked()
    {
        $data = array(
            'list' => 10
        );
        echo json_encode($data);
    }

}

// $session = session();
//         $managerId = $session->get('user_id'); // استخدام user_id بدلاً من manager_id كما في سؤالك
//         var_dump($managerId);
//         $managerModel = new managersModel();
//         $manager = $managerModel->where('manager_id', $managerId)->first();

//         if ($manager) {
//             $teamId = $manager['Team_id'];

//             $usersModel = new usersModel();
//             $employees = $usersModel->where('Team_id', $teamId)->findAll();

//             $documentsModel = new OrderSubmission_model();
//             $documents = $documentsModel->where('employee_id', null)->findAll();

//             $data = [
//                 'documents' => $documents,
//                 'employees' => $employees
//             ];

//             return view('task_assignment', $data);
//         } else {
//             // تعامل مع الحالة التي لا يوجد فيها مدير بهذا المعرف
//             return redirect()->to('Translizer/public/manager_assignment')->with('error', 'Manager not found');
//         }