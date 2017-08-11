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
}
