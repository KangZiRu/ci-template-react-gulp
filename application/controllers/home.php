<?php defined('BASEPATH') OR die('No direct script access is allowed!');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load_view('index');
    }


    public function login()
    {
        ! is_logged_in() OR show_404();

        $this->exclude_header()
             ->load_js('login')
             ->load_css('login')
             ->load_view('login');
    }


    public function logout()
    {
        session_destroy();
        redirect('/');
    }
}
