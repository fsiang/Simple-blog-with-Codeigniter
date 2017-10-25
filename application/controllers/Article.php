<?php

class Article extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Articles_model');
	}

	public function index()
	{
		$data['article'] = $this->Articles_model->show_all();
		$this->load->view('article',$data);
	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['article'] = $this->Articles_model->show($id);
		$this->load->view('showArticle',$data);
	}

	public function show_all($offset = 1)
	{
		$this->_login_check();
		$this->load->library('pagination');

		$config = array(
			'base_url' => base_url('admin/article'),
			'per_page' => 5,
			'total_rows' => $this->Articles_model->num_rows(),
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
		$data['article'] = $this->Articles_model
							->articles_list($config['per_page'],$offset);
		$this->load->view('admin/article',$data);
	}

	public function create()
	{
		$this->_login_check();
		$this->load->view('admin/addArticle');
	}

	public function edit($id)
	{
		$this->_login_check();
		$data['article'] = $this->Articles_model->show($id);
		$this->load->view('admin/editArticle',$data);
	}
	
	public function insert()
	{
		$this->_login_check();
		$user_id = $this->session->userdata('user_id');
		$form_data = array(
			'user_id'    => $user_id,
			'title'      => $this->input->post('title'),
			'content'    => $this->input->post('content'),
			'created_at' => $this->input->post('created_at')
		);

		$this->Articles_model->insert($form_data);
		return redirect('admin/article');
	}

	public function update($id)
	{
		$this->_login_check();
		$form_data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
		);

		$this->Articles_model->update($id, $form_data);
		return redirect('admin/article');
	}

	public function delete($id)
	{
		$this->_login_check();
		$this->Articles_model->delete($id);
		return redirect('admin/article');
	}

	private function _login_check()
	{
		if(!$this->session->userdata('user_id')) {
			return redirect('auth/login');
		} 
	}	

}
