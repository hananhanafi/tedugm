<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function get_all_teams($table){
			   $this->db->order_by('team_id DESC');
			   $this->db->join('users','users.user_id='.$table.'.user_id');
		return $this->db->get($table)->result();
	}

	public function get_detail_teams($table,$id){

			   $this->db->where('team_id',$id);
			   $this->db->join('users','users.user_id='.$table.'.user_id');
		return $this->db->get($table)->row_array();
	}

	public function get_all_abstract($table){
			   $this->db->order_by('abstract.created_at DESC');
			   $this->db->join('users','users.user_id='.$table.'.user_id');
			   $this->db->join('sp_teams','sp_teams.user_id='.$table.'.user_id');
		return $this->db->get($table)->result();
	}

	public function sp_payment($table){
			   $this->db->where('role_id','2');
			   $this->db->order_by('payment_id DESC');
			   $this->db->join('users','users.user_id='.$table.'.user_id');
			   $this->db->join('sp_teams','sp_teams.user_id='.$table.'.user_id');
		return $this->db->get($table)->result();
	}


	public function update_progress($table,$data,$id){
				$this->db->where('user_id',$id);
		return  $this->db->update($table,$data);
	}

	public function count_all($table){
		return $this->db->count_all($table);
	}

	public function delete_payment($table,$id){
		$this->db->where('user_id',$id);
		return  $this->db->delete($table);
	}


	public function get_all_proposal($table){
			   $this->db->order_by('team_id DESC');
			   $this->db->join('users','users.user_id='.$table.'.user_id');
			   $this->db->join('sp_teams','sp_teams.user_id='.$table.'.user_id');
		return $this->db->get($table)->result();
	}


	public function cp_payment($table){
			   $this->db->where('role_id','3');
			   $this->db->order_by('payment_id DESC');
			   $this->db->join('users','users.user_id='.$table.'.user_id');
			   $this->db->join('competition_teams','competition_teams.user_id='.$table.'.user_id');
		return $this->db->get($table)->result();
	}

}