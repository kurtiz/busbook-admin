<?php

namespace App\Database\Seeds;

use App\Models\BusesModel;
use App\Models\DestinationsModel;
use App\Models\DriversModel;
use App\Models\TicketsModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TicketsSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
	{
		$destinations = (new DestinationsModel)->getDestinations();
		$drivers = (new DriversModel)->getDrivers();
		$buses = (new BusesModel)->getBuses();
        $ticketModel = new TicketsModel();
        $faker = Factory::create();

        $files = array();
        $handle = opendir(APPPATH . '../public/uploads/tickets/');

        if ($handle) {
            while (($entry = readdir($handle)) !== FALSE) {
                $files[] = $entry;
            }
        }

        closedir($handle);

        $files = array_reverse($files);
        array_pop($files);
        array_pop($files);

        for ($i = 0; $i < 150; $i++) {
            $date = (array)$faker->dateTimeBetween('now', '1 week');
            $date = $date['date'];
            $ticketModel->addTicket(
                [
                    "ticket_id" => hash("md5", "ticket" . date("ymdhisa") . random_int(84, 2598654784)),
                    "destination_id" => $destinations[random_int(0,47)]["destination_id"],
                    "bus_id" => $buses[random_int(0,98)]["bus_id"],
                    "driver_id" => $drivers[random_int(0,46)]["driver_id"],
                    "departure_date" => explode(" ", $date)[0],
                    "departure_time" => $faker->time("H:i:s"),
                    "ticket_image" => $files[random_int(0,7)],
                    "ticket_cost" => random_int(20,250)
                ]
            );
        }
	}
}
