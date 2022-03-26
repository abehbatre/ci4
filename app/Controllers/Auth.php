<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{


    function __construct()
    {
        $this->model = new UserModel();
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }


    /* controller to create a new user */
    public function create()
    {

        /* calling the insert function on model sending the form */
        $this->model->init_insert($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user added!</b></div>");

        /* return to default page */
        return redirect("/");
    }
}
