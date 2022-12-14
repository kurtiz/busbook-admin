<?php

    namespace App\Controllers;
    use App\Libraries\ActiveSession;
    use CodeIgniter\Controller;
    use App\Models\DashboardModel;
    use CodeIgniter\HTTP\RedirectResponse;

    class Dashboard extends Controller{

        /**
         * an instance of the DashboardModel Class
         * @var object $dashModel
         */
        public $dashModel;

        /**
         * user id of the logged user
         * @var array|string|null
         */
        public $admin_id;

        /**
         * array of the data of the current logged user
         * @var false|mixed
         */
        public $userdata;

        /**
         * Store Class constructor.
         */
        public function __construct() {
            $this->dashModel = new DashboardModel();
            $this->admin_id = session()->get("admin_id");
            helper(['form']);
            session()->setTempdata('dashboard','active',1);
        }


        public function index() {

            (new ActiveSession)->check("logged_user");

            $data = [];

            return view('dashboard',$data);
        }

        public function logout(): RedirectResponse
        {
            session()->remove("logged_user");
            session()->destroy();
            return redirect()->to(base_url());
        }
    }
