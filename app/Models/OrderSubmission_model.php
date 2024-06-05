<?php namespace App\Models;

use CodeIgniter\Model;

class OrderSubmission_model extends Model
{

    protected $table = 'documents';
    protected $primaryKey = 'Document_id';
    protected $allowedFields = ['Team_id', 'User_id', 'language', 'target_language', 'urgent', 'cost', 'est_time', 'state', 'upload_date', 'file_path', 'employee_id', 'Translation_path'];
}

?>