<?php
class Resources extends CI_Model {
	private $table = "resources";

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function add_initial_resources($uid) 
	{

		$this->config->load('defaults', TRUE);
		$config = $this->config->item('defaults');

		$data = array(
			'res_id' => 1,
			'user_id' => $uid,
			'quantity' => $config['default_crystals'],
			'miners' => $config['default_crystal_miners'],
		);
		$this->db->insert($this->table, $data);
		$data = array(
			'res_id' => 2,
			'user_id' => $uid,
			'quantity' => $config['default_dilithium'],
			'miners' => $config['default_dilithium_miners'],
		);
		$this->db->insert($this->table, $data);
		$data = array(
			'res_id' => 3,
			'user_id' => $uid,
			'quantity' => $config['default_credits'],
			'miners' => $config['default_tax_collectors'],
		);
		$this->db->insert($this->table, $data);
	}

	public function get_user_resources($uid)
	{
		$query = $this->db->query("select r.quantity, ref.name 
			from ".$this->table." r
			left join resources_reference ref
			on ref.id=r.res_id
			where user_id=?", array($uid));
		return $query->result_array();
	}

}