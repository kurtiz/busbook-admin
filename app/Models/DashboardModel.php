<?php

    namespace App\Models;
    use CodeIgniter\Model;

    /**
     * Class DashboardModel
     * @package App\Models
     */
    class DashboardModel extends Model {


        protected $tbl;

        /**
         *
         * @param string $admin_id is the unique identifier to get
         * the data of a specific user
         * @return false|mixed returns the data of the user of returns false if
         * the user doesn't exist
         *
         * @link https://instagram.com/brakhobbykurtiz Author Profile
         */
        public function getLoggedUserData(string $admin_id) {
            
            $builder = $this->db->table("");
            $builder->where('admin_id',$admin_id);
            $result = $builder->get();

            if ($result->resultID->num_rows == 1) {

                return $result->getRow();

            }else {

                return false;

            }
        }

    }
