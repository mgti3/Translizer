<?php 
namespace App\Models;

use CodeIgniter\Model;

class managersModel extends Model
{
    protected $table = 'managers';
    protected $primaryKey = 'manager_id';
    protected $allowedFields = ['Team_id', 'username', 'password', 'email'];
}
?>

<!-- manager_id: primary key and auto increment 
Team_id: forign key from teams table 
username: varchar 
password: varchar 
email: varchar  -->