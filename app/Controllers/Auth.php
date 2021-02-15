<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Login',
			'validation' => \Config\Services::validation()
		];
		return view('auth/authPages/index', $data);
	}
	public function login()
	{
		$validaiton = \Config\Services::validation();
		if (!$this->validate('loginUser')) {
			$view = [
				'error' => [
					'email' => $validaiton->getError('email'),
					'password' => $validaiton->getError('password'),
				]
			];
		} else {
			$view = [
				'success' => 'Berhasil Masuk'
			];
		}
		echo json_encode($view);
	}
}
