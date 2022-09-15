<?php

class Web_Home_model extends CI_Model {

	public function news_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_news');
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

	public function get_team($team_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_team');
		$this->db->where('team_id',$team_id);
		$res = $this->db->get();
		return $res->row();
	}

}