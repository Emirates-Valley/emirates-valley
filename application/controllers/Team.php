<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Team_model');
        error_reporting(0);
		$this->userId = $this->session->userdata['EMIRATES']['userId'];
        $this->userType = $this->session->userdata['EMIRATES']['user_type'];
		if(!$this->session->userdata('EMIRATES')){
            redirect('admin/login');
        }
    }

	public function index()
	{
		if($this->input->post('submit') == 'Search'){
            $this->session->unset_userdata('teamsearch');
            $this->session->set_userdata('teamsearch',$this->input->post('teamsearch'));
        }
		$config = array();
		$total_rows = count($this->Team_model->team_listing());
		$config["base_url"] = base_url()."admin/team/listing";
		$config["total_rows"] = $total_rows;
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li class="page-item page-link">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li class="page-item page-link">';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li class="page-item page-link">';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="page-item page-link">';
	    $config['last_tag_close'] = '</li>';

	    $config['prev_link'] = 'Previous';
	    $config['prev_tag_open'] = '<li class="page-item page-link disabled">';
	    $config['prev_tag_close'] = '</li>';

	    $config['next_link'] = 'Next';
	    $config['next_tag_open'] = '<li class="page-item page-link">';
	    $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        $data["links"] = $this->pagination->create_links();
		$data['teams'] = $this->Team_model->team_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/teams/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('teamsearch');
		exit('1');
	}

	public function add_team()
	{
		if($this->input->post('add_team') == 'add_team'){
			extract($_POST);
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|callback_phone_exists|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email', 'trim|callback_email_exists');
			$this->form_validation->set_rules('team_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'name' => $name, 'designation' => $designation, 'phone' => $phone, 'email' => $email, 'status' => $status, 'dated' => date('Y-m-d H:i:s'));
				$team_id = $this->Team_model->add_team($insert_arr);
				$target_dir ="./resource/images/other_images";
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['team_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('team_image') && !empty($_FILES['team_image']['name']))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'team_image' => $data['file_name']
					);
					$this->Team_model->edit_team($team_id,$img_arr);
					$this->session->set_userdata('message_success','Team Member Added Successfully!');
					redirect(base_url().'admin/team/listing',$data);
				} else {
					$this->session->set_userdata('message_success','Team Member Added Successfully!');
					redirect(base_url().'admin/team/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/teams/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_team()
	{
		$team_id = base64_decode($this->uri->segment(4));
		$data['team'] = $this->Team_model->get_team($team_id);
		if($this->input->post('edit_team') == 'edit_team'){
			extract($_POST);
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|callback_phone_exists|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email', 'trim|callback_email_exists');
			$this->form_validation->set_rules('team_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$update_arr = array('name' => $name, 'designation' => $designation, 'phone' => $phone, 'email' => $email, 'status' => $status);
				$this->Team_model->edit_team($team_id,$update_arr);
				$target_dir ="./resource/images/other_images";
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['team_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('team_image'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'team_image' => $data['file_name']
					);
					$this->Team_model->edit_team($team_id,$img_arr);
					$this->session->set_userdata('message_success','Team Member Updated Successfully!');
					redirect(base_url().'admin/team/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/teams/edit';
		$this->load->view('includes/template', $data);
	}

	public function file_check($str){
		$allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = get_mime_by_extension($_FILES['team_image']['name']);
		if(isset($_FILES['team_image']['name']) && $_FILES['team_image']['name']!=""){
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
				return false;
			}
		}else{
			return true;
		}
	}

	public function phone_exists($str){
		if(empty($this->input->post('phone'))){
			$this->form_validation->set_message('phone_exists', 'The Phone field is required.');
			return false;
		} else {
			$team_id = '0';
			if($this->uri->segment(4) != ''){
				$team_id = base64_decode($this->uri->segment(4));
			}
			$phone_exists = $this->Team_model->phone_exists($this->input->post('phone'),$team_id);
			if($phone_exists == true){
				$this->form_validation->set_message('phone_exists', 'Phone Number already exists. Try other Phone Number!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function email_exists($str){
		if(empty($this->input->post('email'))){
			$this->form_validation->set_message('email_exists', 'The Email field is required.');
			return false;
		} else {
			$team_id = '0';
			if($this->uri->segment(4) != ''){
				$team_id = base64_decode($this->uri->segment(4));
			}
			$email_exists = $this->Team_model->email_exists($this->input->post('email'),$team_id);
			if($email_exists == true){
				$this->form_validation->set_message('email_exists', 'Email already exists. Try other Email!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function delete_team()
	{
		$team = $this->Slider_model->get_team(base64_decode($this->uri->segment(4)));
		if(!empty($team)){
			@unlink('./resource/images/other_images/'.$team->team_image);
		}
		$this->Team_model->delete_team($this->uri->segment(4));
		$this->session->set_userdata('message_success','Team Member Deleted Successfully!');
		redirect(base_url().'admin/team/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$team_id = $this->input->post('team_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Team_model->edit_team($team_id,$updt_arr);
		$this->session->set_userdata('message_success','Team Member Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
