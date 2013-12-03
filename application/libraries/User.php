<?php
class User {

	private $user_id;
	private $resources;
	private $user_info = array();

	public function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->library('tank_auth');
		if ( ! $this->ci->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$this->user_id = $this->ci->tank_auth->get_user_id();

		// set user values
		$this->ci->load->model('users_model');
		$this->user_info = $this->ci->users_model->setup($this->user_id);

		// load resources
		$this->ci->load->model('resources');
		$this->resources = $this->ci->resources->get_user_resources($this->user_id);
		$data['resources'] = $this->resources;

		$this->ci->load->view('templates/cp_header', $data);

	}

	public function load_resource_production()
	{
		$this->ci->load->model('buildings');
		$buildings = $this->ci->buildings->get_buildings($this->user_id);
		foreach ($this->resources as $k => $resource) 
		{
			switch($resource['id']) {
			case '1': // crystals
				$bldgID = 2;
				break;
			case '2': // dilithium
				$bldgID = 3;
				break;
			case '3': // credits
				$bldgID = 4;
				break;
			}

			foreach($buildings as $k => $val) {
				if ($val['id'] == $bldgID) {
					$buildingKey = $k;
				}
			}

			$quantity = !empty($buildingKey) ? $buildings[$buildingKey]['quantity'] : 1;
			$miners = $resource['miners'] ? $resource['miners'] : 1;
			$production = $miners * $quantity; 

			// 10x as many credits
			if ($resource['id'] == '3') 
			{
				$production *= 10;
			}

			// take into account race bonuses
			switch($this->user_info['race_id']) {
			case 1:
				$production *= .85;
				break;
			case 2:
				$production *= 1.15;
				break;
			}
			
			// set the production value
			$this->resources[$k]['production'] = floor($production);
		}

	}

	public function get_user_id() { return $this->user_id; }
	public function get_resources() { return $this->resources; }
}
