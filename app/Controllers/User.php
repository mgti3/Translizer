<?php

namespace App\Controllers;

use App\Models\usersModel;
use App\Models\OrderSubmission_model;

class User extends BaseController
{

    public function __construct()
    {
        $this->OrderSubmit = new OrderSubmission_model();
    }

    public function dashboard(): string
    {
        return view("user_dashboard");
    }

    public function orders(): string
    {
        return view("orders_page");
    }

    public function reports(): string
    {
        return view("reports_page");
    }

    public function submitOrder()
    {
        $cost = 0;
        $time = 0;
        $file = $this->request->getFile('thefile');

        if (!$file->hasMoved()) {
            $filePath = './assets/Docs/' . $file->getName();
            if ($file->move('./assets/Docs')) {
                // Read file content
                $fileContent = file_get_contents($filePath);
                if ($fileContent !== false) {
                    // Calculate word count
                    $word_count = str_word_count($fileContent);
                    $cost = $word_count * 0.2;
                    $time = $word_count * 0.5;
                } else {
                    log_message('error', 'Failed to read the file content.');

                }
            } else {
                log_message('error', 'Failed to move the uploaded file.');

            }
        } else {
            log_message('error', 'File has already been moved.');

        }

        helper(['form', 'url']);

        // Get form data
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
            'language' => $language,
            'target_language' => $target_language,
            'urgent' => $bool_urgent,
            'state' => 'Pending',
            'upload_date' => date("Y-m-d"),
            'cost' => $cost,
            'est_time' => $time,
        ];

        // Insert data into the submitOrder model
        $this->OrderSubmit->insert($data);

        // Response to the client
        return redirect()->to('/success_page')->with('message', 'Order submitted successfully.');

    }

}