<?php

namespace App\Controllers;

use App\Libraries\ActiveSession;
use App\Models\DestinationsModel;
use CodeIgniter\Controller;
use App\Models\DashboardModel;


class Destinations extends Controller
{

    public $dashModel;
    public $admin_id;
    public $destinationModel;

    public function __construct()
    {
        $this->dashModel = new DashboardModel();
        $this->destinationModel = new DestinationsModel();
        $this->admin_id = session()->get("admin_id");
        helper("form");
        session()->setTempdata('destinations', 'active', 1);
    }

    public function index()
    {

        (new ActiveSession)->check("logged_user");


        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['destinations'] = $this->destinationModel->getDestinations();

        return view('destinations', $data);
    }

    public function add()
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "destination_id" => hash("md5", "bus" . date("ymdhisa")),
                "destination" => $this->request->getVar("destination")
            ];
            $updateDestination = $this->destinationModel->addDestination($fields);

            if ($updateDestination) {
                session()->setTempdata("success", $fields["destination"] . " was added successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while adding the bus", 3);
            }
        }

        return view("add_destination", $data);
    }

    public function view($destination_id)
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        $data['destination'] = $this->destinationModel->getDestination($destination_id);
        if ($data['destination']) {
            return view("view_destination", $data);
        }
        return redirect()->to(base_url()."/destinations");
    }

    public function edit($destination_id){
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "destination" => $this->request->getVar("destination"),
            ];

            $clause = [
                "destination_id" => $destination_id
            ];

            $updatedBus = $this->destinationModel->updateDestination($clause, $fields);

            if ($updatedBus) {
                session()->setTempdata("success", $fields["destination"] . " has been updated successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while updating bus info", 3);
            }
            return redirect()->to(base_url(). "/destinations/view/" . $destination_id);
        }

        $data['destination'] = $this->destinationModel->getDestination($destination_id);
        if ($data['destination']) {
            return view("edit_destination", $data);
        }
        return redirect()->to(base_url()."/destinations");
    }
    
    
    public function delete($destination_id){
        (new ActiveSession)->check("logged_user");

        if($this->request->getMethod() == "post"){
            $clause = [
                "destination_id" => $destination_id
            ];

            if($this->destinationModel->deleteDestination($clause)){
                $message = ['msg' => "success"];
            } else {
                $message = ['msg' => "error"];
            }

            return json_encode($message);
        }
        return json_encode(["msg" => "Invalid Request"]);
    }
}
