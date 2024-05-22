<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

}