<?php
class Buildings extends CI_Model {
	private $table = "buildings";
	public function get_buildings($uid) 
	{
		$query = $this->db->query("
			select ref.id,
			       b.quantity,
			       ref.name,
			       ref.description,
			       b.building,
			       b.quantity_building
			  from ".$this->table." b
		     left join buildings_reference ref
			    on ref.id=b.building_id
			 where b.user_id=?
			 ", array($uid));
		return $query->result_array();
	}

	public function get_raw_info($uid)
	{
		$query = $this->db->get_where($this->table, array('user_id' => $uid));
		return $query->result_array();
	}

	public function build($id, $quantity)
	{
		$data = array(

		);
		$where = array(
			'id' => $id);

		$this->db->update($this->table, $data, $where);
	}

	public function add_blank($uid, $building_id) 
	{
		$data = array(
			'user_id' => $uid,
			'building_id' => $building_id,
			'quantity' => 0,
		);
		$this->db->insert($this->table, $data);
	}
}
