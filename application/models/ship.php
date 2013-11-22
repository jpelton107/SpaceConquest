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
