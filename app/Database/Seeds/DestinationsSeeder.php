<?php

namespace App\Database\Seeds;

use App\Models\DestinationsModel;
use CodeIgniter\Database\Seeder;
use Exception;

class DestinationsSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        helper("text");
        $destinationModel = new DestinationsModel;
        $destinations = ['Akosombo', 'Accra', 'Adenta', 'Aflao', 'Agogo', 'Agona Swedru', 'Akim Oda', 'Anloga', 'Asamankese', 'Ashiaman', 'Bawku', 'Berekum', 'Bolgatanga', 'Cape Coast', 'Dome', 'Effiakuma', 'Ejura', 'Gbawe', 'Ho', 'Hohoe', 'Kasoa', 'Kintampo', 'Koforidua', 'Konongo', 'Lashibi', 'Madina', 'Mampong', 'Nkawkaw', 'Nsawam', 'Nungua', 'Obuasi', 'Oduponkpehe', 'Prestea', 'Savelugu', 'Suhum', 'Sunyani', 'Taifa', 'Tamale', 'Tarkwa', 'Techiman', 'Teshie', 'Wa', 'Wenchi', 'Winneba', 'Yendi'];

        for ($i = 0; $i < count($destinations); $i++) {
            $destinationModel->addDestination(
                [
                    "destination_id" => hash("md5", "destination" . date("ymdhisa") . random_int(84, 2598654784)),
                    "destination" => $destinations[$i]
                ]
            );
        }
    }
}
