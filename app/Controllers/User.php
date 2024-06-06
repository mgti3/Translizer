<?php

namespace App\Controllers;

use Config\Database;

use App\Models\usersModel;
use App\Models\OrderSubmission_model;
use App\Models\reportSubmission_model;
use App\Models\teamModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->OrderSubmit = new OrderSubmission_model();
        $this->report_model = new reportSubmission_model();
        $this->team_model = new teamModel();
    }

    public function dashboard(): string
    {

        $data['teams'] = $this->team_model->findAll();

        return view("user_dashboard", $data);
    }

    public function orders(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        // $data['orders'] = $this->OrderSubmit->where('User_id', $user_id)->findAll();

        $db = Database::connect();

        // Build the query with a join
        $builder = $db->table('documents');
        $builder->select('documents.*, teams.Team_name as team_name');
        $builder->join('teams', 'documents.Team_id = teams.Tid');
        $builder->where('documents.User_id', $user_id);

        $query = $builder->get();
        $data['orders'] = $query->getResultArray();

        return view("orders_page", $data);
    }

    public function reports(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        //$data['orders'] = $this->OrderSubmit->where('User_id', $user_id)->findAll();
        $data['orders'] = $this->OrderSubmit
            ->where('User_id', $user_id)
            ->where('Translation_path IS NOT NULL', null, false) // Adding the condition for translation_path not being NULL
            ->findAll();

        return view("reports_page", $data);
    }

    public function user_viewTranslation($file_name, $order_id): string
    {
        $data['name'] = $file_name;
        $data['order_id'] = $order_id;

        return view('user_viewTranslation', $data);
    }

    public function Information()
    {
        helper(['form', 'url']);

        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $data = [
            'total' => 0,
            'inProcess' => 0,
            'completed' => 0
        ];

        $data['total'] = $this->OrderSubmit->where('User_id', $user_id)->countAllResults();
        $data['inProcess'] = $this->OrderSubmit->where(['User_id' => $user_id, 'state' => 'In Process'])->countAllResults();
        $data['completed'] = $this->OrderSubmit->where(['User_id' => $user_id, 'state' => 'Completed'])->countAllResults();

        $response = array(
            'status' => 'success',
            'data' => $data,
            'name' => $session->get('username'),
        );

        return $this->response->setJSON($response);
    }

    public function reportSubmit()
    {

        helper(['form', 'url']);

        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        // Retrieve post data
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $file_id = $this->request->getPost('file_id');

        // Define validation rules
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
            'file_id' => 'required|integer'
        ];

        // Validate data
        if ($this->validate($rules)) {
            $data = [
                'user_id' => $user_id,
                'status' => 'Open',
                'Translation_id' => $file_id,
                'content' => $description,
                'rep_date' => date("Y-m-d"),
                'Title' => $title,
            ];

            // Insert data into the report model
            $this->report_model->insert($data);

            $response = [
                'status' => 'success',
            ];
        } else {
            // Validation failed
            $response = [
                'status' => 'error',
                'validate' => $this->validator->listErrors(),
            ];
        }

        return $this->response->setJSON($response);
    }

    public function submitOrder()
    {
        helper(['form', 'url']);

        $cost = 0;
        $time = 0;

        $rules = [
            'thefile' => [
                'uploaded[thefile]',
                'max_size[thefile,20480]',
                'ext_in[thefile,pdf,txt]'
            ]
        ];

        if ($this->validate($rules)) {
            $file = $this->request->getFile('thefile');

            $session = \Config\Services::session();
            $user_id = $session->get('user_id');

            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = './assets/Docs/' . $file->getName();
                if ($file->move('./assets/Docs')) {
                    // Read file content
                    $fileContent = file_get_contents($filePath);
                    if ($fileContent !== false) {
                        // Calculate word count
                        $word_count = str_word_count($fileContent);
                        $cost = $word_count * 0.08;
                        $time = ($word_count * 0.5) / 60;
                        $file_name = $file->getName();
                    } else {
                        log_message('error', 'Failed to read the file content.');

                    }
                } else {
                    log_message('error', 'Failed to move the uploaded file.');

                }
            } else {
                log_message('error', 'File has already been moved.');

            }

            $language = $this->request->getPost('documentLanguage');
            $target_language = $this->request->getPost('targetLanguage');
            $urgent = $this->request->getPost('urgent');
            $team_id = $this->request->getPost('category');

            $bool_urgent = false;
            if ($urgent) {
                $bool_urgent = true;
            } else {
                $bool_urgent = false;
            }

            // Prepare data for insertion
            $data = [
                'User_id' => $user_id,
                'language' => $language,
                'target_language' => $target_language,
                'urgent' => $bool_urgent,
                'state' => 'Pending',
                'upload_date' => date("Y-m-d"),
                'cost' => $cost,
                'est_time' => $time,
                'file_path' => $file_name,
                'Team_id' => $team_id,
            ];

            // Insert data into the submitOrder model
            $this->OrderSubmit->insert($data);

            $dataReturned = [
                'total' => 0,
                'inProcess' => 0,
                'completed' => 0
            ];

            $dataReturned['total'] = $this->OrderSubmit->where('User_id', $user_id)->countAllResults();
            $dataReturned['inProcess'] = $this->OrderSubmit->where(['User_id' => $user_id, 'state' => 'In Process'])->countAllResults();
            $dataReturned['completed'] = $this->OrderSubmit->where(['User_id' => $user_id, 'state' => 'Completed'])->countAllResults();


            $response = array(
                'status' => 'success',
                'data' => $dataReturned,
                'name' => $session->get('username'),
            );

            return $this->response->setJSON($response);
        } else {
            // Validation failed, return the errors
            $response = [
                'status' => 'error',
                'validate' => $this->validator->listErrors(),
            ];
            return $this->response->setJSON($response);
        }


    }

}