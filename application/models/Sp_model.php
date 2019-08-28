<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sp_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function get_user($table,$id){
		$this->db->where('sp_teams.user_id',$id);
		$this->db->join('users','users.user_id=sp_teams.user_id');
		return $this->db->get($table)->row_array();
	}

	public function update_progress($table,$data,$id){
				$this->db->where('user_id',$id);
		return  $this->db->update($table,$data);
	}

	public function update_member($table,$data,$id){
			$this->db->where('user_id',$id);
		return  $this->db->update($table,$data);
	}

	public function insert_abstract($table,$data){

		return $this->db->insert($table,$data);
	}
	public function insert_payment($table,$data){

		return $this->db->insert($table,$data);
	}

	public function insert_proposal($table,$data){

		return $this->db->insert($table,$data);
	}
	
	
	


}