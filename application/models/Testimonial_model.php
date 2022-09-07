<?php

class Testimonial_model extends CI_Model {

	public function testimonial_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_testimonial');
		if($this->session->userdata('testimonialsearch') != ''){
			$this->db->group_start();
				$this->db->like('name',$this->session->userdata('testimonialsearch'));
				$this->db->like('designation',$this->session->userdata('testimonialsearch'));
			$this->db->group_end();
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_testimonial($testimonial_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_testimonial');
		$this->db->where('testimonial_id',$testimonial_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_testimonial($data)
	{
		$this->db->insert('emiratesvalley_testimonial',$data);
		return $this->db->insert_id();
	}

	public function edit_testimonial($testimonial_id,$data)
	{
		$this->db->where('testimonial_id',$testimonial_id);
		$this->db->update('emiratesvalley_testimonial',$data);
	}

	public function delete_testimonial($testimonial_id)
	{
		$this->db->where('testimonial_id',base64_decode($testimonial_id));
		$this->db->delete('emiratesvalley_testimonial');
	}

}