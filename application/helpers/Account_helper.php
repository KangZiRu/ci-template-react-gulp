<?php
if ( ! function_exists('is_logged_in'))
{
    function is_logged_in() {
        $CI = &get_instance();

        if ($CI->session->has_userdata('username') && $CI->session->has_userdata('userid'))
        {
            return TRUE;
        }

        return FALSE;
    }
}
