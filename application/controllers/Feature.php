<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature extends CI_Controller {

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
        $this->load->model('Feature_model');
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
            $this->session->unset_userdata('featuresearch');
            $this->session->set_userdata('featuresearch',$this->input->post('featuresearch'));
        }
		$config = array();
		$total_rows = count($this->Feature_model->feature_listing());
		$config["base_url"] = base_url()."admin/feature/listing";
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
		$data['features'] = $this->Feature_model->feature_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/feature/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('featuresearch');
		exit('1');
	}

	public function add_feature()
	{
		if($this->input->post('add_feature') == 'add_feature'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			$this->form_validation->set_rules('feature_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'title' => $title, 'description' => $description, 'status' => $status, 'dated' => date('Y-m-d H:i:s'));
				$feature_id = $this->Feature_model->add_feature($insert_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['feature_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('feature_image'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'feature_image' => $data['file_name']
					);
					$this->Feature_model->edit_feature($feature_id,$img_arr);
					$this->session->set_userdata('message_success','Features Added Successfully!');
					redirect(base_url().'admin/feature/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/feature/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_feature()
	{
		$feature_id = base64_decode($this->uri->segment(4));
		$data['feature'] = $this->Feature_model->get_feature($feature_id);
		if($this->input->post('edit_feature') == 'edit_feature'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			if(isset($_FILES['feature_image']['name']) && $_FILES['feature_image']['name']!=""){
				$this->form_validation->set_rules('feature_image', 'Image', 'callback_file_check');
			}
			if($this->form_validation->run() != FALSE){
				$update_arr = array('title' => $title, 'description' => $description, 'status' => $status);
				$this->Feature_model->edit_feature($feature_id,$update_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['feature_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('feature_image'))
				{ 
					if($data['feature']->feature_image != ''){
						@unlink($target_dir.$data['feature']->feature_image);
					}
					$data = $this->upload->data();
					$img_arr = array(
						'feature_image' => $data['file_name']
					);
					$this->Feature_model->edit_feature($feature_id,$img_arr);
				}
				$this->session->set_userdata('message_success','Features Updated Successfully!');
				redirect(base_url().'admin/feature/listing',$data);
			} 
		} 
		$data['main_content'] = 'admin/feature/edit';
		$this->load->view('includes/template', $data);
	}

	public function file_check($str){
		$allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = get_mime_by_extension($_FILES['feature_image']['name']);
		if(isset($_FILES['feature_image']['name']) && $_FILES['feature_image']['name']!=""){
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
				return false;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}

	public function delete_feature()
	{
		$feature = $this->Feature_model->get_feature(base64_decode($this->uri->segment(4)));
		if(!empty($feature)){
			@unlink(MEDIA_PATH.$feature->feature_image);
		}
		$this->Feature_model->delete_feature($this->uri->segment(4));
		$this->session->set_userdata('message_success','Features Deleted Successfully!');
		redirect(base_url().'admin/feature/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$feature_id = $this->input->post('feature_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Feature_model->edit_feature($feature_id,$updt_arr);
		$this->session->set_userdata('message_success','Feature Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
