<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'judul' => 'Home | Web CI4'
		];
		return view('pages/home', $data);
	}

	public function about()
	{
		$data = [
			'judul' => 'About | Web CI4'
		];

		return view('pages/about', $data);

	}

	public function contact()
	{
		$data = [
			'judul' => 'Contact | Web CI4',
			'alamat' => [
				[
					'tipe' => 'rumah',
					'alamat' => 'Jl. TigaDuaSatu 23',
					'kota' => 'Jakarta'
				],
				[
					'tipe' => 'kantor',
					'alamat' => 'Jl. Nganu 666',
					'kota' => 'Tangerang'
				]
			]
		];

		return view('pages/contact', $data);

	}

	//--------------------------------------------------------------------

}
