<?php

class Feature_model extends CI_Model {

	public function feature_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_features');
		if($this->session->userdata('featuresearch') != ''){
			$this->db->like('title',$this->session->userdata('featuresearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_feature($feature_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_features');
		$this->db->where('feature_id',$feature_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_feature($data)
	{
		$this->db->insert('emiratesvalley_features',$data);
		return $this->db->insert_id();
	}

	public function edit_feature($feature_id,$data)
	{
		$this->db->where('feature_id',$feature_id);
		$this->db->update('emiratesvalley_features',$data);
	}

	public function delete_feature($feature_id)
	{
		$this->db->where('feature_id',base64_decode($feature_id));
		$this->db->delete('emiratesvalley_features');
	}

}