<?php

namespace App\Controllers;

use App\Models\addEmployeeModel;
use App\Models\OrderSubmission_model;
use CodeIgniter\HTTP\IncomingRequest;



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
        $username = $session->get('username');


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

        if ($data['ordersCount'] == 0) {
            $data['progress'] = 0;
        } else {
            $data['progress'] = floor(($data['completed'] / $data['ordersCount']) * 100);
        }



        return view("employee_dashboard", $data);
    }

    public function orderHistory(): string
    {
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $data['orders'] = $this->OrderSubmit->where('employee_id', $user_id)->findAll();

        return view("employee_orderHistory", $data);
    }

    public function orderDetails($file_path, $Doc_id, $upload_date): string
    {
        $session = \Config\Services::session();
        $username = $session->get('username');
        $data = [
            'Document_id' => $Doc_id,
            'file_path' => $file_path,
            'username' => $username,
            'upload_date' => $upload_date,
        ];
        return view("employee_orderDetails", $data);
    }

    public function viewDoc(): string
    {
        return view("employee_viewDoc");
    }

    public function employee_translationUpload($docID ): string
    {
        $data['docID'] = $docID;
        return view("employee_translationUpload", $data);
    }

    public function employee_viewTranslation(): string
    {
        return view("employee_viewTranslation");
    }

    public function translationForm(){
        helper(['form', 'url']);

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

            

            $data = [
                'Translation_path' => $file_name
            ];
            //$docID = $this->request->uri->getSegment(3); // Assuming the document ID is in the third segment of the URL

            // $this->OrderSubmit->update($docID, $data);
            // $this->OrderSubmit->where('Document_id', $docID)->update($data);
            $docID = $this->request->getPost('docID');
            if($this->OrderSubmit->set($data)->where('Document_id',$docID)->update())
            {
                $response = array(
                    'status' => 'success',
                    'id' => $docID,
                );
            }
            else{
                $response = array(
                    'status' => 'failed db entery',
                );
            }
            

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