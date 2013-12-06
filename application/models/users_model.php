<?php
class Users_model extends CI_Model {
	private $table = "users";
	private $id;
	private $info = array();

	public function setup($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$this->info = $query->row_array();
		return $this->info;
	}

	public function get($field) 
	{
		return $this->$info[$field];
	}

	public function get_all()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

}
