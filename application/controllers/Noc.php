<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noc extends CI_Controller {

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
        $this->load->model('Noc_model');
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
            $this->session->unset_userdata('nocsearch');
            $this->session->set_userdata('nocsearch',$this->input->post('nocsearch'));
        }
		$config = array();
		$total_rows = count($this->Noc_model->noc_listing());
		$config["base_url"] = base_url()."admin/noc/listing";
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
		$data['nocs'] = $this->Noc_model->noc_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/noc/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('nocsearch');
		exit('1');
	}

	public function add_noc()
	{
		if($this->input->post('add_noc') == 'add_noc'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Noc Title', 'trim|required');
			$this->form_validation->set_rules('noc_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'title' => $title, 'status' => $status, 'noc_type' => $noc_type, 'dated' => date('Y-m-d H:i:s'));
				$noc_id = $this->Noc_model->add_noc($insert_arr);
				$target_dir = MEDIA_PATH;
				$noc_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['noc_image']['name']);
				$config['file_name'] = $noc_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|doc|docx|xls|ppt';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('noc_image'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'noc_image' => $data['file_name']
					);
					$this->Noc_model->edit_noc($noc_id,$img_arr);
					$this->session->set_userdata('message_success','Noc/Download Added Successfully!');
					redirect(base_url().'admin/noc/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/noc/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_noc()
	{
		$noc_id = base64_decode($this->uri->segment(4));
		$data['noc'] = $this->Noc_model->get_noc($noc_id);
		if($this->input->post('edit_noc') == 'edit_noc'){
			extract($_POST);
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			if(isset($_FILES['noc_image']['name']) && $_FILES['noc_image']['name']!=""){
				$this->form_validation->set_rules('noc_image', 'Image', 'callback_file_check');
			}
			if($this->form_validation->run() != FALSE){
				$update_arr = array('title' => $title, 'status' => $status, 'noc_type' => $noc_type);
				$this->Noc_model->edit_noc($noc_id,$update_arr);
				$target_dir = MEDIA_PATH;
				$noc_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['noc_image']['name']);
				$config['file_name'] = $noc_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|doc|docx|xls|ppt';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('noc_image'))
				{ 
					if($data['noc']->noc_image != ''){
						@unlink($target_dir.$data['noc']->noc_image);
					}
					$data = $this->upload->data();
					$img_arr = array(
						'noc_image' => $data['file_name']
					);
					$this->Noc_model->edit_noc($noc_id,$img_arr);
				}
				$this->session->set_userdata('message_success','Noc/Download Updated Successfully!');
				redirect(base_url().'admin/noc/listing',$data);
			} 
		} 
		$data['main_content'] = 'admin/noc/edit';
		$this->load->view('includes/template', $data);
	}

	public function file_check($str){
		if(isset($_FILES['noc_image']['name']) && $_FILES['noc_image']['name']==""){
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}

	public function delete_noc()
	{
		$nocs = $this->Noc_model->get_noc(base64_decode($this->uri->segment(4)));
		if(!empty($nocs)){
			@unlink(MEDIA_PATH.$nocs->noc_image);
		}
		$this->Noc_model->delete_noc($this->uri->segment(4));
		$this->session->set_userdata('message_success','Noc/Download Deleted Successfully!');
		redirect(base_url().'admin/noc/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$noc_id = $this->input->post('noc_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Noc_model->edit_noc($noc_id,$updt_arr);
		$this->session->set_userdata('message_success','Noc/Download Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
