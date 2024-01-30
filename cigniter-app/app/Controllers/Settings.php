<?php

namespace App\Controllers;

class Settings extends BaseController
{

	public function index() {
		return view('head')
				.view('settings')
				.view('foot');
	}
	
	public function edit_data($table) {
		switch($table) {
			case 'thecave_signatures':
			case 'signatures':
				$table_title = 'Signaturer';
				$table_name = 'thecave_signatures';
				break;
			case 'thecave_materials':
			case 'materials':
				$table_title = 'Material';
				$table_name = 'thecave_materials';

				break;
			case 'thecave_laminates':
			case 'laminates':
				$table_title = 'Laminat';
				$table_name = 'thecave_laminates';

				break;
			case 'thecave_cutters':
			case 'cutters':
				$table_title = 'Skärare';
				$table_name = 'thecave_cutters';

				break;
			default:
				break;
		}
		$data['table_title'] = $table_title;
		$data['table'] = $table_name;
		$data['data'] = $this->orders->get_data($table_name);

		return view('head')
				.view('settings_edit_data',$data)
				.view('foot');
	}
	
	public function save_data($table) {
		$session = session();
		$db = \Config\Database::connect();
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
		$session = session();
		$db = \Config\Database::connect();
		$builder = $db->table($table);

		$builder->insert([
			'id'	=> new \CodeIgniter\Database\RawSql('DEFAULT'),
			'name'	=> $_POST['name'],
		]);
		
		$session->setTempdata('message',"<p class='message success'>Din post '<b>".$_POST['name']."</b>' lades till</p>");

		return redirect()->to(base_url().'settings/edit_data/'.$table);
	}
	
}
