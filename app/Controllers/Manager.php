<?php

namespace App\Controllers;

use Config\Database;
use App\Models\OrderSubmission_model;
use App\Models\reportSubmission_model;
use App\Models\teamModel;
use App\Models\managersModel;
use App\Models\usersModel;

class Manager extends BaseController
{
    public function GetName()
    {
        $session = session();
        $managername = $session->get('username');

        $response = array(
            'status' => 'success',
            'name' => $managername,
        );

        return $this->response->setJSON($response);
    }

    public function dashboard(): string
    {
        $session = session();
        $managerId = $session->get('user_id');

        $managerModel = new managersModel();
        $teamId = $managerModel->where('manager_id', $managerId)->first()['Team_id'];

        $documentsModel = new OrderSubmission_model();

        // جلب الموظفين في نفس الفريق
        $userModel = new usersModel();
        $employees = $userModel->where('Team_id', $teamId)->findAll();

        $progressData = [];

        foreach ($employees as $employee) {
            $userId = $employee['User_id'];

            // عدد المهام المستلمة
            $tasksReceived = $documentsModel->where('employee_id', $userId)->countAllResults();

            // عدد المهام المكتملة
            $tasksCompleted = $documentsModel->where('employee_id', $userId)->where('state !=', 'Pending')->countAllResults();

            $progressData[] = [
                'username' => $employee['username'],
                'tasks_received' => $tasksReceived,
                'tasks_completed' => $tasksCompleted,
                'tickets' => '' // العمود الأخير يترك فارغًا
            ];
        }

        // الجزء الجديد المضاف
        // حساب الوثائق للشهر الحالي
        $currentMonth = date('m');
        $currentYear = date('Y');
        $monthlyDocumentsCount = $documentsModel
            ->where('MONTH(upload_date)', $currentMonth)
            ->where('YEAR(upload_date)', $currentYear)
            ->where('YEAR(upload_date)', $currentYear)
            ->where('Team_id', $teamId)
            ->countAllResults();

        // حساب مجموع التكاليف للشهر الحالي
        $monthlyEarnings = $documentsModel
            ->selectSum('cost')
            ->where('MONTH(upload_date)', $currentMonth)
            ->where('YEAR(upload_date)', $currentYear)
            ->where('Team_id', $teamId)
            ->get()
            ->getRow()
            ->cost;

        // حساب عدد الوثائق المكتملة للشهر الحالي
        $completedTasksCount = $documentsModel
            ->where('Team_id', $teamId)
            ->where('state !=', 'Pending')
            ->countAllResults();

        // حساب عدد الوثائق القيد التقدم للشهر الحالي
        $inProgressTasksCount = $documentsModel
            ->where('Team_id', $teamId)
            ->where('state', 'Pending')
            ->countAllResults();

        $data = [
            'monthlyDocumentsCount' => $monthlyDocumentsCount,
            'monthlyEarnings' => $monthlyEarnings,
            'completedTasksCount' => $completedTasksCount,
            'inProgressTasksCount' => $inProgressTasksCount,
            'progressData' => $progressData // البيانات القديمة
        ];

        return view("manager_dashboard", $data);
    }

    public function __construct()
    {
        $this->OrderSubmit = new OrderSubmission_model();
        $this->report_model = new reportSubmission_model();
    }

    public function ticket(): string
    {
        return view("manager_tickets");
    }

    public function load_tikcets()
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $db = Database::connect();

        // Build the query with joins
        $builder = $db->table('reports');
        $builder->select('reports.*, documents.*, teams.Team_name as team_name, managers.username as manager_name, users.username as username, documents.urgent as urgent, documents.cost as wordlen, documents.language as language, documents.target_language as language');
        $builder->join('documents', 'reports.Translation_id = documents.Document_id');
        $builder->join('teams', 'documents.Team_id = teams.Tid');
        $builder->join('users', 'reports.user_id = users.User_id');
        $builder->join('managers', 'teams.Tid = managers.Team_id');
        $builder->where('reports.status', 'Open');
        $builder->where('managers.manager_id', $user_id);
        $query = $builder->get();

        $data['reports'] = $query->getResultArray();

        $builder = $db->table('reports');
        $builder->select('reports.*, documents.*, teams.Team_name as team_name, managers.username as manager_name, users.username as username, documents.urgent as urgent, documents.cost as wordlen, documents.language as language, documents.target_language as language');
        $builder->join('documents', 'reports.Translation_id = documents.Document_id');
        $builder->join('teams', 'documents.Team_id = teams.Tid');
        $builder->join('users', 'reports.user_id = users.User_id');
        $builder->join('managers', 'teams.Tid = managers.Team_id');
        $builder->where('reports.status', 'Closed');
        $builder->where('managers.manager_id', $user_id);
        $query = $builder->get();

        $data['reports_closed'] = $query->getResultArray();


        $response = array(
            'status' => 'success',
            'data' => $data,
        );

        return $this->response->setJSON($response);
    }

    public function close_ticket()
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        // Access specific data using key names
        $index = $this->request->getPost('index');

        $updatedata = [
            'status' => 'Closed',
        ];

        $this->report_model->update($index, $updatedata);

        $db = Database::connect();

        // Build the query with joins
        $builder = $db->table('reports');
        $builder->select('reports.*, documents.*, teams.Team_name as team_name, managers.username as manager_name, users.username as username, documents.urgent as urgent, documents.cost as wordlen, documents.language as language, documents.target_language as language');
        $builder->join('documents', 'reports.Translation_id = documents.Document_id');
        $builder->join('teams', 'documents.Team_id = teams.Tid');
        $builder->join('users', 'reports.user_id = users.User_id');
        $builder->join('managers', 'teams.Tid = managers.Team_id');
        $builder->where('reports.status', 'Open');
        $builder->where('managers.manager_id', $user_id);
        $query = $builder->get();

        $data['reports'] = $query->getResultArray();

        $builder = $db->table('reports');
        $builder->select('reports.*, documents.*, teams.Team_name as team_name, managers.username as manager_name, users.username as username, documents.urgent as urgent, documents.cost as wordlen, documents.language as language, documents.target_language as language');
        $builder->join('documents', 'reports.Translation_id = documents.Document_id');
        $builder->join('teams', 'documents.Team_id = teams.Tid');
        $builder->join('users', 'reports.user_id = users.User_id');
        $builder->join('managers', 'teams.Tid = managers.Team_id');
        $builder->where('reports.status', 'Closed');
        $builder->where('managers.manager_id', $user_id);
        $query = $builder->get();

        $data['reports_closed'] = $query->getResultArray();

        $response = array(
            'status' => 'success',
            'data' => $data,
        );

        return $this->response->setJSON($response);
    }

    public function assignment()
    {

        $session = session();
        $managerId = $session->get('user_id');

        $managerModel = new managersModel();
        $teamId = $managerModel->where('manager_id', $managerId)->first()['Team_id'];

        $documentsModel = new OrderSubmission_model();
        $documents = $documentsModel->where('employee_id', null)->where('Team_id', $teamId)->findAll();
        $documentsinfo = $documentsModel
            ->select('documents.*, users.username as employee_name')
            ->join('users', 'users.User_id = documents.employee_id', 'inner')
            ->where('documents.Team_id', $teamId)
            ->where('documents.employee_id IS NOT NULL')
            ->findAll();

        $userModel = new usersModel();
        $employees = $userModel->where('Team_id', $teamId)->findAll();

        $data = [
            'documents' => $documents,
            'employees' => $employees,
            'documentsinfo' => $documentsinfo,
            'notification' => 1
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
                
                if($documentsModel->update($taskName, ['employee_id' => $assignedTo])){
                $session = \Config\Services::session();
                $session->setFlashdata('notification', 'Form submitted successfully!');
                sleep(4);
                return redirect()->to(base_url('manager_assignment'))->with('success', 'Task assigned successfully.');
            }
            } else {
                return redirect()->back()->with('error', 'Task Name must content just a number.');
            }
        }
        return redirect()->to(base_url('manager_assignment'))->with('success', 'Team added successfully.');
    }

    public function ticketDetails($ticket_id)
    {

        $data['ticket_id'] = $ticket_id;

        $data['report'] = $this->report_model->where('Report_id', $ticket_id)->findAll();
        $data['document'] = $this->OrderSubmit->where('Document_id', $data['report'][0]["Translation_id"])->findAll();

        return view("manager_ticketDetails", $data);
    }
}
