<?php

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Users_model');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		if($this->session->userdata('user_id')) {
			redirect('admin/article');
		} 

		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('article');
	}

	public function login_form_validation()
	{
		if ($this->form_validation->run('login')) {	
			$user     = $this->input->post('user');
			$password = $this->input->post('password');
			$login_check = $this->Users_model->check_login($user, $password);

			if($login_check) {
				return redirect('admin/article');
			} else {
				$this->session->set_flashdata('error', '帳號或密碼錯誤，請重新輸入!');
				return redirect('auth/login');
			}
		} else {
			$this->login();
		}
	}

	public function register_form_validation()
	{
		if ($this->form_validation->run('register')) {
			$form_data = $this->input->post();
			unset($post['passconf']);

			$this->Users_model->insert($form_data);
			return redirect('auth/register');
		} else {
			$this->register();
		}
	}

}
