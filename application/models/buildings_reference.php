<?php
class Buildings_reference extends CI_Model {
	private $table = "buildings_reference";

	public function get_all()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

}
