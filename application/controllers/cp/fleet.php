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
		$this->load->library('form_validation');
		$this->load->model('ship_reference');
		$this->form_validation->set_rules('ship_id', 'Ship', 'required|integer|greater_than[0]');
		if ($this->form_validation->run() != FALSE)
		{
			// make sure no other ships are building 

			// check ship limits?
			
			// check resource amounts
			$resources = $this->user->get_resources();
			$ship_id = $this->form_validation->set_value('ship_id');

			// check ship cost against resources available
			$ship = $this->ship_reference->get_ship($ship_id);

			foreach($resources as $resource)
			{
				switch($resource['id']) 
				{
				case '1':
					$k = 'crystal';
					$update_func = 'update_crystals';
					break;
				case '2':
					$k = 'dilithium';
					$update_func = 'update_dilithium';
					break;
				case '3':
					$k = 'credits';
					$update_func = 'update_credits';
					break;
				}

				if ($ship['cost_'.$k] > $resource['quantity'])
				{
					$err['errors'][] = 'Not enough '.$resource['name'].' to purchase requested ship.';
				}

			}

			$user_id = $this->user->get_user_id();

			if ( ! is_array($err['errors']))
			{
				foreach($resources as $resource)
				{
					switch($resource['id']) 
					{
					case '1':
						$k = 'crystal';
						$update_func = 'update_crystals';
						break;
					case '2':
						$k = 'dilithium';
						$update_func = 'update_dilithium';
						break;
					case '3':
						$k = 'credits';
						$update_func = 'update_credits';
						break;
					}
					$new = $resource['quantity'] - $ship['cost_'.$k];
					$this->resources->$update_func($user_id, $new);
				}

				// add ship
				$this->load->model('ship');
				$this->ship->add_ship($user_id, $ship_id, $ship['build_time']);
			}

		}

		$ship_list = $this->ship_reference->get_ship();
		$data['ship_list'] = $ship_list;
		if (isset($err)) 
		{
			$this->load->view('templates/error', $err);
		}
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
