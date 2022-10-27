<?php

namespace App\Controllers;

use App\Models\LoginModel;
use Faker\Factory;

class Home extends BaseController
{

    public $loginModel;
    public $session;

    public function __construct()
    {
        helper("form");
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [];
        if (session()->has('logged_user')) {
            return redirect()->to(base_url() . '/dashboard');
        }

        if ($this->request->getMethod() == 'post') {


            $email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
            $password = $this->request->getVar('password');

            $userdata = $this->loginModel->verifyEmail(strtolower($email));

            if ($userdata) {

                if (
                    hash("gost-crypto",
                        hash("md5", $password) . hash("md4", $password)) == $userdata['admin_passkey']
                ) {
                    $this->session->set("logged_user", $userdata['admin_email']);
                    $this->session->set("admin_id", $userdata['admin_id']);
                    $this->session->setTempdata("name", $userdata['admin_name'], 3);

                    return redirect()->to(base_url() . '/dashboard');

                } else {

                    $this->session->setTempdata("error", "Sorry! Credentials do not match!", 3);
                    return redirect()->to(current_url());
                }
            } else {

                $this->session->setTempdata("error", "Sorry! Credentials do not match!", 3);
                return redirect()->to(current_url());
            }

        }

        return view('login', $data);
    }

    public function test(){

    }
}
