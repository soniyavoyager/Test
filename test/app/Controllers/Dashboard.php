<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	function __construct()
	{
		if (session('_admin_logged') == null) {
			header("Location: ".base_url());
			exit();
		}
		
		helper(['form', 'url']);
		service('request');
	}

	public function index()
	{
		$session = session();
		return view('dashboard/index', [
			'session' => $session,
			'page_name' => 'dashboard',
		]);
	}
}
