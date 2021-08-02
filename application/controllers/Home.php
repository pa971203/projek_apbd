<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            "title" => "Home",
            "pages" => "Home/index",
        ];
        $this->load->view('Router/route',$data);
    }
}
