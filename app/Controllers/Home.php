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

    public function __construct()
    {
        $this->loginModel = new Login_model();
        $this->signupModel = new Signup_model();
        $this->managerLogin = new mangerLogin_model();
    }

    public function Ulogin()
    {
        // Load the helper for form and URL
        helper(['form', 'url']);

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
                'user_type' => $user['Role'], // e.g., 'normal', 'manager'
                'logged_in' => true
            ];
            $session->set($sessionData);

            log_message('info', 'Session Data: ' . json_encode($session->get()));
            if($user['Role'] == 0){
                return redirect()->to('http://localhost/Translizer/public/admin_dashboard');
            }elseif($user['Role'] == 1){
                return redirect()->to('http://localhost/Translizer/public/employee_dashboard');
            }elseif($user['Role'] == 2){
                return redirect()->to('http://localhost/Translizer/public/user_dashboard');
            }

            
        }elseif($manager) {
                $session = \Config\Services::session();
                $sessionData = [
                    'user_id' => $manager['manager_id'],
                    'username' => $manager['username'],
                    'user_type' => 4, 
                    'logged_in' => true
                ];
                $session->set($sessionData);

                log_message('info', 'Session Data: ' . json_encode($session->get()));
                return redirect()->to('http://localhost/Translizer/public/manager_dashboard');


        }else{
            
        }

    }

    public function newRegister()
    {

        // Load helper functions for form and URL handling
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[5]|max_length[255]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ]);
        
        // Set custom error messages (optional)
        $validation->setMessages([
            'email' => [
                'is_unique' => 'The email address is already registered.'
            ]
        ]);
        // Get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $username = $this->request->getPost('username');

        // Prepare data for insertion
        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $password,
            'Role' => 2,
        ];

        // Insert data into the signup model
        $this->signupModel->insert($data);

        // Redirect to a success page or login page
        return redirect()->to('http://localhost/Translizer/public/login')->with('success', 'Registration successful. Please log in.');
    }

public function logout(){
    $session = \Config\Services::session();
    $session->destroy();
    return redirect()->to('http://localhost/Translizer/public/login')->with('success', 'Registration successful. Please log in.');
}


}