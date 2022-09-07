<?php

class Payment_model extends CI_Model {

	public function payment_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_payment_plan');
		if($this->session->userdata('paymentsearch') != ''){
			$this->db->like('plan_title',$this->session->userdata('paymentsearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_payment($plan_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_payment_plan');
		$this->db->where('plan_id',$plan_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_payment($data)
	{
		$this->db->insert('emiratesvalley_payment_plan',$data);
		return $this->db->insert_id();
	}

	public function edit_payment($plan_id,$data)
	{
		$this->db->where('plan_id',$plan_id);
		$this->db->update('emiratesvalley_payment_plan',$data);
	}

	public function delete_payment($plan_id)
	{
		$this->db->where('plan_id',base64_decode($plan_id));
		$this->db->delete('emiratesvalley_payment_plan');
	}

}