<?php
class Races extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		parent::__construct();
	}

	public function get_races($id = false)
	{
		if ($id === false) {
			$query = $this->db->get('race');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('race', array('id' => $id));
			return $query->row_array();
		}
	}	
}
