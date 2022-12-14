<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
        $this->load->model('Video_model');
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
            $this->session->unset_userdata('videosearch');
            $this->session->set_userdata('videosearch',$this->input->post('videosearch'));
        }
		$config = array();
		$total_rows = count($this->Video_model->video_listing());
		$config["base_url"] = base_url()."admin/video/listing";
		$config["total_rows"] = $total_rows;
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;
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

        $page = $this->uri->segment(4);

        $data["links"] = $this->pagination->create_links();
		$data['videos'] = $this->Video_model->video_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/videos/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('videosearch');
		exit('1');
	}

	public function add_video()
	{
		if($this->input->post('add_video') == 'add_video'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			if($gallery_type == 'Image'){
				$this->form_validation->set_rules('video_file', 'File', 'callback_image_file_check');
			} else if($gallery_type == 'Video'){
				//$this->form_validation->set_rules('embed_code', 'Embed Code', 'trim|required');
				$this->form_validation->set_rules('video_file', 'File', 'callback_file_check');
			}
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'title' => $title, 'description' => $description, 'status' => $status, 'gallery_type' => $gallery_type, 'dated' => date('Y-m-d H:i:s'));
				if($gallery_type == 'Video'){
					$insert_arr['embed_code'] = $embed_code;
				}	
				$video_id = $this->Video_model->add_video($insert_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['video_file']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				if($gallery_type == 'Image'){
					$config['allowed_types'] = 'jpg|png|jpeg';
				} else if($gallery_type == 'Video'){
					$config['allowed_types'] = 'mp4';	
				}	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('video_file'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'video_file' => $data['file_name']
					);
					$this->Video_model->edit_video($video_id,$img_arr);
					$this->session->set_userdata('message_success','Gallery Added Successfully!');
					redirect(base_url().'admin/video/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/videos/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_video()
	{
		$video_id = base64_decode($this->uri->segment(4));
		$data['video'] = $this->Video_model->get_video($video_id);
		if($this->input->post('edit_video') == 'edit_video'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			if($gallery_type == 'Image'){
				if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=""){
					$this->form_validation->set_rules('video_file', 'File', 'callback_image_file_check');
				}
			} else if($gallery_type == 'Video'){
				//$this->form_validation->set_rules('embed_code', 'Embed Code', 'trim|required');
				if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=""){
					$this->form_validation->set_rules('video_file', 'File', 'callback_file_check');
				}
			}
			if($this->form_validation->run() != FALSE){
				$update_arr = array('title' => $title, 'description' => $description, 'status' => $status, 'gallery_type' => $gallery_type);
				if($gallery_type == 'Video'){
					$insert_arr['embed_code'] = $embed_code;
				}
				$this->Video_model->edit_video($video_id,$update_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['video_file']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				if($gallery_type == 'Image'){
					$config['allowed_types'] = 'jpg|png|jpeg';
				} else if($gallery_type == 'Video'){
					$config['allowed_types'] = 'mp4';	
				}
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('video_file'))
				{ 
					if($data['video']->file != ''){
						@unlink($target_dir.$data['video']->file);
					}
					$data = $this->upload->data();
					$img_arr = array(
						'video_file' => $data['file_name']
					);
					$this->Video_model->edit_video($video_id,$img_arr);
				}
				$this->session->set_userdata('message_success','Gallery Updated Successfully!');
				redirect(base_url().'admin/video/listing',$data);
			} 
		} 
		$data['main_content'] = 'admin/videos/edit';
		$this->load->view('includes/template', $data);
	}

	public function image_file_check($str){
		$allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = get_mime_by_extension($_FILES['video_file']['name']);
		if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=""){
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('image_file_check', 'Please select only jpg/png file.');
				return false;
			}
		}else{
			$this->form_validation->set_message('image_file_check', 'Please choose a file to upload.');
			return false;
		}
	}

	public function file_check($str){
		$allowed_mime_type_arr = array('application/mp4', 'video/mp4');
		$mime = get_mime_by_extension($_FILES['video_file']['name']);
		if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=""){
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only mp4 file.');
				return false;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}

	public function delete_video()
	{
		$video = $this->Video_model->get_video(base64_decode($this->uri->segment(4)));
		if(!empty($video)){
			@unlink(MEDIA_PATH.$video->video_file);
		}
		$this->Video_model->delete_video($this->uri->segment(4));
		$this->session->set_userdata('message_success','Gallery Deleted Successfully!');
		redirect(base_url().'admin/video/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$video_id = $this->input->post('video_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Video_model->edit_video($video_id,$updt_arr);
		$this->session->set_userdata('message_success','Gallery Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
