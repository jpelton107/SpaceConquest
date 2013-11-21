<?php
class Register extends CI_Controller
{

	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('planet', 'Planet Name', 'trim|required|min_length[4]|max_length[20]|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|md5');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required');

		if ($this->form_validation->run() === FALSE) 
		{
		
			$this->load->model('races');
			$data['races'] = $this->races->get_races();
			$header['title'] = "Register";
			$this->load->view('templates/header', $header);
			$this->load->view('register/index', $data);
			$this->load->view('templates/footer');
		} else {
			// grab a sector/galaxy id
			$this->load->model('sectors');
			$sector_id = $this->sectors->getNext();

			// generate salt, and modify password
			$this->load->model('users');
			$this->users->add_user($sector_id, $salt, $password);
			$this->load->view('register/success');
		}
	}

}
