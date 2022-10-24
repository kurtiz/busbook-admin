<?php

    namespace App\Controllers;
    use App\Libraries\ActiveSession;
    use App\Models\BusesModel;
    use CodeIgniter\Controller;
    use App\Models\DashboardModel;


    class Buses extends Controller {

        public $dashModel;
        public $admin_id;
        public $busModel;

        public function __construct() {
            $this->dashModel = new DashboardModel();
            $this->busModel = new BusesModel();
            $this->admin_id = session()->get("admin_id");
            session()->setTempdata('buses','active',1);
        }

        public function index() {

            (new ActiveSession)->check("logged_user");

            $admin_id = session()->get("admin_id");

            $data['userdata'] = $this->dashModel->getLoggedUserData((string)$admin_id);
            $data['buses'] = $this->busModel->getBuses();
            
            return view('buses',$data);

        }

        public function add(){

        }
    }
