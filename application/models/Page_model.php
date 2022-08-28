<?php

class Page_model extends CI_Model {

	public function get_page_data($page_type)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_pages');
		$this->db->like('page_type',$page_type);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}		
	}

	public function add_page($data)
	{
		$this->db->insert('emiratesvalley_pages',$data);
		return $this->db->insert_id();
	}

	public function edit_page($page_id,$data)
	{
		$this->db->where('page_id',$page_id);
		$this->db->update('emiratesvalley_pages',$data);
	}

}