<?php
class Building extends CI_Controller {
	private $user_buildings = array();
	private $all_buildings = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');

		$this->load->helper('url');
		$this->load->library('user');
		$this->load->model('buildings_reference');
		$this->load->helper('form');
		$this->all_buildings =  $this->buildings_reference->get_all();
		$this->user_buildings = $this->user->load_buildings();
	}

	public function index()
	{
		$data = array('all_buildings' => $this->all_buildings,
			'user_buildings' => $this->user_buildings,
		);
		$this->load->view('cp/building', $data);
		$this->load->view('templates/cp_footer');
	}

	public function process()
	{
		$this->load->library('form_validation');
		// validate
		$config = array(
			array(
				'field' => 'quantity',
				'label' => 'Quantity',
				'rules' => 'required|integer|greater_than[0]',
			),
			array(
				'field' => 'id',
				'label' => 'Building Type',
				'rules' => 'required|integer|greater_than[0]',
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() != FALSE)
		{
			$quantity = $this->input->post('quantity');
			$id = $this->input->post('id');

			// get old quantity
			foreach($this->user_buildings as $k => $building)
			{
				if ($building['id'] == $id) 
				{
					$user_building_key = $k;
					$building_id = $building['building_id'];
					$new_quantity = $quantity + $building['quantity'];
				}
			}

			// make sure he has enough credits
			foreach ($this->all_buildings as $single_building) 
			{
				if ($single_building['id'] == $building_id) 
				{
					$cost = $single_building['cost'];
				}
			}
			$total_cost = $cost * $quantity;
			$resources = $this->user->get_resources();
			$new_credits = $resources[2]['quantity'] - $total_cost;
			if ($new_credits >= 0) 
			{
				$this->buildings->build($id, $new_quantity);
				// reset user_buildings array to account for new production and display properly when the screen is loaded
				$this->user_buildings[$user_building_key]['quantity'] = $new_quantity;

				// now take away credits
				$this->load->model('resources');
				$this->resources->update_credits($this->user->get_user_id(), $new_credits);
			} else {
				$data['errors'][] = 'Not enough credits at your disposal to purchase requested buildings.';
			}
		}
		$data['all_buildings'] = $this->all_buildings;
		$data['user_buildings'] = $this->user_buildings;
		$this->load->view('cp/building', $data);
		$this->load->view('templates/cp_footer');
	}

}
