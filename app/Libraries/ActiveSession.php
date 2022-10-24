<?php
namespace App\Libraries;

class ActiveSession
{
    /*
     * checks for active session and redirects to the
     * login page if there isn't any
     */
    public function check($session)
    {
        if(!session()->has($session)) {
            header("location: " . base_url());
            exit();
        }
    }
}