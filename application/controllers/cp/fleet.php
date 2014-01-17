<?php
class Fleet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');

		$this->load->helper('url');
		$this->load->library('user');
		$this->load->model('buildings_reference');
		$this->load->helper('form');
	}

	public function index()
	{
		$data = array();
		$this->load->view('cp/fleet', $data);
		$this->load->view('templates/cp_footer');
	}

	public function build()
	{
		$data = array();
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
