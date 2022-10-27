<?php
include "app/Libraries/vendor/autoload.php";

use RobinTheHood\Terminal\Terminal;

$terminal = new Terminal();

$server = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
    $terminal->setColor(TERMINAL::RED);
    echo "Connection failed: " . $conn->connect_error;
    $terminal->setColor(TERMINAL::WHITE);
} else {
    $terminal->setColor(TERMINAL::GREEN);
    echo "Connected to server successfully\n";
    $terminal->setColor(TERMINAL::WHITE);

    $terminal->setColor(TERMINAL::CYAN);
    echo "Creating Database\n";
    $terminal->setColor(TERMINAL::WHITE);

    // checks if the database sql script file exists
    if (file_exists("db.sql")) {
        // reading query form db.sql file
        $query = file_get_contents("db.sql");

        // running the queries
        if (!$conn->multi_query($query)) {
            $terminal->setColor(TERMINAL::RED);
            echo $conn->error;
            echo "\n";
            $terminal->setColor(TERMINAL::WHITE);
        } else {
            $terminal->setColor(TERMINAL::GREEN);
            echo "Database created successfully\n";
            $terminal->setColor(TERMINAL::WHITE);

            $terminal->setColor(TERMINAL::CYAN);
            echo "Dumping dummy data......\n";
            $terminal->setColor(TERMINAL::WHITE);

            $busSeeder = system("php spark db:seed BusesSeeder", $return);
            if ($busSeeder) {
                $destinationSeeder = system("php spark db:seed DestinationsSeeder", $return);
                if ($destinationSeeder) {
                    $driverSeeder = system("php spark db:seed DriversSeeder", $return);
                    if ($driverSeeder) {
                        $ticketSeeder = system("php spark db:seed TicketsSeeder", $return);
                        if ($ticketSeeder) {
                            $terminal->setColor(TERMINAL::GREEN);
                            echo "Dummy Data has been dumped successfully\n";
                            $terminal->setColor(TERMINAL::WHITE);
                        } else {
                            $terminal->setColor(TERMINAL::RED);
                            echo $ticketSeeder;
                            $terminal->setColor(TERMINAL::WHITE);
                        }
                    } else {
                        $terminal->setColor(TERMINAL::RED);
                        echo $driverSeeder;
                        $terminal->setColor(TERMINAL::WHITE);
                    }
                } else {
                    $terminal->setColor(TERMINAL::RED);
                    echo $destinationSeeder;
                    $terminal->setColor(TERMINAL::WHITE);
                }
            } else {
                $terminal->setColor(TERMINAL::RED);
                echo $busSeeder;
                $terminal->setColor(TERMINAL::WHITE);
            }
        }

    } else {
        $terminal->setColor(TERMINAL::RED);
        echo "db.sql file could not be found. Please make sure the file in the right directory";
        $terminal->setColor(TERMINAL::WHITE);
    }
}


