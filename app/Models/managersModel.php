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

