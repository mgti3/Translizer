<?php


namespace App\Controllers;
use App\Models\Login_model;
use App\Models\Signup_model;
use App\Models\mangerLogin_model;



class Home extends BaseController
{
    public function index(): string
    {
        return view("landing");
    }

    public function adminTeamManagement(): string
    {
        return view("admin_team_management");
    }

    public function adminEmployeesManagement(): string
    {
        return view("admin_employees_management");
    }

    public function User(): string
    {
        return view("User_dashboard");
    }

    public function Orders(): string
    {
        return view("Orders_page");
    }

    public function Reports(): string
    {
        return view("Reports_page");
    }

    public function login(): string
    {
        return view("login");
    }

    public function register(): string
    {
        return view("register");
    }

    public function landing(): string
    {
        return view("landing");
    }

    public function oops(): string
    {
        return view("error_page");
    }

    protected $loginModel;
    protected $signupModel;

    public function __construct()
    {
        $this->loginModel = new Login_model();
        $this->signupModel = new Signup_model();
        $this->managerLogin = new mangerLogin_model();
    }

    // public function Ulogin()
    // {
    //     // Load the helper for form and URL
    //     helper(['form', 'url']);

    //     // Get email and password from form submission
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     // Call the check_login function of the model
    //     $user = $this->loginModel->check_login($email, $password);
    //     $manager = $this->managerLogin->check_login($email, $password);
    //     if ($user) {
    //         $session = \Config\Services::session();
    //         $sessionData = [
    //             'user_id' => $user['User_id'],
    //             'username' => $user['username'],
    //             'user_type' => $user['Role'], 
    //             'logged_in' => true
    //         ];
    //         $session->set($sessionData);

    //         log_message('info', 'Session Data: ' . json_encode($session->get()));
    //         if($user['Role'] == 0){
    //             return redirect()->to('http://localhost/Translizer/public/admin_dashboard');
    //         }elseif($user['Role'] == 1){
    //             return redirect()->to('http://localhost/Translizer/public/employee_dashboard');
    //         }elseif($user['Role'] == 2){
    //             return redirect()->to('http://localhost/Translizer/public/user_dashboard');
    //         }

            
    //     }elseif($manager) {
    //             $session = \Config\Services::session();
    //             $sessionData = [
    //                 'user_id' => $manager['manager_id'],
    //                 'username' => $manager['username'],
    //                 'user_type' => 4, 
    //                 'logged_in' => true
    //             ];
    //             $session->set($sessionData);

    //             log_message('info', 'Session Data: ' . json_encode($session->get()));
    //             return redirect()->to('http://localhost/Translizer/public/manager_dashboard');


    //     }else{
            
    //     }

    // }

    public function Ulogin()
{
    // Load the helper for form and URL
    helper(['form', 'url']);

    if ($this->request->getMethod() == 'POST') {
        // Define validation rules
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ];

        // Validate the input data
        if ($this->validate($rules)) {
            // Get email and password from form submission
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Call the check_login function of the model
            $user = $this->loginModel->check_login($email, $password);
            $manager = $this->managerLogin->check_login($email, $password);
            
            if ($user) {
                $session = \Config\Services::session();
                $sessionData = [
                    'user_id' => $user['User_id'],
                    'username' => $user['username'],
                    'user_type' => $user['Role'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                log_message('info', 'Session Data: ' . json_encode($session->get()));
                if ($user['Role'] == 0) {
                    return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('admin_dashboard')]);
                } elseif ($user['Role'] == 1) {
                    return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('employee_dashboard')]);
                } elseif ($user['Role'] == 2) {
                    return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('user_dashboard')]);
                }
            } elseif ($manager) {
                $session = \Config\Services::session();
                $sessionData = [
                    'user_id' => $manager['manager_id'],
                    'username' => $manager['username'],
                    'user_type' => 4,
                    'logged_in' => true
                ];
                $session->set($sessionData);

                log_message('info', 'Session Data: ' . json_encode($session->get()));
                return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('manager_dashboard')]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid email or password.']);
            }
        } else {
            // Validation failed, return the errors
            $response = [
                'status' => 'error',
                'validate' => $this->validator->listErrors(),
            ];
            return $this->response->setJSON($response);
        }
    }

    return view('login');
}


    // public function newRegister()
    // {
    //     log_message('error',"we entered the function ");

    //     $data = [];
    //     helper(['form', 'url']);
        

    //     if($this -> request->getMethod()=='POST'){
    //         log_message('error',"hellor from the first if ");
    //         $rules = [
    //             'email' => 'required'
    //         ];
    //         log_message('error',"rules made");

    //         if($this->validate($rules)){
    //             log_message('error',"hello your data is validated ");
    //             $email = $this->request->getPost('email');
    //             $password = $this->request->getPost('password');
    //             $username = $this->request->getPost('username');

    //             $insertion = [
    //                 'username' => $username,
    //                 'email'    => $email,
    //                 'password' => $password,
    //                 'Role' => 2,
    //             ];

    //             $this->signupModel->insert($insertion);
    //             return redirect()->to('http://localhost/Translizer/public/login')->with('success', 'Registration successful. Please log in.');
    //             //  return view("login");
    //         }else{
    //             // log_message('error',"hello your data is not correct ");
    //             // $data['validation'] = $this->validator;
    //             // return view('register', $data);
    //             $response = array(
    //                 'status' => 'error',
    //                 'validate' => $this->validator->listErrors(),
    //             );
        
    //             return $this->response->setJSON($response);
    //         }
    //         log_message('error',"this is not a post method");
    //         return view('register', $data);
    //     }

    //     // Get form data
        

    //     // Redirect to a success page or login page
    // }


    public function newRegister()
{
    log_message('error', "we entered the function");

    $data = [];
    helper(['form', 'url']);

    if ($this->request->getMethod() == 'POST') {
        log_message('error', "hello from the first if");
        $rules = [
            'email' => 'required|valid_email',
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]',        ];
        log_message('error', "rules made");

        if ($this->validate($rules)) {
            log_message('error', "hello your data is validated");
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $username = $this->request->getPost('username');

            $insertion = [
                'username' => $username,
                'email'    => $email,
                'password' => $password,
                'Role' => 2,
            ];

            $this->signupModel->insert($insertion);

            // Return JSON response for successful registration
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registration successful. Redirecting...',
                'redirect' => base_url('login')
            ]);
        } else {
            $response = array(
                'status' => 'error',
                'validate' => $this->validator->listErrors(),
            );

            return $this->response->setJSON($response);
        }
    }

    return view('register', $data);
}


public function logout(){
    $session = \Config\Services::session();
    $session->destroy();
    return redirect()->to('http://localhost/Translizer/public/login')->with('success', 'Registration successful. Please log in.');
}


}