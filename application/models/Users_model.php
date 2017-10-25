<?php

class Users_model extends CI_Model {
	
	public function insert($data)
	{
		$query = $this->db->insert("users",$data);
	}

	public function update($id, $data)
	{
		$query = $this->db->where('id', $id)
						->update('users', $data);
	}

	public function delete($id)
	{
		$query = $this->db->where('id', $id)
						->delete('users');
	}

	public function show($id)
	{
		$query = $this->db->where('id', $id)
						->get('users');
		return $query;
	}

	public function show_all()
	{
		$query = $this->db->get('users');
		return $query;
	}

	public function check_login($user, $password)
	{
		$query = $this->db->where('user', $user)
						->where('password', $password)
						->get('users');

		if($query->num_rows() > 0) {
			$id = $query->row()->id;
			$this->session->set_userdata('user_id',$id);
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
