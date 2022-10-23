<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class ProfileModel extends Model {

        protected $tbl = "admin";

        public function updateUserInfo($clause, $profile){
            $builder = $this->db->table($this->tbl);
            $builder->where($clause);
            $builder->update($profile);
            if ($this->db->affectedRows() == 1) {
                return true;
            }else {
                return $this->db->error();
            }
        }
    }

