<?php

namespace App\Controllers;

use App\Libraries\ActiveSession;
use App\Models\DriversModel;
use CodeIgniter\Controller;
use App\Models\DashboardModel;


class Drivers extends Controller
{

    public $dashModel;
    public $admin_id;
    public $driverModel;

    public function __construct()
    {
        $this->dashModel = new DashboardModel();
        $this->driverModel = new DriversModel();
        $this->admin_id = session()->get("admin_id");
        session()->setTempdata('drivers', 'active', 1);
    }

    public function index()
    {

        (new ActiveSession)->check("logged_user");


        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);
        $data['drivers'] = $this->driverModel->getDrivers();

        return view('drivers', $data);
    }

    public function add()
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "driver_id" => hash("md5", "driver" . date("ymdhisa")),
                "driver_name" => $this->request->getVar("driver_name"),
                "driver_contact" => $this->request->getVar("driver_contact"),
                "driver_email" => $this->request->getVar("driver_email"),
            ];

            $addedDriver = $this->driverModel->addDriver($fields);

            if ($addedDriver) {
                session()->setTempdata("success", $fields["driver_name"] . " has been added successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while adding the driver", 3);
            }
        }

        return view("add_driver", $data);
    }

    public function view($driver_id)
    {
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        $data['driver'] = $this->driverModel->getDriver($driver_id);
        if ($data['driver']) {
            return view("view_driver", $data);
        }
        return redirect()->to(base_url()."/drivers");
    }

    public function edit($driver_id){
        (new ActiveSession)->check("logged_user");

        $data['userdata'] = $this->dashModel->getLoggedUserData((string)$this->admin_id);

        if ($this->request->getMethod() == "post") {
            $fields = [
                "driver_name" => $this->request->getVar("driver_name"),
                "driver_contact" => $this->request->getVar("driver_contact"),
                "driver_email" => $this->request->getVar("driver_email"),
            ];

            $clause = [
                "driver_id" => $driver_id
            ];

            $updatedDriver = $this->driverModel->updateDriver($clause, $fields);

            if ($updatedDriver) {
                session()->setTempdata("success", $fields["driver_name"] . " has been updated successfully", 3);
            } else {
                session()->setTempdata("error", "An Error has occurred while updating driver info", 3);
            }
            return redirect()->to(base_url(). "/drivers/view/" . $driver_id);
        }

        $data['driver'] = $this->driverModel->getDriver($driver_id);
        if ($data['driver']) {
            return view("edit_driver", $data);
        }
        return redirect()->to(base_url()."/drivers");
    }
    
    
    public function delete($driver_id){
        (new ActiveSession)->check("logged_user");

        if($this->request->getMethod() == "post"){
            $clause = [
                "driver_id" => $driver_id
            ];

            if($this->driverModel->deleteDriver($clause)){
                $message = ['msg' => "success"];
            } else {
                $message = ['msg' => "error"];
            }

            return json_encode($message);
        }
        return json_encode(["msg" => "Invalid Request"]);
    }
}
