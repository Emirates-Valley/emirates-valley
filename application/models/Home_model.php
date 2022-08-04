<?php

class Home_model extends CI_Model {

	public function validate_user($user_name, $password){
		$this->db->select('*');
		$this->db->from('emiratesvalley_register');
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$this->db->where('user_type','Admin');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}		
	}

	public function get_user_record($userId){
		$this->db->select('*');
		$this->db->from('emiratesvalley_register');
		$this->db->where('userId', $userId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}		
	}

}