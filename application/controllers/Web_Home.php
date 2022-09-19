<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_Home extends CI_Controller {

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
		$this->load->model('Web_Home_model');
        error_reporting(0);
    }

	public function index()
	{ 
		$data['web_main_content'] = 'web/index';
        $this->load->view('includes/web_template', $data);
	}
	public function news_listing_home()
	{
		$data['web_main_content'] = 'web/latest_news';
        $this->load->view('includes/web_template', $data);
		
	}
	public function features_detials()
	{
		$data['web_main_content'] = 'web/features';
        $this->load->view('includes/web_template', $data);
		
	}
	public function contact_us()
	{
		if($this->input->post('contact-us') == 'Send Message'){
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$config = array(
				'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
				'smtp_host' => 'smtp.emiratesvalley.com',
				'smtp_port' => 465,
				'smtp_user' => 'info@emiratesvalley.com',
				'smtp_pass' => '',
				'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
				'mailtype' => 'text', //plaintext 'text' mails or 'html'
				'smtp_timeout' => '4', //in seconds
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$from = $config['smtp_user'];
			$to = strtolower($email);
			$bodyMessage = '<p>Hi '.$name.',</p>';
			$bodyMessage .= '<p>'.$message.'</p>';
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($bodyMessage);
			$email_sent = $this->email->send();
			if($email_sent){
				$contact_arr = array('name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message, 'ip_address' => $this->input->ip_address(), 'dated' => date('Y-m-d H:i:s'));
				$this->db->insert('emiratesvalley_contact_us',$contact_arr);
				$data['SUCCESSMSG'] = 'Message successfully send!';
				$this->session->set_userdata($data);
				redirect('contact-us');
			}
		}
		$data['web_main_content'] = 'web/contact_us';
        $this->load->view('includes/web_template', $data);
		
	}
	public function news_details()
	{
		$news_id = end(explode('-',$this->uri->segment(2)));
		$data['news'] = $this->Web_Home_model->get_news($news_id);
		$data['web_main_content'] = 'web/news_details';
        $this->load->view('includes/web_template', $data);
		
	}
	public function about_us()
	{
		$data['web_main_content'] = 'web/about_us';
        $this->load->view('includes/web_template', $data);
		
	}

	public function privacy_policy()
	{
		$data['web_main_content'] = 'web/privacy_policy';
        $this->load->view('includes/web_template', $data);
		
	}
	
		public function payment_plan()
	{
		$data['web_main_content'] = 'web/payment_plan';
        $this->load->view('includes/web_template', $data);
		
	}

	public function about_profile()
	{
		$team_id = end(explode('-',$this->uri->segment(2)));
		$data['team'] = $this->Web_Home_model->get_team($team_id);
		$data['web_main_content'] = 'web/about_profile';
        $this->load->view('includes/web_template', $data);
		
	}
	
	public function gallery()
	{
		$data['web_main_content'] = 'web/gallery';
        $this->load->view('includes/web_template', $data);
		
	}
	
	

}
