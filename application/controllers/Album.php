<?php

class Album extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Albums_model');
	}
	
	public function index()
	{
		$data['album'] = $this->Albums_model->show_all();
		$this->load->view('album',$data);
	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['album'] = $this->Albums_model->show($id);
		$this->load->view('showAlbum',$data);
	}

	public function show_all($offset = 1)
	{
		$this->_login_check();
		$this->load->library('pagination');

		$config = array(
			'base_url' => base_url('admin/album'),
			'per_page' => 5,
			'total_rows' => $this->Albums_model->num_rows(),
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</il>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</il>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</il>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</il>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</il>',
			'cur_tag_open' =>'<li class="active"><a>',
			'cur_tag_close' => "</a></il>",
			'use_page_numbers' => TRUE
		);
		
		$offset = ($offset - 1) * $config['per_page'];
		$this->pagination->initialize($config);
		$data['album'] = $this->Albums_model
							->albums_list($config['per_page'],$offset);
		$this->load->view('admin/album',$data);
	}

	public function create()
	{
		$this->_login_check();
		$this->load->view('admin/addAlbum');
	}

	public function edit($id)
	{
		$this->_login_check();
		$data['album'] = $this->Albums_model->show($id);
		$this->load->view('admin/editAlbum',$data);
	}	

	public function insert()
	{
		$this->_login_check();
		$config = array(
			'upload_path'   => './uploads',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_width'     => 1024,
			'max_height'    => 768,
			'min_width'     => 400,
			'min_height'    => 300
		);
		
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('path')) {
        	$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/addAlbum', $error);
        } else {
        	$path = $this->upload->data();
        	$path = base_url('uploads/'.$path['raw_name'].$path['file_ext']);
        	
			$form_data = array(
				'user_id'    => $this->session->userdata('user_id'),
				'title'      => $this->input->post('title'),
				'intro'      => $this->input->post('intro'),
				'created_at' => $this->input->post('created_at'),
				'path'       => $path
			);

			$this->Albums_model->insert($form_data);
			return redirect('admin/album');
		}
	}
	
	public function update($id)
	{	
		$this->_login_check();
		$config = array(
			'upload_path'   => './uploads',
			'allowed_types' => 'gif|jpg|png|jpeg'
		);

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('path')) {
        	$error = array('error' => $this->upload->display_errors());
            return redirect("admin/edit/$id",$error);
        } else {
        	$path = $this->upload->data();
        	$path = base_url('uploads/'.$path['raw_name'].$path['file_ext']);
			
			$form_data = array(
				'user_id'    => $this->session->userdata('user_id'),
				'title'      => $this->input->post('title'),
				'intro'      => $this->input->post('intro'),
				'created_at' => $this->input->post('created_at'),
				'path'       => $path
			);

			$this->Albums_model->update($id,$form_data);
			return redirect('admin/album');
		}
	}

	public function delete($id)
	{
		$this->_login_check();
		$this->Albums_model->delete($id);
		return redirect('admin/album');
	}

	private function _login_check()
	{
		if(!$this->session->userdata('user_id')) {
			return redirect('auth/login');
		} 
	}
	
}
