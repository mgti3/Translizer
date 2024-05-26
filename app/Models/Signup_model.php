<?php

namespace App\Models;

use CodeIgniter\Model;

class Signup_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['email', 'password', 'username'];

}
