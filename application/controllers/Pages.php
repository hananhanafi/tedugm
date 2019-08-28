<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Pages extends CI_Controller {
 	
 	public function __construct(){
		parent::__construct();
	}

 	public function index(){
		$this->load->view('frontend/layouts/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/layouts/footer');
	}
 	public function line()
	{
		$this->load->view('frontend/layouts/header');
		$this->load->view('frontend/category/line');
		$this->load->view('frontend/layouts/footer');
	}
	public function sumo()
	{
		$this->load->view('frontend/layouts/header');
		$this->load->view('frontend/category/robot');
		$this->load->view('frontend/layouts/footer');
	}
	public function science()
	{
		$this->load->view('frontend/layouts/header');
		$this->load->view('frontend/category/science');
		$this->load->view('frontend/layouts/footer');
	}
 }