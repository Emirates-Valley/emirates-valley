<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->userId = $this->session->userdata['EMIRATES']['userId'];
        $this->userType = $this->session->userdata['EMIRATES']['user_type'];
		if(!$this->session->userdata('EMIRATES')){
            redirect('admin/login');
        }
    }

	public function index()
	{
		$data['main_content'] = 'admin/dashboard';
        $this->load->view('includes/template', $data);
	}

	public function profile()
	{
		if($this->input->post('update_profile') == 'update_profile'){
			$updArr = array('full_name' => $this->input->post('full_name'), 'email' => $this->input->post('email'), 'username' => $this->input->post('username'), 'phone' => $this->input->post('phone'), 'country' => $this->input->post('country'), 'city' => $this->input->post('city'));
			$this->db->where('userId',$this->userId);
			$this->db->update('emiratesvalley_register',$updArr);
			$data['message_success'] = 'Profile Successfully Updated!';
		}
		$data['user_record'] = $this->Home_model->get_user_record($this->userId);
		$data['main_content'] = 'admin/profile';
        $this->load->view('includes/template', $data);
	}

	public function update_password()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		extract($_POST);
		if($oldpassword == ''){
			$error = json_encode(array('status'=>'error','msg'=>'Please enter old password!'),true);
            exit($error);
		} else {
			$getPass = $this->db->select('userId')->from('emiratesvalley_register')->where('password',md5($oldpassword))->where('userId',$this->userId)->get();
			if($getPass->num_rows() == '0'){
				$error = json_encode(array('status'=>'error','msg'=>'Old password does not matched!'),true);
            	exit($error);
			}
		}

		if($newpassword == ''){
			$error = json_encode(array('status'=>'error','msg'=>'Please enter new password!'),true);
            exit($error);
		} else {
			if(strlen($newpassword) < 6){
				$error = json_encode(array('status'=>'error','msg'=>'New password length be greater than 5!'),true);
            	exit($error);
			}
		}

		if($cpassword == ''){
			$error = json_encode(array('status'=>'error','msg'=>'Please enter new password repeat!'),true);
            exit($error);
		} else {
			if($newpassword != $cpassword){
				$error = json_encode(array('status'=>'error','msg'=>'New password & new password repeat does not matched!'),true);
            	exit($error);
			}
		}

		$updateArr = array('password' => md5($newpassword), 'original_password' => $newpassword);
		$this->db->where('userId',$this->session->userdata['EMIRATES']['userId']);
		$this->db->update('emiratesvalley_register',$updateArr);
		$success = json_encode(array('status'=>'success','msg'=>'Password updated successfully!'),true);
        exit($success);
	}

	public function remove_avatar(){
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed');
		}
		$userId = $this->input->post('userId');
		$imgName = $this->input->post('imgName');
		$target_dir ="./resource/images/user_images";
		@unlink($target_dir.'/'.$imgName);
		$this->db->set('user_image','');
		$this->db->where('userId',$userId);
		$this->db->update('emiratesvalley_register');
	}

	public function upload_avatar(){
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed');
		}
		if ( isset($_FILES['files']) && !empty($_FILES['files']['tmp_name']) ) {
			$allowed_image_extension = array(
				"png",
				"jpg",
				"jpeg",
				"gif"
			);
			$file_extension = pathinfo($_FILES["files"]["name"], PATHINFO_EXTENSION);
			if (! in_array($file_extension, $allowed_image_extension)) {
				$error = json_encode(array('status'=>'error','msg'=>'Only .jpg .jpeg .gif .png Format Allowed!'),true);
            	exit($error);
			}
		}
		if(empty($_FILES['file']['files'])){
			$target_dir ="./resource/images/user_images";
			$file_name = time();
			$config['file_name'] = $file_name;
			$config['upload_path'] = $target_dir;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('files')){
				$getPic = $this->db->select('user_image')->from('emiratesvalley_register')->where('userId',$this->userId)->get()->row();
				if($getPic->user_image != ''){
					@unlink($target_dir.'/'.$getPic->user_image);
				}
				$data = $this->upload->data();
				$update = array(
					'user_image' => $data['file_name']
				);
				$this->db->where('userId',$this->userId);
				$this->db->update('emiratesvalley_register',$update); 
				$success = json_encode(array('status'=>'success','msg'=>base_url().'resource/images/user_images/'.$data['file_name']),true);
        		exit($success);
			} 
		}
	}
}
