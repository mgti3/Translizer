<?php


namespace App\Controllers;
use App\Models\Login_model;
use App\Models\Signup_model;


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


    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new Login_model();
        $this->signupModel = new Signup_model();
    }

    public function Ulogin()
    {
        // Load the helper for form and URL
        helper(['form', 'url']);

        // Get email and password from form submission
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Call the check_login function of the model
        $user_data = $this->loginModel->check_login($email, $password);

        if ($user_data) {
            // Login successful, redirect to dashboard or another page
            return redirect()->to('http://localhost/Translizer/public/user_dashboard');
        } else {
            // Login failed, show error message or redirect to login page
            return redirect()->to('http://localhost/Translizer/public/login')->with('error', 'Invalid login credentials');
        }
    }

    public function newRegister()
{
    // Load helper functions for form and URL handling
    helper(['form', 'url']);

    // Get form data
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $username = $this->request->getPost('username');

    // Prepare data for insertion
    $data = [
        'username' => $username,
        'email'    => $email,
        'password' => $password,
    ];

    // Insert data into the signup model
    $this->signupModel->insert($data);

    // Redirect to a success page or login page
    return redirect()->to('http://localhost/Translizer/public/login')->with('success', 'Registration successful. Please log in.');
}


}
