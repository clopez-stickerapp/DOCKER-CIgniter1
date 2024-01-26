<?php

namespace App\Controllers;

class LaddaUpp extends BaseController
{

    public function index ( $id ) {
		if($id != false) {
			$data = $this->orders->get( $id );
		} elseif ( isset($_GET) ) {
			$data = $_GET;
		}
		
		$data['materials']  = $this->orders->get_data('materials');
		$data['laminates']  = $this->orders->get_data('laminates');
		$data['cutters']    = $this->orders->get_data('cutters');
		$data['leveranser'] = $this->orders->get_data('leveranser');
		$data['signatures'] = $this->orders->get_data('signatures');
	
		
		view('ladda_upp', $data);
	}
}
