<?php namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];

    public function getManagers(){
        return $this->db->table('users')
                        ->where('Role', 1)
                        ->get()
                        ->getResultArray();
    }

}

?>