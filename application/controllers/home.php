<?php defined('BASEPATH') OR die('No direct script access is allowed!');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        is_logged_in() OR redirect('login');

        if ($this->session->level == 9)
        {
            $this->load_react(array ('employee', 'schedule', 'calendar'));
        }
        else
        {
            $this->load_react('patient');
            $this->load_react('medical-record');
        }

        $this->load_js(array ('index'))
             ->load_css('index')
             ->load_view('index');
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
