<?php
class Ship extends CI_Model {
	private $table = "ship";

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_ships($user_id) 
	{
		if ( ! $user_id ) 
		{
			return 0;
		}

		$this->db->select("ship.hull as current_hull,
		             ship.shield as current_shield,
		     	     ship.power as current_power,
			     ship.travel as current_travel,
			     ship.building as current_building,
			     ship.id as ship_id,
			     ship_reference.image,
			     ship_reference.name,
			     ship_reference.id as ref_id,
			     ship_reference.attack,
			     ship_reference.defense,
			     ship_reference.score,
			     ship_reference.shield as max_shield,
			     ship_reference.hull as max_hull,
			     ship_reference.power as max_power,
			     ship_reference.travel_time as max_travel,
			     ship_reference.build_time as max_build,
			     ship_reference.cost_crystal,
			     ship_reference.cost_credits,
			     ship_reference.cost_dilithium");
		$this->db->join('ship_reference', 'ship_reference.id=ship.ref_id');
		$query = $this->db->get_where($this->table, array('user_id' => $user_id));
		return $query->result_array();
	}

	public function add_ship($user_id, $ship_id = FALSE) 
	{
		if ( ! $ship_id ) 
		{
			$this->config->load('defaults', TRUE);
			$config = $this->config->item('defaults');
			$ship_id = $config['default_ship'];
		}

		// get ship reference information
		$query = $this->db->get_where('ship_reference', array('id' => $ship_id));
		$row = $query->row_array();

		$data = array(
			'user_id' => $user_id,
			'ref_id' => $ship_id,
			'hull' => $row['hull'],
			'shield' => $row['shield'],
			'power' => $row['power'],
			'travel' => 0,
			'building' => 0,
		);
		$this->db->insert($this->table, $data);
	}
}
