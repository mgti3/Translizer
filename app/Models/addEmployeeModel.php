<?php namespace App\Models;

use CodeIgniter\Model;

class addEmployeeModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];
}

?>