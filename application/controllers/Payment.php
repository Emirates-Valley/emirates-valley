<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
        $this->load->model('Payment_model');
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
            $this->session->unset_userdata('paymentsearch');
            $this->session->set_userdata('paymentsearch',$this->input->post('paymentsearch'));
        }
		$config = array();
		$total_rows = count($this->Payment_model->payment_listing());
		$config["base_url"] = base_url()."admin/payment/listing";
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
		$data['payments'] = $this->Payment_model->payment_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/payment/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('paymentsearch');
		exit('1');
	}

	public function add_payment()
	{
		if($this->input->post('add_payment') == 'add_payment'){
			extract($_POST);
			$this->form_validation->set_rules('plan_title', 'Plan Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			$this->form_validation->set_rules('plan_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'plan_title' => $plan_title, 'description' => $description, 'status' => $status, 'dated' => date('Y-m-d H:i:s'));
				$payment_id = $this->Payment_model->add_payment($insert_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['plan_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('plan_image'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'plan_image' => $data['file_name']
					);
					$this->Payment_model->edit_payment($payment_id,$img_arr);
					$this->session->set_userdata('message_success','Payment Plan Added Successfully!');
					redirect(base_url().'admin/payment/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/payment/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_payment()
	{
		$payment_id = base64_decode($this->uri->segment(4));
		$data['payment'] = $this->Payment_model->get_payment($payment_id);
		if($this->input->post('edit_payment') == 'edit_payment'){
			extract($_POST);
			$this->form_validation->set_rules('plan_title', 'Plan Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			$this->form_validation->set_rules('plan_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$update_arr = array('plan_title' => $plan_title, 'description' => $description, 'status' => $status);
				$this->Payment_model->edit_payment($payment_id,$update_arr);
				$target_dir = MEDIA_PATH;
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['plan_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('plan_image'))
				{ 
					if($data['payment']->plan_image != ''){
						@unlink($target_dir.$data['payment']->plan_image);
					}
					$data = $this->upload->data();
					$img_arr = array(
						'plan_image' => $data['file_name']
					);
					$this->Payment_model->edit_payment($payment_id,$img_arr);
					$this->session->set_userdata('message_success','Payment Plan Updated Successfully!');
					redirect(base_url().'admin/payment/listing',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/payment/edit';
		$this->load->view('includes/template', $data);
	}

	public function file_check($str){
		$allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = get_mime_by_extension($_FILES['plan_image']['name']);
		if(isset($_FILES['plan_image']['name']) && $_FILES['plan_image']['name']!=""){
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

	public function delete_payment()
	{
		$payment = $this->Payment_model->get_payment(base64_decode($this->uri->segment(4)));
		if(!empty($payment)){
			@unlink(MEDIA_PATH.$payment->plan_image);
		}
		$this->Payment_model->delete_payment($this->uri->segment(4));
		$this->session->set_userdata('message_success','Payment Plan Deleted Successfully!');
		redirect(base_url().'admin/payment/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$plan_id = $this->input->post('plan_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Payment_model->edit_payment($plan_id,$updt_arr);
		$this->session->set_userdata('message_success','Payment Plan Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
