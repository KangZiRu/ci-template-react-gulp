<?php defined('BASEPATH') OR die('No direct script access is allowed!');


if ( ! function_exists('redirect'))
{
    function redirect($url)
    {
        header('Location: '.base_url().$url);
    }
}
