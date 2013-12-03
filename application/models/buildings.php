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
}
