<?php

namespace App\Models;

use CodeIgniter\Model;

class mangerLogin_model extends Model
{
    protected $table = 'managers';
    protected $primaryKey = 'manager_id';
    protected $allowedFields = ['email', 'password'];

    public function check_login($email, $password)
    {
        // Query to check if email and password match
        $query = $this->where(['email' => $email, 'password' => $password])->first();

        // If a row is returned, the login is successful
        if ($query) {
            return $query; // Return user data
        } else {
            return false; // Login failed
        }
    }
}
