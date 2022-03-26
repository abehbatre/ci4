<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = array(
            'title' => 'Dashboard',
            'userRole' => user()->getRoles(),
        );

        return view('home', $data);
    }
}
