<?php

class Articles_model extends CI_Model {
	
	public function insert($data)
	{
		$data['user_id'] = $this->session->userdata['user_id'];
		$query = $this->db->insert('articles',$data);
		return $query;
	}

	public function update($id, $data)
	{
		$query = $this->db->where('id', $id)
						->update('articles', $data);
		return $query;
	}

	public function delete($id)
	{
		$query = $this->db->where('id', $id)
						->delete('articles');
		return $query;
	}
	
	public function show($id)
	{
		$query = $this->db->where('id', $id)
						->get('articles');
		return $query->result();
	}
	
	public function show_all()
	{
		$query = $this->db->order_by('created_at', 'DESC')
						->get('articles');
		return $query->result();
	}

	public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->where('user_id',$user_id)
						->get('articles');
		return $query->num_rows();
	}

	public function articles_list($limit, $offset)
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->where('user_id', $user_id)
						->limit($limit, $offset)
						->order_by('created_at', 'DESC')
						->get('articles');
		return $query->result();
	}

}