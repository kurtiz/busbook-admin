<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Driver Model
 * @package App\Models
 */
class DriversModel extends Model
{

    protected $tbl = "driver";

    /**
     * @param array $fields is the array of data needed to create a product
     *
     * @return bool returns true if the operation was successful and returns false otherwise
     */
    public function addDriver(array $fields)
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
    public function getDrivers()
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
     * @param int | mixed $driver_id is the id of the product to be retrieved
     *
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getDriver(string $driver_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('driver_id', $driver_id);
        $result = $builder->get();
        if ($result->resultID->num_rows == 1) {
            return $result->getRowObject();
        } else {
            return false;
        }
    }

    /**
     * @param $clauses array | mixed conditions for delete the bus
     * @return bool returns true if successful or returns false otherwise
     */
    public function deleteDriver(array $clauses)
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

    public function updateDriver(array $clause, array $fields)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where($clause);
        $builder->update($fields);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }

    }

}