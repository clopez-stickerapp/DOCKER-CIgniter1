<?php

namespace App\Controllers;

class OverviewController extends BaseController
{

	public function index()
	{
		$data['ordrar'] = $this->orders->get('ny');

		// $res = $builder->get()->getResultArray();
		// var_dump($res);

		// $data['ordrar'] = count($this->orders->get('ny'));
		// $data['printade'] = count($this->orders->get('printad'));
		// $data['klara'] = count($this->orders->get('klar'));
		// $data['arkiverade'] = count($this->orders->get('arkiverad'));

		$data = [
			'ordrar'=> 22,
			'printade'=> 22,
			'klara'=> 110,
			'arkiverade'=> 901,
		];
		return view('head')
				.view('overview',$data)
				.view('foot');
	}
}
