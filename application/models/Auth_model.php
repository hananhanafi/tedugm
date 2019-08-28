<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function login_check($table,$data){

		$query = $this->db->where('email',$data['email'])
						  ->where('password',$data['password'])
						  ->limit(1)
						  ->get($table);

		return $query->num_rows();

	}
	
	public function get_login_data($table,$data){

		$query = $this->db->where('email',$data['email'])
						  ->where('password',$data['password'])
						  ->limit(1)
						  ->get($table);

		return $query->row();

	}

	public function user_register($table,$data){
		$this->db->insert($table,$data);
		//return id 
		$id =  $this->db->insert_id();
		return $id;
	}

	public function sp_teams_insert($table,$data){
		return $this->db->insert($table,$data);
	}
}
