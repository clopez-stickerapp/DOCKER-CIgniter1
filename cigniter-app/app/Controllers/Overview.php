<?php

namespace App\Controllers;

class Overview extends BaseController
{

	public function index() : string
	{
		$session = $this->session;

		$data['ordrar'] = count($this->orders->get('ny'));
		$data['pp_klar'] = count($this->orders->get('pp_klar'));
		$data['printade'] = count($this->orders->get('printad'));
		$data['klara'] = count($this->orders->get('klar'));
		$data['arkiverade'] = count($this->orders->get('arkiverad'));
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('overview', $data)
				.view('foot');
	}
}
