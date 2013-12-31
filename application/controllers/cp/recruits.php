<?php
class Recruits extends CI_Controller {
	private $user_buildings = array();
	private $all_buildings = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('html');

		$this->load->helper('url');
		$this->load->library('user');
		$this->load->helper('form');
		$this->user_buildings = $this->user->load_buildings();
	}

	public function index()
	{
		$this->user->load_resource_production();
		$resources = $this->user->get_resources();

		$total = $this->user_buildings[1]['quantity'] * 5; // TODO: place '5' a config file
		$recruits['total'] = $total;
		foreach($resources as $resource) 
		{
			$name = strtolower($resource['name']);
			$recruits[$name] = $resource['miners'];
			$total -= $resource['miners'];
		}
		// TODO: add pilots and scientists
		$recruits['pilots'] = '';
		$recruits['scientists'] = '';
		$data['recruits'] = $recruits;

		// validate
		$config = array(
			array(
				'field' => 'crystal_miners',
				'label' => 'Crystal Miners',
				'rules' => 'integer',
			),
			array(
				'field' => 'dilithium_miners',
				'label' => 'Dilithium Miners',
				'rules' => 'integer',
			),
			array(
				'field' => 'law_enforcement',
				'label' => 'Law Enforcement',
				'rules' => 'integer',
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() != FALSE)
		{
			$crystal_miners = $this->form_validation->set_value('crystal_miners');
			$dilithium_miners = $this->form_validation->set_value('dilithium_miners');
			$law_enforcement = $this->form_validation->set_value('law_enforcement');
			if (($crystal_miners + $dilithium_miners + $law_enforcement) > $recruits['total'])
			{
				// not enough miners
				$data['errors'][] = "Not enough recruits available.";
			}
			else
			{
				// perfect, update the db
				$user_id = $this->user->get_user_id();
				$this->resources->update_miners($user_id, $crystal_miners, $dilithium_miners, $law_enforcement);
				$data['success'] = "Recruits have been successfully assigned to a position.";
				$data['recruits']['crystals'] = $crystal_miners;
				$data['recruits']['dilithium'] = $dilithium_miners;
				$data['recruits']['credits'] = $law_enforcement;
			}
		}

	
		$this->load->view('templates/error', $data);
		$this->load->view('cp/recruits', $data);
		$this->load->view('templates/cp_footer');
	}

}
