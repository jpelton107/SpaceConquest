<?php
class Ship_reference extends CI_Model {
	private $table = "ship_reference";

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_ship($ship_id = FALSE)
	{
		if ($ship_id === FALSE) {
			$query = $this->db->get($this->table);
			return $query->result_array();
		} else {
			$query = $this->db->get_where($this->table, array('id' => $ship_id));
			return $query->row_array();
		}
	}
}

