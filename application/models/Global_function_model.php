<?php

class Global_function_model extends CI_Model {

	public function userInfo($userId){
		$this->db->select('*');
		$this->db->from('emiratesvalley_register');
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}		
	}
}