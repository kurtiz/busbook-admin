<?php

namespace App\Controllers;

use App\Libraries\ActiveSession;
use App\Models\BusesModel;
use App\Models\DestinationsModel;
use App\Models\DriversModel;
use App\Models\TicketsModel;
use CodeIgniter\Controller;
use App\Models\DashboardModel;


class Tickets extends Controller
{

    public $dashModel, $admin_id, $ticketModel, $destinationModel,
        $busModel, $driverModel;

    public function __construct()
    {
        $this->dashModel = new DashboardModel();
        $this->ticketModel = new TicketsModel();
        $this->destinationModel = new DestinationsModel();
        $this->busModel = new BusesModel();
        $this->driverModel = new DriversModel();
        $this->admin_id = session()->get("admin_id");
        helper("form");
        session()->setTempdata('tickets', 'active', 1);
    }

    public function index()
    {

        (new ActiveSession)->check("logged_user");


        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['tickets'] = $this->ticketModel->getTickets();

        foreach ($data['tickets'] as $ticket) {
            $data['destinations'][] = $this->destinationModel->getDestination($ticket['destination_id'])->destination;
            $data['drivers'][] = $this->driverModel->getDriver($ticket['driver_id'])->driver_name;
            $data['buses'][] = $this->busModel->getBus($ticket['bus_id'])->bus_model;
        }

        return view('tickets', $data);
    }

    public function add()
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['destinations'] = $this->destinationModel->getDestinations();
        $data['drivers'] = $this->driverModel->getDrivers();
        $data['buses'] = $this->busModel->getBuses();

        if ($this->request->getMethod() == "post") {
            $fields = [
                "ticket_id" => hash("md5", "ticket" . date("ymdhisa")),
                "destination_id" => $this->request->getVar("destination"),
                "driver_id" => $this->request->getVar("driver"),
                "bus_id" => $this->request->getVar("bus"),
                "departure_time" => $this->request->getVar("time"),
                "departure_date" => $this->request->getVar("date"),
                "ticket_cost" => $this->request->getVar("ticket_cost"),
            ];

            $addedTicket = $this->ticketModel->addTicket($fields);

            if ($addedTicket) {

                if (null !== $this->request->getFile("image")) {

                    $file = $this->request->getFile('image');

                    if ($file->isValid() && !$file->hasMoved()) {

                        $fileName = $file->getRandomName();

                        if ($file->move(FCPATH . 'public/uploads/tickets', $fileName)) {

                            $path = base_url() . '/public/uploads/tickets/' . $fileName;

                            $clause = [
                                "ticket_id" => $fields['ticket_id']
                            ];

                            if ($this->ticketModel->updateTicketImg($clause, ['ticket_image' => $path])) {

                                session()->setTempdata('success', 'The ticket has been added successfully', 5);

                            } else {

                                session()->setTempdata('error', 'An error occurred while saving image.', 5);
                            }

                        } else {

                            session()->setTempdata('error', 'An error occurred while uploading file. <br>' . $file->getErrorString(), 3);

                        }
                    } else {
                        session()->setTempdata('success', 'The ticket has been added successfully', 5);
                    }
                    return redirect()->to(base_url() . "/tickets/add");

                }
                session()->setTempdata('success', 'The ticket has been added successfully', 5);
            } else {
                session()->setTempdata("error", "An Error has occurred while adding the ticket", 3);
            }
        }

        return view("add_ticket", $data);
    }

    public function view($ticket_id)
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['destinations'] = $this->destinationModel->getDestinations();
        $data['drivers'] = $this->driverModel->getDrivers();
        $data['buses'] = $this->busModel->getBuses();

        $data['ticket'] = $this->ticketModel->getTicket($ticket_id);
        if ($data['ticket']) {
            return view("view_ticket", $data);
        }
        return redirect()->to(base_url() . "/tickets");
    }

    public function edit($ticket_id)
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['destinations'] = $this->destinationModel->getDestinations();
        $data['drivers'] = $this->driverModel->getDrivers();
        $data['buses'] = $this->busModel->getBuses();
        $data['ticket'] = $this->ticketModel->getTicket($ticket_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "destination_id" => $this->request->getVar("destination"),
                "driver_id" => $this->request->getVar("driver"),
                "bus_id" => $this->request->getVar("bus"),
                "departure_time" => $this->request->getVar("time"),
                "departure_date" => $this->request->getVar("date"),
                "ticket_cost" => $this->request->getVar("ticket_cost"),
            ];

            $clause = [
                "ticket_id" => $ticket_id
            ];

            $updateTicket = $this->ticketModel->updateTicket($clause, $fields);

            if ($updateTicket) {

                if (null !== $this->request->getFile("image")) {

                    $file = $this->request->getFile('image');

                    if ($file->isValid() && !$file->hasMoved()) {

                        $fileName = $file->getRandomName();

                        if ($file->move(FCPATH . 'public/uploads/tickets', $fileName)) {

                            $path = base_url() . '/public/uploads/tickets/' . $fileName;

                            $clause = [
                                "ticket_id" => $fields['ticket_id']
                            ];

                            if ($this->ticketModel->updateTicketImg($clause, ['ticket_image' => $path])) {

                                session()->setTempdata('success', 'The ticket has been added successfully', 5);

                            } else {

                                session()->setTempdata('error', 'An error occurred while saving image.', 5);
                            }

                        } else {

                            session()->setTempdata('error', 'An error occurred while uploading file. <br>' . $file->getErrorString(), 3);

                        }
                    } else {
                        session()->setTempdata('success', 'The ticket has been added successfully', 5);
                    }
                    return redirect()->to(base_url() . "/tickets/view/" . $ticket_id);

                }
                session()->setTempdata('success', 'The ticket has been added successfully', 5);
            } else {
                session()->setTempdata("error", "An Error has occurred while adding the ticket", 3);
            }
            return redirect()->to(base_url() . "/tickets/view/" . $ticket_id);
        }

        $data['ticket'] = $this->ticketModel->getTicket($ticket_id);
        if ($data['ticket']) {
            return view("edit_ticket", $data);
        }
        return redirect()->to(base_url() . "/tickets");
    }


    public function delete($ticket_id)
    {
        (new ActiveSession)->check("logged_user");

        if ($this->request->getMethod() == "post") {
            $clause = [
                "ticket_id" => $ticket_id
            ];

            if ($this->ticketModel->deleteTicket($clause)) {
                $message = ['msg' => "success"];
            } else {
                $message = ['msg' => "error"];
            }

            return json_encode($message);
        }
        return json_encode(["msg" => "Invalid Request"]);
    }
}
