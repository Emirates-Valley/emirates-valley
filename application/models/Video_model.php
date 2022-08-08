<?php

class Video_model extends CI_Model {

	public function video_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_video_gallery');
		if($this->session->userdata('videosearch') != ''){
			$this->db->like('title',$this->session->userdata('videosearch'));
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_video($video_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_video_gallery');
		$this->db->where('gallery_id',$video_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_video($data)
	{
		$this->db->insert('emiratesvalley_video_gallery',$data);
		return $this->db->insert_id();
	}

	public function edit_video($video_id,$data)
	{
		$this->db->where('gallery_id',$video_id);
		$this->db->update('emiratesvalley_video_gallery',$data);
	}

	public function delete_video($video_id)
	{
		$this->db->where('gallery_id',base64_decode($video_id));
		$this->db->delete('emiratesvalley_video_gallery');
	}

}