<?php
class User {

	private $user_id;
	private $resources;

	public function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->library('tank_auth');
		if ( ! $this->ci->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$this->user_id = $this->ci->tank_auth->get_user_id();

		$this->ci->load->model('resources');
		$this->resources = $this->ci->resources->get_user_resources($this->user_id);
		$data['resources'] = $this->resources;

		$this->ci->load->view('templates/cp_header', $data);


	}


	public function get_user_id() { return $this->user_id; }
	public function get_resources() { return $this->resources; }
}
