<?php

namespace App\Controllers;

class OverviewController extends BaseController
{

	public function index() : string
	{
		$data['ordrar'] = count($this->orders->get('ny'));
		$data['printade'] = count($this->orders->get('printad'));
		$data['klara'] = count($this->orders->get('klar'));
		$data['arkiverade'] = count($this->orders->get('arkiverad'));

		return view('head')
				.view('overview',$data)
				.view('foot');
	}
}
