<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SocialMedia extends CI_Controller {

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
        $this->load->model('SocialMedia_model');
        error_reporting(0);
		$this->userId = $this->session->userdata['EMIRATES']['userId'];
        $this->userType = $this->session->userdata['EMIRATES']['user_type'];
		if(!$this->session->userdata('EMIRATES')){
            redirect('admin/login');
        }
    }

	public function index()
	{
		$social_medias = $this->SocialMedia_model->get_socialmedia();
		$data['social_media'] = $social_medias;
		if($this->input->post('social_media') == 'social_media'){
			extract($_POST);
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required');
			$this->form_validation->set_rules('twitter', 'Twitter', 'trim|required');
			$this->form_validation->set_rules('instagram', 'Instagram', 'trim|required');
			$this->form_validation->set_rules('linkedin', 'Linkedin', 'trim|required');
			$this->form_validation->set_rules('youtube', 'Youtube', 'trim|required');
			if($this->form_validation->run() != FALSE){
				$social_arr = array('facebook' => $facebook, 'twitter' => $twitter, 'instagram' => $instagram, 'linkedin' => $linkedin, 'youtube' => $youtube);
				if($social_medias != ''){
					$this->SocialMedia_model->edit_socialmedia($social_medias->social_id,$social_arr);
					$this->session->set_userdata('message_success','Social Media Added Successfully!');
				} else {
					$this->SocialMedia_model->add_socialmedia($social_arr);
					$this->session->set_userdata('message_success','Social Media Added Successfully!');
				}
				redirect(base_url().'admin/social-media',$data);
			} 
		} 
		$data['main_content'] = 'admin/social_media/index';
		$this->load->view('includes/template', $data);
	}
}
