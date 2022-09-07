<?php

class News_model extends CI_Model {

	public function news_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_news');
		if($this->session->userdata('newssearch') != ''){
			$this->db->like('news_title',$this->session->userdata('newssearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_news($news_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_news');
		$this->db->where('news_id',$news_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_news($data)
	{
		$this->db->insert('emiratesvalley_news',$data);
		return $this->db->insert_id();
	}

	public function edit_news($news_id,$data)
	{
		$this->db->where('news_id',$news_id);
		$this->db->update('emiratesvalley_news',$data);
	}

	public function delete_news($news_id)
	{
		$this->db->where('news_id',base64_decode($news_id));
		$this->db->delete('emiratesvalley_news');
	}

}