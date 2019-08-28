
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login')===FALSE OR $this->session->userdata('role_id') !=2 ){
			redirect();
		}

		$this->load->library(array('form_validation','upload'));
		$this->load->helper('form');
		$this->load->model('Sp_model','sp',true);
	}


	public function index(){	

		//get team details data
		$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/sp/index',$data);
		$this->load->view('backend/layout/footer');
	}

	public function anggota(){


		$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/sp/anggota',$data);
		$this->load->view('backend/layout/footer');

	}

	public function update_member($type=NULL){
		if($type == NULL){
			redirect('science-project/anggota');

		}elseif($type == 'ketua'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = 'jpg|png|jpeg|JPEG|JPG';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['leader_name'].'profile'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('leader_photo')){

            	 $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload pas foto ketua tim bersifat wajib');
                 redirect('science-project/anggota');
                
            }else{
            	 $photos =  $this->upload->data('file_name');  
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = 'jpg|png|jpeg|JPEG|JPG';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['leader_name'].'identity'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

			if(!$this->upload->do_upload('leader_identity')){
            	 $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('science-project/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'leader_identity' 	  	=> $post['leader_name'],
						'leader_phone' 		=> $post['leader_phone'],
						'leader_birth'	 	=> $post['leader_birth'],
						'leader_photo'    	=> $photos,
						'leader_identity' 	=> $identity
					);

           	 	$this->sp->update_member('sp_teams',$data,$this->session->userdata('user_id'));
            	redirect('science-project/anggota');
        	}
		}elseif($type == 'member1'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = 'jpg|png|jpeg|JPEG|JPG';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member1_name'].'profile'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if($this->upload->do_upload('member1_photo')){  
                $photos =  $this->upload->data('file_name');   
            }else{
            	$photos  = $post['cur_photo'];
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = 'jpg|png|jpeg|JPEG|JPG';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member1_name'].'identity'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

			if(!$this->upload->do_upload('member1_identity')){
            	 $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('science-project/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'member1_name' 	  	=> $post['member1_name'],
						'member1_phone' 	=> $post['member1_phone'],
						'member1_birth'	 	=> $post['member1_birth'],
						'member1_photo'    	=> $photos,
						'member1_identity' 	=> $identity
					);

            	$this->sp->update_member('sp_teams',$data,$this->session->userdata('user_id'));
           	 	redirect('science-project/anggota');
            }

           

		}elseif($type == 'pendamping'){

			$data = array(
					'supervisor_name'  => $this->input->post('supervisor_name'),
					'supervisor_phone' => $this->input->post('supervisor_phone'),
					);

			$this->sp->update_member('sp_teams',$data,$this->session->userdata('user_id'));
            redirect('science-project/anggota');

		}elseif($type == 'member2'){

			$post = $this->input->post();

			$config['upload_path']          = './uploads/users/photos';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member2_name'].'profile'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if($this->upload->do_upload('member2_photo')){

            	unlink('./uploads/users/photos/'.$post['cur_photo']);   
                $photos =  $this->upload->data('file_name');   
            }else{
            	$photos  = $post['cur_photo'];
            }

            $config['upload_path']          = './uploads/users/identity';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $post['member2_name'].'identity'.rand();
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);

            if(!$this->upload->do_upload('member2_identity')){
            	 $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
                 $this->session->set_flashdata('error',$this->upload->display_errors().' Upload Kartu Identitas bersifat wajib');
                 redirect('science-project/anggota');
            }else{

                 $identity =  $this->upload->data('file_name');
            	 $data = array(
						'member2_name' 	  	=> $post['member2_name'],
						'member2_phone' 	=> $post['member2_phone'],
						'member2_birth'	 	=> $post['member2_birth'],
						'member2_photo'    	=> $photos,
						'member2_identity' 	=> $identity
					);

            	$this->sp->update_member('sp_teams',$data,$this->session->userdata('user_id'));
           	 	redirect('science-project/anggota');
            }
		}
	}

	public function delete_member($type=NULL){

		if($type==NULL){
			redirect('science-project/anggota');
		}elseif($type=='member1'){

			$data = array(
					'member1_name' => '',
					'member1_photo' => '',
					'member1_birth' => '0000-00-00',
					'member1_phone' => ''
			);

		}elseif($type=='member2'){
			$data = array(
					'member2_name' => '',
					'member2_photo' => '',
					'member2_birth' => '0000-00-00',
					'member2_phone' => ''
			);
		}

		$this->sp->update_member('sp_teams',$data,$this->session->userdata('user_id'));
        redirect('science-project/anggota');
	}

	public function lock_member(){

		$this->sp->update_progress('sp_teams',array('progress'=>2),$this->session->userdata('user_id'));
		redirect('science-project');
	}

	public function abstrak(){	

		//get team details data
		$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/sp/abstrak',$data);
		$this->load->view('backend/layout/footer');
	}
	public function submit_abstrak(){


		//create form rules
		$form_rules = array(
						array(
							'field' 	=> 'themes',
							'label'		=> 'Tema',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'title',
							'label'		=> 'Judul',
							'rules'		=> 'trim|required'
						));


		//set form valdation
		$this->form_validation->set_rules($form_rules);

			//check form validaton
		if($this->form_validation->run() == false){
				//load abstract submission view 
			$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
			$this->load->view('backend/layout/header',$data);
			$this->load->view('backend/sp/abstrak',$data);
			$this->load->view('backend/layout/footer');

		}else{

			$file_name = strtolower($this->session->userdata('team_name')).'_'.url_title($this->input->post('title'));

			$config['upload_path']          = './uploads/users/abstrak/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2048;
            $config['file_name']			= $file_name;


            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('abstract')){		

                $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
                $data['error'] = $this->upload->display_errors();

                $this->load->view('backend/layout/header',$data);
                $this->load->view('backend/sp/abstrak',$data);
                $this->load->view('backend/layout/footer');

            }else{
                $abstract = $this->upload->data();

                $insert = array(

                     		'user_id' => $this->session->userdata('user_id'),
                     		'themes'  => $this->input->post('themes'),
                     		'title'	  => $this->input->post('title'),
                     		'path'	  => $abstract['file_name']
  		                );

                $this->sp->insert_abstract('abstract',$insert);
                $this->sp->update_progress('sp_teams',array('progress'=>3),$this->session->userdata('user_id'));
				redirect('science-project');
            }
		}

	}

	public function pembayaran(){
		$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
		$this->load->view('backend/layout/header');
		$this->load->view('backend/sp/pembayaran',$data);
		$this->load->view('backend/layout/footer');
	}

	public function submit_payment(){



		$file_name = strtolower($this->session->userdata('team_name')).'_payment_'.url_title($this->input->post('title'));

		$config['upload_path']          = './uploads/users/payments/';
        $config['allowed_types']        = 'png|jpg|jpeg|pdf';
        $config['max_size']             = 2048;
        $config['file_name']			= $file_name;
        $config['overwrite']			= TRUE;


        $this->upload->initialize($config);

        if(!$this->upload->do_upload('payment')){		

            $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
            $data['error'] = $this->upload->display_errors();

            $this->load->view('backend/layout/header',$data);
            $this->load->view('backend/sp/pembayaran',$data);
            $this->load->view('backend/layout/footer');

        }else{
            $payment = $this->upload->data();
            $insert   = array(
            				'user_id' => $this->session->userdata('user_id'),
                     		'path'	  => $payment['file_name']
  		                );

                $this->sp->insert_payment('payments',$insert);
                $this->sp->update_progress('sp_teams',array('progress'=>6),$this->session->userdata('user_id'));
				redirect('science-project');
            }
		

	}

	public function proposal(){
		$data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
		$this->load->view('backend/layout/header');
		$this->load->view('backend/sp/proposal',$data);
		$this->load->view('backend/layout/footer');
	}

	public function submit_proposal(){



		$file_name = strtolower($this->session->userdata('team_name')).'_proposal_'.url_title($this->input->post('title'));

		$config['upload_path']          = './uploads/users/proposal/';
        $config['allowed_types']        = 'png|jpg|jpeg|pdf';
        $config['max_size']             = 2048;
        $config['file_name']			= $file_name;


        $this->upload->initialize($config);

        if(!$this->upload->do_upload('proposal')){		

            $data['user'] = $this->sp->get_user('sp_teams',$this->session->userdata('user_id'));
            $data['error'] = $this->upload->display_errors();

            $this->load->view('backend/layout/header',$data);
            $this->load->view('backend/sp/proposal',$data);
            $this->load->view('backend/layout/footer');

        }else{
            $proposal = $this->upload->data();
            $insert   = array(
            				'user_id' => $this->session->userdata('user_id'),
                     		'path'	  => $proposal['file_name']
  		                );

                $this->sp->insert_proposal('proposal',$insert);
                $this->sp->update_progress('sp_teams',array('progress'=>8),$this->session->userdata('user_id'));
				redirect('science-project');
            }
		

	}



}