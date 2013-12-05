<?php
class Building extends CI_Controller {
	private $user_buildings = array();
	private $all_buildings = array();
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('user');
		$this->load->model('buildings_reference');
		$this->load->helper('form');
		$this->all_buildings =  $this->buildings_reference->get_all();
		$this->user_buildings = $this->user->load_buildings();
	}

	public function index()
	{
		$user_id = $this->user->get_user_id();
		$data = array('all_buildings' => $this->all_buildings,
			'user_buildings' => $this->user_buildings,
		);
		$this->load->view('cp/building', $data);
		$this->load->view('templates/cp_footer');
	}

	public function process()
	{

	}

	public function __destruct()
	{
	}

}
