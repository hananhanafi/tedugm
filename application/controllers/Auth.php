<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Auth_model','auth',true);

	}

	public function index(){
		redirect();
	}

	public function login($param = NULL){
		
		//check login session
		if($this->session->userdata('login')){
			redirect();
		}
		//check login parameter
		if($param == NULL){
			$this->load->view('frontend/auth/login');
		}else{

			$form_rules = array(
						array(
							'field' 	=> 'email',
							'label'		=> 'Email ',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'password',
							'label'		=> 'Password',
							'rules'		=> 'trim|required'
						));

			//loag form rules
			$this->form_validation->set_rules($form_rules);

			//check form validaton
			if($this->form_validation->run() == false){

				//load login page
				$this->load->view('frontend/auth/login');

			}else{

				//get post data
				$post = $this->input->post();

				$data = array(
							'email' 	=> $post['email'],
							'password'	=> md5('@x7v'.$post['password'].'msh187')
						);
				//check user from model
				$check_user = $this->auth->login_check('users',$data);
				if($check_user != 1){
					
					$this->session->set_flashdata('login_error','Username atau Password anda salah');
					redirect('login');

				}else{

					//get login data
					$user_data = $this->auth->get_login_data('users',$data);

					$user_login = array(
							'login' 	=> TRUE,
							'user_id'	=> $user_data->user_id,
							'role_id'	=> $user_data->role_id,
							'email'		=> $user_data->email,
							'team_name' => $user_data->team_name
 						);
					$this->session->set_userdata($user_login);

					switch ($user_data->role_id) {
						case 1:
							redirect('admin/dashboard');
							break;
						case 2:
							redirect('science-project/');
							break;
						case 3:
							redirect('competition');
							break;
						
						default:
							# code...
							break;
					}
				}

			}
		}
	}


	// display register form
	public function register($param ='sp'){	

		//check login session
		if($this->session->userdata('login')){
			redirect();
		}
		//switch register display
		switch ($param) {
			case 'sp':
				$load_view = 'science_project';
				break;
			case 'competition':
				$load_view = 'competition';
				break;
			default:
				redirect(base_url());
				break;
		}
		$this->load->view('frontend/auth/header');
		$this->load->view('frontend/auth/'.$load_view);
		$this->load->view('frontend/auth/footer');
	}

	//create Science Project User
	public function sp_register(){

		//login session check
		if($this->session->userdata('login')){
			redirect();
		}

		$form_rules = array(
						array(
							'field' 	=> 'team',
							'label'		=> 'Team Name',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'email',
							'label'		=> 'Email',
							'rules'		=> 'trim|required|is_unique[users.email]'
						),
						array(
							'field' 	=> 'password',
							'label'		=> 'Password',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'instansi',
							'label'		=> 'Instansi ',
							'rules'		=> 'trim'
						),
						array(
							'field' 	=> 'ketua',
							'label'		=> 'Ketua Name',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'phone',
							'label'		=> 'Phone Number',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'pendamping',
							'label'		=> 'pendamping',
							'rules'		=> 'trim'
						)
					);

		$this->form_validation->set_rules($form_rules);

		if($this->form_validation->run() == false){
			$this->load->view('frontend/auth/header');
			$this->load->view('frontend/auth/science_project');
			$this->load->view('frontend/auth/footer');
		}else{
			
			$post = $this->input->post();

			//users data
			$user = array(
						'team_name' => $post['team'],
						'email' 	=> $post['email'],
						'password' 	=> md5('@x7v'.$post['password'].'msh187'),
						'role_id' 	=> 2,
						'created_at'=> date('Y-m-d H:i:s')
					);


			//insert to users table and get id
			$user_id = $this->auth->user_register('users',$user);

			//team data
			$sp_team = array(
						'user_id'		=> $user_id,
						'instance_name' => $post['instansi'],
						'leader_name' 	=> $post['ketua'],
						'leader_phone' 	=> $post['phone'],
						'supervisor_name'=> $post['pendamping'],
						'progress'		=> 1
					);
			//insert to sp_teams table
			$this->auth->sp_teams_insert('sp_teams',$sp_team);

			//create user session
			$user_login = array(
							'login' 	=> TRUE,
							'user_id'	=> $user_id,
							'role_id'	=> 2,
							'email'		=> $post['email'],
							'team_name' => $post['team']
	 					);
			$this->session->set_userdata($user_login);
			redirect('science-project');
			
		}
	}

	//line follower and sumo project competition
	public function competition_register(){

		//login session check
		if($this->session->userdata('login')){
			redirect();
		}

		$form_rules = array(
						array(
							'field' 	=> 'cabor',
							'label'		=> 'Cabang Lomba',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'team',
							'label'		=> 'Team Name',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'email',
							'label'		=> 'Email',
							'rules'		=> 'trim|required|is_unique[users.email]'
						),
						array(
							'field' 	=> 'password',
							'label'		=> 'Password',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'instansi',
							'label'		=> 'Instansi ',
							'rules'		=> 'trim'
						),
						array(
							'field' 	=> 'ketua',
							'label'		=> 'Ketua Name',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'phone',
							'label'		=> 'Phone Number',
							'rules'		=> 'trim|required'
						),
						array(
							'field' 	=> 'pendamping',
							'label'		=> 'pendamping',
							'rules'		=> 'trim'
						)
					);

		$this->form_validation->set_rules($form_rules);

		if($this->form_validation->run() == false){
			$this->load->view('frontend/auth/header');
			$this->load->view('frontend/auth/competition');
			$this->load->view('frontend/auth/footer');
		}else{
			
			$post = $this->input->post();

			//users data
			$user = array(
						'team_name' => $post['team'],
						'email' 	=> $post['email'],
						'password' 	=> md5('@x7v'.$post['password'].'msh187'),
						'role_id' 	=> 3,
						'created_at'=> date('Y-m-d H:i:s')
					);


			//insert to users table and get id
			$user_id = $this->auth->user_register('users',$user);

			//team data
			$input_data = array(
						'cabor'			=> $post['cabor'],
						'user_id'		=> $user_id,
						'instance_name' => $post['instansi'],
						'leader_name' 	=> $post['ketua'],
						'leader_phone' 	=> $post['phone'],
						'supervisor_name'=> $post['pendamping'],
						'progress'		=> 1
					);
			//insert to sp_teams table
			$this->auth->sp_teams_insert('competition_teams',$input_data);

			//create user session
			$user_login = array(
							'login' 	=> TRUE,
							'user_id'	=> $user_id,
							'role_id'	=> 3,
							'email'		=> $post['email'],
							'team_name' => $post['team']
	 					);
			$this->session->set_userdata($user_login);
			redirect('competition');
			
		}
	}

	//create logout method
	public function logout(){
		$user_login = array(
							'login' 	=> FALSE,
							'role_id'	=> '',
							'email'		=> '',
							'team_name' => ''
	 					);
		$this->session->unset_userdata($user_login);
		$this->session->sess_destroy();
    	redirect();
	}

	


}
