<?php

    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\DashboardModel;
    use App\Models\ProfileModel;


    class Profile extends Controller{

        public $dashModel;
        public $profileModel;
        public $storeModel;
        public $admin_id;

        public function __construct() {
            $this->dashModel = new DashboardModel();
            $this->profileModel = new ProfileModel();
            $this->admin_id = session()->get("admin_id");
            session()->setTempdata('profile','active',1);
        }

        public function index() {

            if(!session()->has("logged_user")) {

                return redirect()->to(base_url());
    
            }

            $admin_id = session()->get("admin_id");

            $data['userdata'] = $this->dashModel->getLoggedUserData((string)$admin_id);
            
            return view('profile',$data);

        }

        public function profileUpdate(){
            $profile = [
                "admin_name"      => $this->request->getVar("fullname"),
                "admin_email"     => $this->request->getVar("email"),
                "admin_contact"    => $this->request->getVar("mobile")
            ];

            $storeInfo = [
                "admin_id" => session()->get("admin_id")
            ];

            $return = $this->profileModel->updateUserInfo($storeInfo, $profile);
            if ($return == true){
                $message = [
                    "msg" => "success"
                ];
            }else {
                $message = [
                    "msg" => "error"
                ];
            }

            return json_encode($message);
        }
    }
