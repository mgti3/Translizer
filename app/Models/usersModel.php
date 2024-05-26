<?php namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];

<<<<<<< HEAD
    public function getManagers()
    {
        return $this->where('Role', 1)->findAll();
=======
    public function getUsersByRole($roleValue)
    {
        
        return $this->where('Role', $roleValue)->findAll();
>>>>>>> 8ed953a51f87b444dd1ceea500707dcac6f830df
    }
     
    // protected $table = 'users';
    // protected $primaryKey = 'User_id';
    // protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];

    // public function getManagers(){
    //     return $this->db->table('users')
    //                     ->where('Role', 1)
    //                     ->get()
    //                     ->getResultArray();
    // }

}

?>