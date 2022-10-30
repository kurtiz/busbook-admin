<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Ticket Model
 * @package App\Models
 */
class BookingModel extends Model
{

    protected $tbl = "booking";
    protected $nextTbl = "booking_details";

    /**
     * retrieves data of all buses
     * @return array|false returns the buses info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getBookings()
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
     * @param string $booking_id
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getBooking(string $booking_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('bk_id', $booking_id);
        $result = $builder->get();
        if ($result->resultID->num_rows == 1) {
            return $result->getRowObject();
        } else {
            return false;
        }
    }

    /**
     * retrieves data of a single bus
     * @param string $booking_id
     * @return array|false returns the product info as an array if the operation was successful
     * and returns false otherwise
     */
    public function getBookingDetails(string $booking_id)
    {
        $builder = $this->db->table($this->tbl);
        $builder->where('bk_id', $booking_id);
        $result = $builder->get();
        if ($result->resultID->num_rows == 1) {
            return $result->getRowObject();
        } else {
            return false;
        }
    }
}