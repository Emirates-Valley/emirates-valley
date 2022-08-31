<?php

class Dealer_model extends CI_Model {

	public function dealer_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_dealers');
		if($this->session->userdata('dealersearch') != ''){
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

	public function get_dealer($dealer_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_dealers');
		$this->db->where('dealer_id',$dealer_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function phone_exists($phone_no,$dealer_id)
	{
		$this->db->select('phone');
		$this->db->from('emiratesvalley_dealers');
		$this->db->where('phone',$phone_no);
		if($dealer_id != 0){
			$this->db->where('dealer_id <>',$dealer_id);
		}
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return true;
		}
	}

	public function email_exists($email,$dealer_id)
	{
		$this->db->select('email');
		$this->db->from('emiratesvalley_dealers');
		$this->db->where('email',$email);
		if($dealer_id != 0){
			$this->db->where('dealer_id <>',$dealer_id);
		}
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return true;
		}
	}

	public function add_dealer($data)
	{
		$this->db->insert('emiratesvalley_dealers',$data);
		return $this->db->insert_id();
	}

	public function edit_dealer($dealer_id,$data)
	{
		$this->db->where('dealer_id',$dealer_id);
		$this->db->update('emiratesvalley_dealers',$data);
	}

	public function delete_dealer($dealer_id)
	{
		$this->db->where('dealer_id',base64_decode($dealer_id));
		$this->db->delete('emiratesvalley_dealers');
	}

}