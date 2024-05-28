<?php
namespace App\Models;

use CodeIgniter\Model;

class reportSubmission_model extends Model
{

    protected $table = 'reports';
    protected $primaryKey = 'Report_id';
    protected $allowedFields = ['user_id', 'status', 'Translation_id', 'content', 'rep_date', 'Title'];
}

?>