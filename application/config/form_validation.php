<?php

$config = array(
	'login' => array(
			array(
				'field'  => 'user',
				'label'  => 'user',
				'rules'  => 'required',
				'errors' => array(
						'required' => '請輸入帳號!'		
				)
			),
			array(
				'field'  => 'password',
				'label'  => 'password',
				'rules'  => 'required',
				'errors' => array(
						'required' => '請輸入密碼!'
				)
			)
		),
	'register' => array(
		array(
			'field'  => 'user',
			'label'  => 'user',
			'rules'  => 'required|is_unique[users.user]',
			'errors' => array(
					'required'  => '帳號不能空白!',
					'is_unique' => '帳號重複，請重新輸入!'
			)
		),
		array(
			'field'  => 'password',
			'label'  => 'password',
			'rules'  => 'required|regex_match[/[A-Z]{1,}[a-z]{1,}[0-9]{1,}/]|min_length[8]',
			'errors' => array(
					'required'    => '密碼不能空白!',
					'regex_match' => '密碼必須包含大小寫字母和數字!!',
					'min_length'  => '密碼長度不能小於8個字元!'
			)
		),
		array(
			'field'  => 'passconf',
			'label'  => 'pass confirmation',
			'rules'  => 'matches[password]',
			'errors' => array(
					'matches' => '請再次確認輸入的密碼是否正確!'
			)
		),
		array(
			'field'  => 'name',
			'label'  => 'name',
			'rules'  => 'required',
			'errors' => array(
					'required' => '姓名不能空白!'
			)
		),
		array(
			'field'  => 'phone',
			'label'  => 'phone',
			'rules'  => 'required|regex_match[/[0-9]/]',
			'errors' => array(
					'required'    => '電話不能空白!',
					'regex_match' => '只能輸入數字!'
			)
		),
		array(
			'field'  => 'address',
			'label'  => 'address',
			'rules'  => 'required',
			'errors' => array(
					'required' => '地址不能空白!',
			)
		),
		array(
			'field'  => 'Email',
			'label'  => 'Email',
			'rules'  => 'required|valid_email',
			'errors' => array(
					'required' => 'Email不能是空白!',
					'valid_email' => '這不是有效的EMail名稱!'
			)
		),
		array(
			'field'  => 'birthday',
			'label'  => 'birthday',
			'rules'  => 'required',
			'errors' => array(
					'required' => '請選擇生日時間!'
			)
		),
		array(
			'field' => 'gender',
			'label' => 'gender',
			'rules' => 'regex_match[/[a-z]/]'
		)
	)
);