<?php
class Users extends CI_Model
{

	private schema = array(
		'id' => 'int:22|unsigned|notnull|primary|auto_increment',
		'email' => 'varchar:64|notnull',
		'planet' => 'varchar:128|notnull',
		'sector_id' => 'int:22|unsigned|notnull|foreign:sector',
		'race_id' => 'tinyint:2|notnull|foreign:race',
		'password' => 'varchar:128|notnull',
		'salt' => 'varchar:32|notnull',
		'vote_id' => 'int:22|unsigned|notnull|foreign:users',
	);

	public function __construct()
	{
		$this->load->database();
		$this->table = "users";
	}

	public function get_user($id = false)
	{
		if ($id === false) {
			$query = $this->db->get($this->table);
			return $query->result_array();
		}

		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query->row_array();
	}

	public function add_user($sector_id);
	{
		$data = array(
			'email' => $this->input->post('email'),
			'planet' => $this->input->post('planet'),
			'password' => md5($this->input->post('password')),
			'sector_id' => $sector_id,
			'race_id' => $this->input->post('race_id'),
		);
		return $this->db->insert($this->table, $data);
	}

}
