<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $tbl = "users";

    public function createUser(array $fields){
        $builder = $this->db->table($this->tbl);
        $builder->insert($fields);

        if ($this->db->affectedRows() == 1) {
            return true;
        }else {
            return false;
        }
    }

    public function verifyUser($email){
        $builder = $this->db->table($this->tbl);
        $builder->where("user_email", $email);
        $builder->select();
        $result = $builder->get();

        if ($result->resultID->num_rows == 1) {
            return $result->getRowObject();
        } else {
            return false;
        }
    }


    /**
     * retrieves data of a single bus
     * @param int | mixed $user_id is the id of the product to be retrieved
     *
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getUser(string $user_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('user_id', $user_id);
        $result = $builder->get();
        if ($result->resultID->num_rows == 1) {
            return $result->getRowObject();
        } else {
            return false;
        }
    }
}