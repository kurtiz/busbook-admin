<?php

namespace App\Controllers;

use App\Libraries\ActiveSession;
use App\Models\BusesModel;
use CodeIgniter\Controller;
use App\Models\DashboardModel;


class Buses extends Controller
{

    public $dashModel;
    public $admin_id;
    public $busModel;

    public function __construct()
    {
        $this->dashModel = new DashboardModel();
        $this->busModel = new BusesModel();
        $this->admin_id = session()->get("admin_id");
        helper("form");
        session()->setTempdata('buses', 'active', 1);
    }

    public function index()
    {

        (new ActiveSession)->check("logged_user");


        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['buses'] = $this->busModel->getBuses();

        return view('buses', $data);
    }

    public function add()
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "bus_id" => hash("md5", "bus" . date("ymdhisa")),
                "bus_model" => $this->request->getVar("bus_model"),
                "bus_capacity" => $this->request->getVar("bus_capacity"),
                "bus_number" => strtoupper($this->request->getVar("bus_number")),
            ];
            $addedBus = $this->busModel->addBus($fields);

            if ($addedBus) {
                session()->setTempdata("success", $fields["bus_model"] . " was added successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while adding the bus", 3);
            }
        }

        return view("add_bus", $data);
    }

    public function view($bus_id)
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        $data['bus'] = $this->busModel->getBus($bus_id);
        if ($data['bus']) {
            return view("view_bus", $data);
        }
        return redirect()->to(base_url()."/buses");
    }

    public function edit($bus_id){
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "bus_model" => $this->request->getVar("bus_model"),
                "bus_capacity" => $this->request->getVar("bus_capacity"),
                "bus_number" => strtoupper($this->request->getVar("bus_number")),
            ];

            $clause = [
                "bus_id" => $bus_id
            ];

            $updatedBus = $this->busModel->updateBus($clause, $fields);

            if ($updatedBus) {
                session()->setTempdata("success", $fields["bus_model"] . " was updated successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while updating bus info", 3);
            }
            return redirect()->to(base_url(). "/buses/view/" . $bus_id);
        }

        $data['bus'] = $this->busModel->getBus($bus_id);
        if ($data['bus']) {
            return view("edit_bus", $data);
        }
        return redirect()->to(base_url()."/buses");
    }
    
    
    public function delete($bus_id){
        if($this->request->getMethod() == "post"){
            $clause = [
                "bus_id" => $bus_id
            ];

            if($this->busModel->deleteBus($clause)){
                $message = ['msg' => "success"];
            } else {
                $message = ['msg' => "error"];
            }

            return json_encode($message);
        }
        return json_encode(["msg" => "Invalid Request"]);
    }
}
