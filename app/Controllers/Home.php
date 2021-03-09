<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard | Fauzan Hamzah'
		];
		return view('home', $data);
	}
}
