<?php

namespace App\Controllers;

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

    public function user_viewTranslation(): string {
        return view("user_viewTranslation");
    }
}