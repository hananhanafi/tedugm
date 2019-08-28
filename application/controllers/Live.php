<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Live extends CI_Controller {
 	
 	public function __construct(){
		parent::__construct();
	}

 	public function index(){
        

        $this->load->view('live/layouts/header');
        $this->load->view('live/index');
        $this->load->view('live/layouts/footer');
    }
    
    public function line_followers()
    {
        $this->load->view('live/layouts/header');
        $this->load->view('live/lf');
        $this->load->view('live/layouts/footer');
    }

    public function sumo_robots()
    {
        $this->load->view('live/layouts/header');
        $this->load->view('live/sm');
        $this->load->view('live/layouts/footer');
    }

    public function science_projects()
    {
        $this->load->view('live/layouts/header');
        $this->load->view('live/sp');
        $this->load->view('live/layouts/footer');
    }

 }