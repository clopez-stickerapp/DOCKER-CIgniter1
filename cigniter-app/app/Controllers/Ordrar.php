<?php

namespace App\Controllers;

class Ordrar extends BaseController
{

	public function index() {
		$session = $this->session;

		$data['title'] = 'Ordrar';
		$data['new_status'] = 'printad';
		$data['orders'] = $this->orders->get('ny');
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function printad() {
		$session = $this->session;

		$data['title'] = 'Printade';
		$data['new_status'] = 'klar';
		$data['orders'] = $this->orders->get('printad');
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function klar() {
		$session = $this->session;

		$data['title'] = 'Klara';
		$data['new_status'] = 'arkiverad';
		$data['orders'] = $this->orders->get('klar');
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function arkiverad() {
		$session = $this->session;

		$data['title'] = 'Arkiv';
		$data['new_status'] = '';
		$data['orders'] = $this->orders->get('arkiverad');
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function sok() {
		$session = $this->session;

		$data['title'] = 'Sökning';
		$data['new_status'] = '';
		$data['orders'] = $this->orders->get();
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function visa($id) {
		$session = $this->session;

		$data = $this->orders->get($id);
		$data['materials'] 	= $this->orders->get_data('thecave_materials');
		$data['cutters'] 	= $this->orders->get_data('thecave_cutters');
		$data['laminates'] 	= $this->orders->get_data('thecave_laminates');
		$data['leveranser'] = $this->orders->get_data('thecave_leveranser');
		$data['signatures'] = $this->orders->get_data('thecave_signatures');
		$data['session'] 	= $this->session;

		return view('head', ['session' => $session])
				.view('ordrar_visa', $data)
				.view('foot');
	}

	public function radera($id) {
		$session = $this->session;
		$db      = \Config\Database::connect();
		$builder = $db->table('thecave_orders');
		$builder2 = $db->table('thecave_comments');

		$builder->delete(['id' => $id]);
		//		mysql_query("DELETE FROM comments WHERE order_id='$id'");

		$builder2->delete(['order_id' => $id]);
		//		mysql_query("DELETE FROM orders WHERE id='$id'");

		$session->setTempdata('message','<p class="message success">Order #'.$id.' raderad</p>');
		return redirect()->to(base_url().'ordrar/');
	}

	public function order_by($order_by, $return='') {
		$session = $this->session;

		$session->setTempdata('order_by', $order_by);
		if($session->getTempdata('order_how') == 'DESC') {
			$session->setTempdata('order_how','ASC');
		} else {
			$session->setTempdata('order_how','DESC');
		}

		return redirect()->to(base_url().'ordrar/'.$return);
	}

	// LASER CAVE
	public function pp_klar() {
		$session = $this->session;

		$data['title']		= 'PP Klar';
		$data['new_status'] = 'printad';
		$data['orders'] 	= $this->orders->get('pp_klar');
		$data['session'] 	= $this->session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	public function laser_klar() {
		$session = $this->session;

		$data['title'] 		= 'Laser Klar';
		$data['new_status'] = 'klar';
		$data['orders'] 	= $this->orders->get('laser_klar');
		$data['session'] 	= $this->session;

		return view('head', ['session' => $session])
				.view('ordrar', $data)
				.view('foot');
	}

	// POST

	public function update_status($id, $new_status, $status = '', $sok = '') {
		$session = $this->session;
		$db      = \Config\Database::connect();
		$builder = $db->table('thecave_orders');

		$builder->where('id', $id);
		$builder->set(array('status'=>$new_status));
		$builder->update();

		$order = $this->orders->get($id);
		$session->setTempdata('message',"<p class='message success'>Order ID <b>".$id.
			"</b>, '<b>".$order['name']."</b>' har markerats som '<span class='capatalize'><b>".$new_status.
			"</b></span>'</p>");
		if(!empty($sok)) {
			$status .= '?mekk=mekk&search_text=' . $sok;
		}
		return redirect()->to(base_url().'ordrar/'.$new_status);
	}

	public function add_comment($order_id) {
		extract($_POST);
		$session = $this->session;
		$db      = \Config\Database::connect();
		$builder = $db->table('thecave_comments');

		$arr = array(
						'order_id'		=>	$order_id,
						'signature_id'	=>	$signature_id,
						'text'			=>	$text,
						'created'		=>	time()
					);
		$builder->set($arr);
		$builder->insert();
		$session->setTempdata('message','<p class="message success">Kommentar sparad</p>');
		return redirect()->to(base_url().'ordrar/visa/'.$order_id);
	}

	public function save_order() {
	}

}
