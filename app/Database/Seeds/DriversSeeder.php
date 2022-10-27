<?php

namespace App\Database\Seeds;

use App\Models\DriversModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class DriversSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
	{
        helper("text");
        $faker = Factory::create();
        $driverModel =  new DriversModel;

        for ($i = 0; $i < 45; $i++) {
            $driverModel->addDriver(
                [
                    "driver_id" => hash("md5", "driver" . date("ymdhisa") . random_int(84, 2598654784)),
                    "driver_name" => $faker->name,
                    "driver_contact" => $faker->phoneNumber,
                    "driver_email" => $faker->email,
                ]
            );
        }
	}
}
