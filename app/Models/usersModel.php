<?php namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['username', 'password', 'email', 'Role', 'Team_id'];
<<<<<<< HEAD

    
     

=======
>>>>>>> 70c21c2e93f6e45e7799761260034830bc099b2c
}

?>