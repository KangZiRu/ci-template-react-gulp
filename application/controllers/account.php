<?php defined('BASEPATH') OR die('No direct script access is allowed!');



class Account extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function login()
    {
        $id = $this->input->post('id');
        $pass = $this->input->post('password');

        $this->load->model('employee_model', 'emp');

        $data = $this->emp->get($id);

        if (count($data) == 0)
        {
            ajax_callback(FALSE,
                          NULL,
                          'User not found!');

            return FALSE;
        }

        $data = $data[0];

        if ($data->password === $pass)
        {
            $this->session->set_userdata( 
                array (
                    'userid' => $id,
                    'username' => $data->name,
                    'photo' => $data->photo,
                    'salary' => $data->salary,
                    'join_date' => $data->join_date,
                    'level' => $data->level,
                    'note' => $data->note
                )
            );

            ajax_callback(TRUE, NULL, 'Login success!');
        }
        else
        {
            ajax_callback(FALSE,
                          NULL,
                          'Wrong password!');
        }
    }
}
