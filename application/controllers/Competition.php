
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competition extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login')===FALSE  OR  $this->session->userdata('role_id') != 3){
			redirect();
		
		}

		$this->load->library(array('form_validation','upload'));
		$this->load->helper('form');
		$this->load->model('competition_teams_model','cp',true);
	}


	public function index(){	

		//get team details data
		$data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/competition/index',$data);
		$this->load->view('backend/layout/footer');
	}

	public function anggota(){


		$data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/competition/anggota',$data);
		$this->load->view('backend/layout/footer');

	}

	public function update_member($type=NULL){
		if($type == NULL){
			redirect('competition/anggota');

		}elseif($type == 'ketua'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['leader_name'].'profile';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('leader_photo')){

            	 $data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload pas foto ketua tim bersifat wajib');
                 redirect('competition/anggota');
                
            }else{
            	 $photos =  $this->upload->data('file_name');  
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['leader_name'].'identity';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

			if(!$this->upload->do_upload('leader_identity')){
            	 $data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('competition/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'leader_identity' 	  	=> $post['leader_name'],
						'leader_phone' 		=> $post['leader_phone'],
						'leader_birth'	 	=> $post['leader_birth'],
						'leader_photo'    	=> $photos,
						'leader_identity' 	=> $identity
					);

           	 	$this->cp->update_member('competition_teams',$data,$this->session->userdata('user_id'));
            	redirect('competition/anggota');
        	}
		}elseif($type == 'member1'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member1_name'].'profile';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if($this->upload->do_upload('member1_photo')){  
                $photos =  $this->upload->data('file_name');   
            }else{
            	$photos  = $post['cur_photo'];
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member1_name'].'identity';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

			if(!$this->upload->do_upload('member1_identity')){
            	 $data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('competition/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'member1_name' 	  	=> $post['member1_name'],
						'member1_phone' 	=> $post['member1_phone'],
						'member1_birth'	 	=> $post['member1_birth'],
						'member1_photo'    	=> $photos,
						'member1_identity' 	=> $identity
					);

            	$this->cp->update_member('competition_teams',$data,$this->session->userdata('user_id'));
           	 	redirect('competition/anggota');
            }

           

		}elseif($type == 'pendamping'){

			$data = array(
					'supervisor_name'  => $this->input->post('supervisor_name'),
					'supervisor_phone' => $this->input->post('supervisor_phone'),
					);

			$this->cp->update_member('competition_teams',$data,$this->session->userdata('user_id'));
            redirect('competition/anggota');

		}elseif($type == 'member2'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member2_name'].'profile';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if($this->upload->do_upload('member2_photo')){

            	unlink('./uploads/users/photos/'.$post['cur_photo']);   
                $photos =  $this->upload->data('file_name');   
            }else{
            	$photos  = $post['cur_photo'];
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member2_name'].'identity';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

            if(!$this->upload->do_upload('member2_identity')){
            	 $data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('competition/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'member2_name' 	  	=> $post['member2_name'],
						'member2_phone' 	=> $post['member2_phone'],
						'member2_birth'	 	=> $post['member2_birth'],
						'member2_photo'    	=> $photos,
						'member2_identity' 	=> $identity
					);

            	$this->cp->update_member('competition_teams',$data,$this->session->userdata('user_id'));
           	 	redirect('competition/anggota');
            }
		}
	}

	public function delete_member($type=NULL){

		if($type==NULL){
			redirect('competition/anggota');
		}elseif($type=='member1'){

			$data = array(
					'member1_name' => '',
					'member1_photo' => '',
					'member1_birth' => '0000-00-00',
					'member1_phone' => '',
                    'member1_identity' => ''
			);

		}elseif($type=='member2'){
			$data = array(
					'member2_name' => '',
					'member2_photo' => '',
					'member2_birth' => '0000-00-00',
					'member2_phone' => '',
                    'member2_identity' => ''
			);
		}

		$this->cp->update_member('competition_teams',$data,$this->session->userdata('user_id'));
        redirect('competition/anggota');
	}

	public function lock_member(){

		$this->cp->update_progress('competition_teams',array('progress'=>2),$this->session->userdata('user_id'));
		redirect('competition');
	}


	

	public function pembayaran(){
		$data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
		$this->load->view('backend/layout/header');
		$this->load->view('backend/competition/pembayaran',$data);
		$this->load->view('backend/layout/footer');
	}

	public function submit_payment(){


		$file_name = strtolower($this->session->userdata('team_name')).'_payment_'.url_title($this->input->post('title'));

		$config['upload_path']          = './uploads/users/payments/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2048;
        $config['file_name']			= $file_name;
        $config['overwrite']			= TRUE;


        $this->upload->initialize($config);

        if(!$this->upload->do_upload('payment')){		

            $data['user'] = $this->cp->get_user('competition_teams',$this->session->userdata('user_id'));
            $data['error'] = $this->upload->display_errors();

            $this->load->view('backend/layout/header',$data);
            $this->load->view('backend/competition/pembayaran',$data);
            $this->load->view('backend/layout/footer');

        }else{
            $payment = $this->upload->data();
            $insert   = array(
            				'user_id' => $this->session->userdata('user_id'),
                     		'path'	  => $payment['file_name']
  		                );

                $this->cp->insert_payment('payments',$insert);
                $this->cp->update_progress('competition_teams',array('progress'=>3),$this->session->userdata('user_id'));
				redirect('competition');
            }
		

	}




}