<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {

    public function index(){
        $this->load->view('error404.php');
    }
}
