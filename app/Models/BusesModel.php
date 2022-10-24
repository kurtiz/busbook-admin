<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Bus Model
 * @package App\Models
 */
class BusesModel extends Model
{

    protected $tbl = "bus";

    /**
     * @param array $fields is the array of data needed to create a product
     *
     * @return bool returns true if the operation was successful and returns false otherwise
     */
    public function addBus(array $fields)
    {
        $builder = $this->db->table($this->tbl);
        $builder->insert($fields);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * retrieves data of all buses
     * @return array|false returns the buses info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getBuses()
    {
        $builder = $this->db->table($this->tbl);
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }

    /**
     * retrieves data of a single bus
     * @param int | mixed $bus_id is the id of the product to be retrieved
     *
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getBus(int $bus_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('product_id', $bus_id);
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }

    /**
     * @param $clauses array | mixed conditions for delete the bus
     * @return bool returns true if successful or returns false otherwise
     */
    public function deleteBus(array $clauses)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where($clauses);
        $builder->delete();
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}