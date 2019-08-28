<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login') === false OR $this->session->userdata('role_id')!=1){
			redirect();
		}

		$this->load->model('admin_model','admin',true);
	}


	public function index(){

		$data['sp_totals'] = $this->admin->count_all('sp_teams');
		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/index',$data);
		$this->load->view('backend/layout/footer');
	}
	public function sp_peserta(){

		$data['teams'] = $this->admin->get_all_teams('sp_teams');

 		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/sp_peserta',$data);
		$this->load->view('backend/layout/footer');
	}
	public function abstrak(){

		$data['teams'] = $this->admin->get_all_abstract('abstract');

		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/sp_abstrak',$data);
		$this->load->view('backend/layout/footer');
	}

	public function lolos_abstrak($id,$team){

		$this->admin->update_progress('sp_teams',array('progress'=>5),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-success">Berhasil meloloskan tim <strong>'.$team.'</strong></div>');
		redirect('admin/science-project/abstrak');
	}

	public function tidak_lolos_abstrak($id,$team){

		$this->admin->update_progress('sp_teams',array('progress'=>4),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-danger">Berhasil Menggugurkan tim <strong>'.$team.'</strong></div>');
		redirect('admin/science-project/abstrak');
	}

	public function sp_payment(){
		$data['teams'] = $this->admin->sp_payment('payments');
		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/sp_payment',$data);
		$this->load->view('backend/layout/footer');
	}

	public function payment_confirmation($id,$team){

		$this->admin->update_progress('sp_teams',array('progress'=>7),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-success">Pembayaran tim <strong>'.$team.'</strong> berhasil dikonfirmasi</div>');
		redirect('admin/science-project/pembayaran');
	}

	public function payment_refuse($id,$team){

		$this->admin->delete_payment('payments',$id);
		$this->admin->update_progress('sp_teams',array('progress'=>5),$id);
		$this->session->set_flashdata('messages','<div class="alert alert-danger">Pembayaran tim <strong>'.$team.'</strong berhasil ditolak></div>');
		redirect('admin/science-project/pembayaran');
	}

	public function sp_proposal(){

		$data['teams'] = $this->admin->get_all_proposal('proposal');

		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/sp_proposal',$data);
		$this->load->view('backend/layout/footer');
	}

	public function lolos_proposal($id,$team){

		$this->admin->update_progress('sp_teams',array('progress'=>10),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-success">Berhasil meloloskan tim <strong>'.$team.'</strong></div>');
		redirect('admin/science-project/proposal');
	}

	public function tidak_lolos_proposal($id,$team){

		$this->admin->update_progress('sp_teams',array('progress'=>9),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-danger">Berhasil Menggugurkan tim <strong>'.$team.'</strong></div>');
		redirect('admin/science-project/proposal');
	}

	public function detail_anggota(){
		
		$data['team'] = $this->admin->get_detail_teams('sp_teams',$this->uri->segment(4));
		
 		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/detail_anggota',$data);
		$this->load->view('backend/layout/footer');
	}



	public function cp_detail_anggota(){
		
		$data['team'] = $this->admin->get_detail_teams('competition_teams',$this->uri->segment(4));
		
 		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/detail_anggota',$data);
		$this->load->view('backend/layout/footer');
	}


	public function cp_peserta(){

		$data['teams'] = $this->admin->get_all_teams('competition_teams');

 		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/cp_peserta',$data);
		$this->load->view('backend/layout/footer');
	}

	public function cp_payment(){
		$data['teams'] = $this->admin->cp_payment('payments');
		$this->load->view('backend/layout/header');
		$this->load->view('backend/admin/cp_payment',$data);
		$this->load->view('backend/layout/footer');
	}

	public function cp_payment_confirmation($id,$team){

		$this->admin->update_progress('competition_teams',array('progress'=>4),$id);

		$this->session->set_flashdata('messages','<div class="alert alert-success">Pembayaran tim <strong>'.$team.'</strong> berhasil dikonfirmasi</div>');
		redirect('admin/competition/pembayaran');
	}

	public function cp_payment_refuse($id,$team){

		$this->admin->delete_payment('payments',$id);
		$this->admin->update_progress('competition_teams',array('progress'=>2),$id);
		$this->session->set_flashdata('messages','<div class="alert alert-danger">Pembayaran tim <strong>'.$team.'</strong berhasil ditolak></div>');
		redirect('admin/competition/pembayaran');
	}


}