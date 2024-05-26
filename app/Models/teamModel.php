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

    <!-- public function addTeam($teamData)
    {
        $this->insert($teamData);
        return $this->insertID();
    } -->
