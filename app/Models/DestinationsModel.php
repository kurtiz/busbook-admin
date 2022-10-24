<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Bus Model
 * @package App\Models
 */
class DestinationsModel extends Model
{

    protected $tbl = "destination";

    /**
     * @param array $fields is the array of data needed to create a product
     *
     * @return bool returns true if the operation was successful and returns false otherwise
     */
    public function addDestination(array $fields)
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
    public function getDestinations()
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
     * @param int | mixed $destination_id is the id of the product to be retrieved
     *
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getDestination(string $destination_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('destination_id', $destination_id);
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
    public function deleteDestination(array $clauses)
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

    public function updateDestination(array $clause, array $fields)
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