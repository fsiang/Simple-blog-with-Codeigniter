<?php

class Albums_model extends CI_Model {
	
	public function insert($data)
	{
		$data['user_id'] = $this->session->userdata('user_id');
		$query = $this->db->insert('albums',$data);
		return $query;
	}

	public function update($id, $data)
	{
		$query = $this->db->where('id', $id)
				->update('albums', $data);
		return $query;
	}

	public function delete($id)
	{
		$query = $this->db->where('id', $id)
				->delete('albums');
		return $query;
	}
	
	public function show($id)
	{
		$query = $this->db->where('id', $id)
						->get('albums');
		return $query->result();
	}
	
	public function show_all()
	{
		$query = $this->db->order_by('created_at', 'DESC')
						->get('albums');
		return $query->result();
	}

	public function num_rows()
	{
		$query = $this->db->get('albums');
		return $query->num_rows();
	}

	public function albums_list($limit, $offset)
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->where('user_id',1)
						->limit($limit, $offset)
						->order_by('created_at', 'DESC')
						->get('albums');
		return $query->result();
	}
}