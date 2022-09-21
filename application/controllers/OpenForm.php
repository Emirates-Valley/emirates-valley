<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenForm extends CI_Controller {

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
        $this->load->model('OpenFile_model');
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
            $this->session->unset_userdata('opnsearch');
            $this->session->set_userdata('opnsearch',$this->input->post('opnsearch'));
        }
		$config = array();
		$total_rows = count($this->OpenFile_model->openfile_listing());
		$config["base_url"] = base_url()."admin/open/file";
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
		$data['openfiles'] = $this->OpenFile_model->openfile_listing($config["per_page"], $page);
		$data['main_content'] = 'admin/OpenForm/index';
        $this->load->view('includes/template', $data);
	}

	public function reset_filter()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$this->session->unset_userdata('opnsearch');
		exit('1');
	}

	public function open_form_add()
	{
		if($this->input->post('open_form_add') == 'open_form_add'){
			extract($_POST);
			$this->form_validation->set_rules('dealer_id', 'Dealer', 'trim|required');
			$this->form_validation->set_rules('app_form_number', 'App. Form Number', 'trim|required');
			$this->form_validation->set_rules('registration_number', 'Registration Number', 'trim|required');
			$this->form_validation->set_rules('plot_size', 'Plot Size', 'trim|required');
			$this->form_validation->set_rules('plot_type', 'Plot Type', 'trim|required');
			$this->form_validation->set_rules('security_code', 'Security Code', 'trim|required');
			// $this->form_validation->set_rules('name', 'Name', 'trim|required');
			// $this->form_validation->set_rules('cnic', 'CNIC', 'trim|required');
			// $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			// $this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('logo_image', 'Image', 'callback_file_check');
			if($this->form_validation->run() != FALSE){
				$insert_arr = array(
					'user_id' => $this->userId, 
					'dealer_id' => $dealer_id, 
					'app_form_number' => $app_form_number, 
					'registration_number' => $registration_number, 
					'plot_size' => $plot_size,
					'plot_type' => $plot_type,
					'security_code' => $security_code,
					'name' => $name,
					'cnic' => $cnic,
					'contact' => $contact,
					'address' => $address,
					'status' => $status, 
					'dated' => date('Y-m-d H:i:s')
				);
				$file_id = $this->OpenFile_model->add_open_file($insert_arr);
				$target_dir = 'intimation_letter/';
				$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['logo_image']['name']);
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('logo_image'))
				{ 
					$data = $this->upload->data();
					$img_arr = array(
						'profile_photo' => $data['file_name']
					);
					$this->OpenFile_model->edit_open_file($file_id,$img_arr);
					$this->session->set_userdata('message_success','Open File Added Successfully!');
					redirect(base_url().'admin/open/file',$data);
				}
			} 
		} 
		$data['main_content'] = 'admin/OpenForm/add';
		$this->load->view('includes/template', $data);
	}

	public function open_form_edit()
	{ 
		$file_id = base64_decode($this->uri->segment(5));
		$data['open_file'] = $this->OpenFile_model->get_open_file($file_id);
		if($this->input->post('open_form_edit') == 'open_form_edit'){
			extract($_POST);
			$this->form_validation->set_rules('dealer_id', 'Dealer', 'trim|required');
			$this->form_validation->set_rules('app_form_number', 'App. Form Number', 'trim|required');
			$this->form_validation->set_rules('registration_number', 'Registration Number', 'trim|required');
			$this->form_validation->set_rules('plot_size', 'Plot Size', 'trim|required');
			$this->form_validation->set_rules('plot_type', 'Plot Type', 'trim|required');
			$this->form_validation->set_rules('security_code', 'Security Code', 'trim|required');
			// $this->form_validation->set_rules('name', 'Name', 'trim|required');
			// $this->form_validation->set_rules('cnic', 'CNIC', 'trim|required');
			// $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			// $this->form_validation->set_rules('address', 'Address', 'trim|required');
			if(isset($_FILES['logo_image']['name']) && $_FILES['logo_image']['name']!=""){
				$this->form_validation->set_rules('logo_image', 'Image', 'callback_file_check');
			}
			if($this->form_validation->run() != FALSE){
				$update_arr = array(
					'dealer_id' => $dealer_id, 
					'app_form_number' => $app_form_number, 
					'registration_number' => $registration_number, 
					'plot_size' => $plot_size,
					'plot_type' => $plot_type,
					'security_code' => $security_code,
					'name' => $name,
					'cnic' => $cnic,
					'contact' => $contact,
					'address' => $address,
					'status' => $status
				);
				$this->OpenFile_model->edit_open_file($file_id,$update_arr);
				$qr_exists = $this->OpenFile_model->chk_qrcode_file($file_id);
				$target_dir = 'intimation_letter/';
				if($qr_exists){
					$new_image_name = $qr_exists->security_code;
				} else {
					$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['logo_image']['name']);
				}
				$config['file_name'] = $new_image_name;
				$config['upload_path'] = $target_dir;
				$config['allowed_types'] = 'jpg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('logo_image'))
				{ 
					if($data['open_file']->profile_photo != ''){
						@unlink($target_dir.$data['open_file']->profile_photo);
					}
					$data = $this->upload->data();
					$img_arr = array(
						'profile_photo' => $data['file_name']
					);
					$this->OpenFile_model->edit_open_file($file_id,$img_arr);
				}
				$this->session->set_userdata('message_success','Open File Updated Successfully!');
				redirect(base_url().'admin/open/file',$data);
			} 
		} 
		$data['main_content'] = 'admin/OpenForm/edit';
		$this->load->view('includes/template', $data);
	}

	public function file_check($str){
		$allowed_mime_type_arr = array('image/jpg');
		$mime = get_mime_by_extension($_FILES['logo_image']['name']);
		if(isset($_FILES['logo_image']['name']) && $_FILES['logo_image']['name']!=""){
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only jpg file.');
				return false;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}

	public function delete_open_file()
	{
		$logo = $this->OpenFile_model->get_open_file(base64_decode($this->uri->segment(5)));
		if(!empty($logo)){
			@unlink('intimation_letter/'.$logo->profile_photo);
		}
		$this->OpenFile_model->delete_open_file($this->uri->segment(5));
		$this->session->set_userdata('message_success','Open File Deleted Successfully!');
		redirect(base_url().'admin/logo/listing');
	}

	public function change_status()
	{
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed!');
		}
		$file_id = $this->input->post('file_id');
		$logo = $this->OpenFile_model->get_open_file($file_id);
		$updt_arr = array('status' => $this->input->post('status'));
		if(!empty($logo) && $logo->profile_photo != ''){
			$open_file_name = explode('.',$logo->profile_photo);
			if($this->input->post('status') == 'Inactive'){
				$new_open_file_name = $open_file_name[0].'_inactive.'.$open_file_name[1];
			} else if($this->input->post('status') == 'Active'){
				$new_open_file_name = explode('_',$open_file_name[0])[0].'.'.$open_file_name[1];
			}
			rename("intimation_letter/".$logo->profile_photo,"intimation_letter/".$new_open_file_name);
			$updt_arr['profile_photo'] = $new_open_file_name;
		}
		$this->OpenFile_model->edit_open_file($file_id,$updt_arr);
		$this->session->set_userdata('message_success','Open File Status Change Successfully!');
		echo $this->session->userdata('message_success');
	}

	public function generate_qrcode(){
		include('sdks/QR/phpqrcode/qrlib.php'); 
		$generate_code = '1';
		$qr_image_path = './resource/images/qrcode_images/';
		for($generate_code; $generate_code <=1000; $generate_code++){
			$filename = 'EV-PVT-OP-00'.$generate_code;
			if (!is_dir('resource/images/qrcode_images/'.$filename)) {
				mkdir('./resource/images/qrcode_images/' . $filename, 0777, TRUE);
			
			}
			$codeContents = base_url().'intimation_letter/'.$filename.'.jpg';
			$folder_path = $qr_image_path.$filename.'/';
			QRcode::png($codeContents, $folder_path.''.$filename.'.png', QR_ECLEVEL_L, 5);
			$insert_openarr = array(
				'user_id' => $this->userId, 
				'dated' => date('Y-m-d H:i:s')
			);
			$file_id = $this->OpenFile_model->add_open_file($insert_openarr);
			$insrt_arr = array('user_id' => $this->userId, 'file_id' => $file_id, 'security_code' => $filename, 'qrcode_file' => $filename.'.png', 'dated' => date('Y-m-d H:i:s'));
			$this->OpenFile_model->add_qrcode($insrt_arr);
		}
	}

	public function open_file(){
		if(!empty($this->uri->segment(2))){
			$fileName = basename($this->uri->segment(2));
			$filePath = 'resource/images/qr_download_files/'.$fileName;
			if(!empty($fileName) && file_exists($filePath)){
				echo $filePath;
				exit;
			}else{
				echo 'The File '.$fileName.' does not exist.';
			}
		}
	}
}
