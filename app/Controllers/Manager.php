<?php

namespace App\Controllers;

use Config\Database;

class Manager extends BaseController
{
    public function dashboard(): string
    {
        return view("manager_dashboard");
    }

    public function ticket(): string
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
        $builder->where('managers.manager_id', $user_id); // Assuming manager_id is the ID of the logged-in manager
        $query = $builder->get();

        $data['reports'] = $query->getResultArray();

        return view("manager_tickets", $data);
    }

    public function assignment(): string
    {
        return view("manager_assignment");
    }

    public function clicked()
    {
        $data = array(
            'list' => 10
        );
        echo json_encode($data);
    }

}
