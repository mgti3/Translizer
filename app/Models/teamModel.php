<?php 
namespace App\Models;

use CodeIgniter\Model;

class teamModel extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'Tid';
    protected $allowedFields = ['Team_name'];
}
?>

<!-- Tid: primary key auto increment 
Team_name: varchar  -->
