<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common_helper extends CI_Controller
{
    public function p($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
