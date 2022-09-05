<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
        $this->load->model('Page_model');
        error_reporting(0);
		$this->userId = $this->session->userdata['EMIRATES']['userId'];
        $this->userType = $this->session->userdata['EMIRATES']['user_type'];
		if(!$this->session->userdata('EMIRATES')){
            redirect('admin/login');
        }
    }

	public function index()
	{
		$page_type = $this->uri->segment(2);
		$data['page_data'] = $this->Page_model->get_page_data($page_type);
		if($this->input->post('add_page') == 'add_page'){
			extract($_POST);
			$this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			if($this->form_validation->run() != FALSE){
				$page_arr = array('page_title' => $page_title, 'description' => $description, 'status' => $status, 'page_type' => $page_type);
				if($data['page_data'] == ''){
					$page_arr['dated'] = date('Y-m-d H:i:s');
					$this->Page_model->add_page($page_arr);
					$this->session->set_userdata('message_success','Page Added Successfully!');
					redirect(base_url().'admin/'.$this->uri->segment(2));
				} else {
					$this->Page_model->edit_page($data['page_data']->page_id,$page_arr);
					$this->session->set_userdata('message_success','Page Updated Successfully!');
					redirect(base_url().'admin/'.$this->uri->segment(2));
				} 
			}	
		}	
		$data['page_data'] = $this->Page_model->get_page_data($page_type);
		$data['main_content'] = 'admin/page/about';
        $this->load->view('includes/template', $data);
	}

}
