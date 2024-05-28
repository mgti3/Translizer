<?php

namespace App\Controllers;

use App\Models\usersModel;
use App\Models\OrderSubmission_model;
use App\Models\reportSubmission_model;

class User extends BaseController
{

    public function __construct()
    {
        $this->OrderSubmit = new OrderSubmission_model();
        $this->report_model = new reportSubmission_model();
    }

    public function dashboard(): string
    {
        return view("user_dashboard");
    }

    public function orders(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $data['orders'] = $this->OrderSubmit->where('User_id', $user_id)->findAll();

        return view("orders_page", $data);
    }

    public function reports(): string
    {
        return view("reports_page");
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

        $title =  $this->request->getPost('title');
        $description =  $this->request->getPost('description');
        $file_id =  $this->request->getPost('file_id');

        $data = [
            'user_id' => $user_id,
            'status' => 'Open',
            'Translation_id' => $file_id,
            'content' => $description,
            'rep_date' => date("Y-m-d"),
            'Title' => $title,
        ];

        // Insert data into the submitOrder model
        $this->report_model->insert($data);

        $response = array(
            'status' => 'success',
        );

        return $this->response->setJSON($response);
    }

    public function submitOrder()
    {
        helper(['form', 'url']);

        $cost = 0;
        $time = 0;

        $rules = ['thefile' => ['uploaded[thefile]']];

        if ($this->validate($rules)) {
            $file = $this->request->getFile('thefile');
        }

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
                    $file_path = './assets/Docs/' . $file->getName();
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
            'file_path' => $file_path,
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
    }

}