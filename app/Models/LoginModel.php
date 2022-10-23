<?php
namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model{

    protected $tbl = "admin";

    public function verifyEmail($email) {
        $builder = $this->db->table($this->tbl);
        $builder->select();
        $builder->where('admin_email', $email);
        $result = $builder->get();

        if ($result->resultID->num_rows == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }
}
