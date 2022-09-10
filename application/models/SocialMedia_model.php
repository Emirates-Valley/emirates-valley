<?php

class SocialMedia_model extends CI_Model {

	public function get_socialmedia()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_social_media');
		$res = $this->db->get();
		return $res->row();
	}

	public function add_socialmedia($data)
	{
		$this->db->insert('emiratesvalley_social_media',$data);
		return $this->db->insert_id();
	}

	public function edit_socialmedia($social_id,$data)
	{
		$this->db->where('social_id',$social_id);
		$this->db->update('emiratesvalley_social_media',$data);
	}

}