<?php defined('BASEPATH') OR die('No direct script access is allowed!');


if ( ! function_exists('redirect'))
{
    function redirect($url)
    {
        header('Location: '.base_url().$url);
    }
}


if ( ! function_exists('ajax_callback'))
{
    function ajax_callback($status, $data=NULL, $message=NULL)
    {
        $data_to_echo = array (
                'status' => $status,
                'message' => $message
            );

        if ($data !== NULL)
        {
            $data_to_echo['data'] = $data;
        }

        echo json_encode($data_to_echo);
    }
}
