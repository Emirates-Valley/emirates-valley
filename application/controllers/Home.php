<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('Home_model');
        error_reporting(0);
    }

	public function login()
	{
		if($this->input->post('submit') == 'Login'){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/login');
			} else {
				$user_name = $this->input->post('username');
				$password = $this->input->post('password');
				$is_valid = $this->Home_model->validate_user($user_name, md5($password));
				if(@count($is_valid) > 0){
					$logArr = array('ip' => $this->input->ip_address(), 'last_login' => date('Y-m-d H:i:s')); 
					$this->db->where('userId',$is_valid['userId']);
					$this->db->update('emiratesvalley_register',$logArr);
					$data['EMIRATES'] = $is_valid;
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				} else {
					$data['message_error'] = 'Invalid Username or Password';
					$this->load->view('admin/login',$data);	
				}
			}
		} else {
			$this->load->view('admin/login');
		}
	}

	public function logout(){
		$logArr = array('ip' => $this->input->ip_address(), 'last_logout' => date('Y-m-d H:i:s')); 
		$this->db->where('userId',$this->session->userdata['EMIRATES']['userId']);
		$this->db->update('emiratesvalley_register',$logArr);
		$this->session->unset_userdata('EMIRATES');
		redirect('admin/login');
	}
}
