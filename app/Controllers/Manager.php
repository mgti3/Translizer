<?php

namespace App\Controllers;

use Config\Database;
use App\Models\OrderSubmission_model;
use App\Models\reportSubmission_model;
use App\Models\teamModel;

class Manager extends BaseController
{
    public function dashboard(): string
    {
        return view("manager_dashboard");
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

        $response = array(
            'status' => 'success',
            'data' => $data,
        );

        return $this->response->setJSON($response);
    }

    public function assignment(): string
    {
        return view("manager_assignment");
    }

    public function ticketDetails($ticket_id)
    {

        $data['ticket_id'] = $ticket_id;

        $data['report'] = $this->report_model->where('Report_id', $ticket_id)->findAll();
        $data['document'] = $this->OrderSubmit->where('Document_id', $data['report'][0]["Translation_id"])->findAll();

        return view("manager_ticketDetails", $data);
    }



}
