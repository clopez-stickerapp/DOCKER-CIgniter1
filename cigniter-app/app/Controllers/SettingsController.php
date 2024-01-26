<?php

namespace App\Controllers;

class Settings extends BaseController
{

	public function index() {
		view('settings');
	}
	
	public function edit_data($table) {
		switch($table) {
			case 'thecave_signatures':
				$table_title = 'Signaturer';
				break;
			case 'thecave_materials':
				$table_title = 'Material';
				break;
			case 'thecave_laminates':
				$table_title = 'Laminat';
				break;
			case 'thecave_cutters':
				$table_title = 'Skärare';
				break;
			default:
				break;
		}
		$data['table_title'] = $table_title;
		$data['table'] = $table;
		$data['data'] = $this->orders->get_data($table);

		view('settings_edit_data',$data);
	}
	
	public function save_data($table) {
		$session = session();
		$db = \Config\Database::connect();
		$builder = $db->table($table);

		foreach($_POST as $id => $name) {
			if(is_numeric($id)) {
				$builder->where('id',$id);
				$builder->set(array('name'=>$name));
				$builder->update($table);
			}
		}
		$session->setTempdata('message','<p class="message success">�ndringarna sparades</p>');
		header('location:'.base_url().'settings/edit_data/'.$table);
	}
	
	public function add_data($table) {
		$session = session();
		$db = \Config\Database::connect();
		$builder = $db->table($table);

		$builder->set(array('name'=>$_POST['name']));
		$builder->insert($table);
		
		$session->setTempdata('message',"<p class='message success'>Din post '<b>".$_POST['name']."</b>' lades till</p>");

		header('location:'.base_url().'settings/edit_data/'.$table);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */