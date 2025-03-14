<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(){
        return view('panel.home');
    }


    public function logout()
    {

        $whitelist = array('127.0.0.1', '::1');

        // check if the server is in the array
        if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {

            \App\Helpers\CasPhp\phpCAS::logoutWithRedirectService('https://video.firat.edu.tr/');
            // this is a local environment
        } else {
            \App\Helpers\CasPhp\phpCAS::logoutWithRedirectService('');
        }

    }
}
