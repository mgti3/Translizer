<?php

namespace App\Controllers;
use App\Models\usersModel;

class User extends BaseController
{

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
    public function signup()
    {
        $data = [
            'username' => 'user',
            'password' => 'pass',
            'email' => 'emailuser',
            'Role' => 3,
            'Team_id' => 'none',
        ];
        if($this->request->getMethod() == 'POST'){
            $model = new usersModel();
            $model->save($_POST);
        }
        return view('register',$data);
    }

}