CREATE DATABASE `bus_ticket`;
USE `bus_ticketing`;

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_passkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_passkey`) VALUES
('a7eadeeecef9102dffb6b0716218cfc2c69be4005fc61f6dc2bed3119c5b4476', 'Charles', 'mail@user.com', '0245365873', '8af140fa62f29325d7db5f2425a623b7fe08c4438bb65cd405207f1ef2d6a270');

CREATE TABLE `booking` (
  `bk_id` varchar(255) NOT NULL,
  `amount` decimal(19,2) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date_booked` date NOT NULL,
  `time_booked` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_details` (
  `bk_deatils_id` varchar(255) NOT NULL,
  `bk_id` varchar(255) NOT NULL,
  `tk_id` varchar(255) NOT NULL,
  `tk_cost` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bus` (
  `bus_id` varchar(255) NOT NULL,
  `bus_model` varchar(255) NOT NULL,
  `bus_capacity` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `destination` (
  `destination_id` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `driver` (
  `driver_id` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_contact` varchar(255) NOT NULL,
  `driver_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `ticket` (
  `ticket_id` varchar(255) NOT NULL,
  `destination_id` varchar(255) NOT NULL,
  `departure_time` time NOT NULL,
  `departure_date` date NOT NULL,
  `ticket_cost` decimal(19,2) NOT NULL,
  `bus_id` varchar(255) NOT NULL,
  `driver_id` varchar(255) NOT NULL,
  `ticket_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_passkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `usr_id` (`user_id`);

ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bk_deatils_id`),
  ADD KEY `bk_id` (`bk_id`),
  ADD KEY `tk_id` (`tk_id`);

ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`);

ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `dest_id` (`destination_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `driver_id` (`driver_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `booking`
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `booking_details`
  ADD CONSTRAINT `bk_id` FOREIGN KEY (`bk_id`) REFERENCES `booking` (`bk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tk_id` FOREIGN KEY (`tk_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ticket`
  ADD CONSTRAINT `bus_id` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dest_id` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_id` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;