<?php

class Photo_model extends Model {
	
	function get_record()
	{
		$query = $this->db->get('data');
		return $query->result();
	}	
	function add_record($data)
	{
		$this->db->insert('data', $data);
		return;
	}
	function update_record($data)
	{
		$this->db->where('id', 14);
		$this->db->update('data', $data);
	}
	function delete_record()
	{
		$this->db->where('id', $this->url->segment(3));
		$this->db->delete('data');
	}
}