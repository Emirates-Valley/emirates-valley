<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {

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
        $this->load->model('Dealer_model');
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
            $this->session->unset_userdata('dealersearch');
            $this->session->set_userdata('dealersearch',$this->input->post('dealersearch'));
        }
		$config = array();
		$total_rows = count($this->Dealer_model->dealer_listing());
		$config["base_url"] = base_url()."admin/dealer/listing";
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
		$data['dealers'] = $this->Dealer_model->dealer_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/dealers/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('dealersearch');
		exit('1');
	}

	public function add_dealer()
	{
		if($this->input->post('add_dealer') == 'add_dealer'){
			extract($_POST);
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|callback_phone_exists|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email', 'trim|callback_email_exists');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array('user_id' => $this->userId,'name' => $name, 'address' => $address, 'phone' => $phone, 'email' => $email, 'status' => $status, 'dated' => date('Y-m-d H:i:s'));
				$this->Dealer_model->add_dealer($insert_arr);
				$this->session->set_userdata('message_success','Dealer Added Successfully!');
				redirect(base_url().'admin/dealer/listing',$data);
			} 
		} 
		$data['main_content'] = 'admin/dealers/add';
		$this->load->view('includes/template', $data);
	}

	public function edit_dealer()
	{
		$dealer_id = base64_decode($this->uri->segment(4));
		$data['dealer'] = $this->Dealer_model->get_dealer($dealer_id);
		if($this->input->post('edit_dealer') == 'edit_dealer'){
			extract($_POST);
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|callback_phone_exists|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email', 'trim|callback_email_exists');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			if($this->form_validation->run() != FALSE){
				$update_arr = array('name' => $name, 'address' => $address, 'phone' => $phone, 'email' => $email, 'status' => $status);
				$this->Dealer_model->edit_dealer($dealer_id,$update_arr);
				$this->session->set_userdata('message_success','Dealer Updated Successfully!');
				redirect(base_url().'admin/dealer/listing',$data);
			} 
		} 
		$data['main_content'] = 'admin/dealers/edit';
		$this->load->view('includes/template', $data);
	}

	public function phone_exists($str){
		if(empty($this->input->post('phone'))){
			$this->form_validation->set_message('phone_exists', 'The Phone field is required.');
			return false;
		} else {
			$dealer_id = '0';
			if($this->uri->segment(4) != ''){
				$dealer_id = base64_decode($this->uri->segment(4));
			}
			$phone_exists = $this->Dealer_model->phone_exists($this->input->post('phone'),$dealer_id);
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
			$dealer_id = '0';
			if($this->uri->segment(4) != ''){
				$dealer_id = base64_decode($this->uri->segment(4));
			}
			$email_exists = $this->Dealer_model->email_exists($this->input->post('email'),$dealer_id);
			if($email_exists == true){
				$this->form_validation->set_message('email_exists', 'Email already exists. Try other Email!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function delete_Dealer()
	{
		$this->Dealer_model->delete_Dealer($this->uri->segment(4));
		$this->session->set_userdata('message_success','Dealer Deleted Successfully!');
		redirect(base_url().'admin/dealer/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$dealer_id = $this->input->post('dealer_id');
		$updt_arr = array('status' => $this->input->post('status'));
		$this->Dealer_model->edit_dealer($dealer_id,$updt_arr);
		$this->session->set_userdata('message_success','Dealer Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}
}
