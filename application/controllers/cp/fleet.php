<?php
class Fleet extends CI_Controller {
	private $ships = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');

		$this->load->helper('url');
		$this->load->library('user');
		$this->load->model('buildings_reference');
		$this->load->helper('form');
		// get list of ships.
		$this->ships = $this->user->load_ships();
	}

	public function index()
	{
		$data = array('ships' => $this->ships);
		$this->load->view('cp/fleet', $data);
		$this->load->view('templates/cp_footer');
	}

	public function build()
	{
		$this->load->model('ship_reference');
		$ship_list = $this->ship_reference->get_ship();
		$data['ship_list'] = $ship_list;
		$this->load->view('cp/build_ship', $data);
		$this->load->view('templates/cp_footer');
	}

	public function attack()
	{
		$data = array();
		$this->load->view('cp/attack', $data);
		$this->load->view('templates/cp_footer');
	}

}
