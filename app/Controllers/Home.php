<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
        );

        return view('home', $data);
    }
}
