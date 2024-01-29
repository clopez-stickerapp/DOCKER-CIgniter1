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
			case 'signatures':
				$table_title = 'Signaturer';
				break;
			case 'materials':
				$table_title = 'Material';
				break;
			case 'laminates':
				$table_title = 'Laminat';
				break;
			case 'cutters':
				$table_title = 'Skärare';
				break;
			default:
				break;
		}
		$data['table_title'] = $table_title;
		$table = 'thecave_' . $table;
		$data['table'] =$table;
		$data['data'] = $this->orders->get_data($table);

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
