<?php

namespace App\Controllers;

class Settings extends BaseController
{

	public function index() {
		$session = $this->session;

		return view('head', ['session', $session])
				.view('settings',)
				.view('foot');
	}
	
	public function edit_data($table) {
		switch($table) {
			case 'signatures':
				$table_title = 'Signaturer';
				$table_name = 'signatures';
				break;

			case 'materials':
				$table_title = 'Material';
				$table_name = 'materials';
				break;

			case 'laminates':
				$table_title = 'Laminat';
				$table_name = 'laminates';
				break;

			case 'cutters':
				$table_title = 'Skärare';
				$table_name = 'cutters';
				break;

			default:
				break;
		}
		$session = $this->session;

		$data['table_title'] = $table_title;
		$data['table'] = $table_name;
		$data['data'] = $this->orders->get_data($table_name);
		$data['session'] = $session;

		return view('head', ['session' => $session])
				.view('settings_edit_data', $data)
				.view('foot');
	}
	
	public function save_data($table) {
		$session = $this->session;
		$db = \Config\Database::connect($this->dbGroup);
		$builder = $db->table($table);

		foreach($_POST as $id => $name) {
			if(is_numeric($id)) {
				$builder->replace(['id' => $id, 'name' => $name]);
			}
		}
		$session->setTempdata('message','<p class="message success">Ändringarna sparades</p>');
		return redirect()->to(base_url().'settings/edit_data/'.$table);
	}
	
	public function add_data($table) {
		$session = $this->session;
		$db = \Config\Database::connect($this->dbGroup);
		$builder = $db->table($table);

		$builder->insert([
			'id'	=> new \CodeIgniter\Database\RawSql('DEFAULT'),
			'name'	=> $_POST['name'],
		]);
		
		$session->setTempdata('message',"<p class='message success'>Din post '<b>".$_POST['name']."</b>' lades till</p>");

		return redirect()->to(base_url().'settings/edit_data/'.$table);
	}
	
}
