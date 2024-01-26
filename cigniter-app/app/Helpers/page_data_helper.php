<?php
	function head() {
		//Vars
		$data['title'] = 'The Cave';
		
		//Load
		view('head',$data);
	}

	function foot() {
		//Vars
		view('foot');
	}
