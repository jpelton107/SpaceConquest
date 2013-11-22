<?php
class Overview extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		if ( ! $this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index() 
	{
		$user_id = $this->tank_auth->get_user_id();
		$this->load->model('ship');
		$user_ships = $this->ship->get_ships($user_id);

		$this->load->model('ship_reference');
		$ship_list = $this->ship_reference->get_ship();
		$data['ship_list'] = $ship_list;
		$data['user_ships'] = $user_ships;

		$this->load->view('templates/cp_header');
		$this->load->view('cp/overview', $data);
		$this->load->view('templates/cp_footer');
	}

}
