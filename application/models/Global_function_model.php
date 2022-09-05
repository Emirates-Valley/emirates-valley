<?php

class Global_function_model extends CI_Model {

	public function userInfo($userId){
		$this->db->select('*');
		$this->db->from('emiratesvalley_register');
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}		
	}
	public function slider_listing()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_slider');
		$this->db->where('status', 'Active');
		$this->db->order_by("slider_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}

	public function features_listing()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_features');
		$this->db->where('status', 'Active');
		$this->db->order_by("feature_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}

	public function testimonial_listing()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_testimonial');
		$this->db->where('status', 'Active');
		$this->db->order_by("testimonial_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}
	public function team_listing()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_team');
		$this->db->where('status', 'Active');
		$this->db->order_by("team_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}

		public function get_active_dealers()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_dealers');
		$this->db->where('status', 'Active');
		$this->db->order_by("dealer_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return $query->result();
		}		
	}

	public function get_active_gallery()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_video_gallery');
		$this->db->where('status', 'Active');
		$this->db->order_by("gallery_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}
	public function get_active_news()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_news');
		$this->db->where('status', 'Active');
		$this->db->where('news_type', 'News');
		$this->db->order_by("news_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}
	public function get_active_logo()
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_logo');
		$this->db->where('status', 'Active');
		$this->db->order_by("logo_id", "DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0){

			return json_encode($query->result());
		}		
	}
}