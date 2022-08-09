<?php

class Team_model extends CI_Model {

	public function team_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_team');
		if($this->session->userdata('teamsearch') != ''){
			$this->db->group_start();
				$this->db->like('name',$this->session->userdata('teamsearch'));
				$this->db->or_like('email',$this->session->userdata('teamsearch'));
				$this->db->or_like('designation',$this->session->userdata('teamsearch'));
				$this->db->or_like('phone',$this->session->userdata('teamsearch'));
			$this->db->group_end();		
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_team($team_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_team');
		$this->db->where('team_id',$team_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function phone_exists($phone_no,$team_id)
	{
		$this->db->select('phone');
		$this->db->from('emiratesvalley_team');
		$this->db->where('phone',$phone_no);
		if($team_id != 0){
			$this->db->where('team_id <>',$team_id);
		}
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return true;
		}
	}

	public function email_exists($email,$team_id)
	{
		$this->db->select('email');
		$this->db->from('emiratesvalley_team');
		$this->db->where('email',$email);
		if($team_id != 0){
			$this->db->where('team_id <>',$team_id);
		}
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return true;
		}
	}

	public function add_team($data)
	{
		$this->db->insert('emiratesvalley_team',$data);
		return $this->db->insert_id();
	}

	public function edit_team($team_id,$data)
	{
		$this->db->where('team_id',$team_id);
		$this->db->update('emiratesvalley_team',$data);
	}

	public function delete_team($team_id)
	{
		$this->db->where('team_id',base64_decode($team_id));
		$this->db->delete('emiratesvalley_team');
	}

}