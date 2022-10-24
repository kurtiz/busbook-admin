<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Ticket Model
 * @package App\Models
 */
class TicketsModel extends Model
{

    protected $tbl = "ticket";

    /**
     * @param array $fields is the array of data needed to create a ticket
     *
     * @return bool returns true if the operation was successful and returns false otherwise
     */
    public function addTicket(array $fields)
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
     * retrieves data of all tickets
     * @return array|false returns the tickets' info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getTickets()
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
     * @param int | mixed $ticket_id is the id of the ticket to be retrieved
     *
     * @return array|false returns the ticket info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getTicket(string $ticket_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('ticket_id', $ticket_id);
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
    public function deleteTicket(array $clauses)
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

    public function updateTicket(array $clause, array $fields)
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

    public function updateTicketImg(array $clause, array $field)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where($clause);
        $builder->update($field);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}