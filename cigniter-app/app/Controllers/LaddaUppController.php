<?php

namespace App\Controllers;

class LaddaUpp extends BaseController
{

    public function index ( $id ) {
		if( $id ) {
			$data = $this->orders->get( $id );
		} elseif ( isset($_GET) ) {
			$data = $_GET;
		}
		
		$data['materials']  = $this->orders->get_data('thecave_materials');
		$data['laminates']  = $this->orders->get_data('thecave_laminates');
		$data['cutters']    = $this->orders->get_data('thecave_cutters');
		$data['leveranser'] = $this->orders->get_data('thecave_leveranser');
		$data['signatures'] = $this->orders->get_data('thecave_signatures');
	
		
		view('ladda_upp', $data);
	}

    public function reprint($id) {
		$this->index($id);
	}
	
	public function upload($id = false) {
        extract($_POST);
        
        $session = session();
        $db      = \Config\Database::connect();
        $builder = $db->table('thecave_orders');

		//Filerna
		$files = array();
		for($i=1; $i<=5; $i++) {
			if(!empty($_FILES['thefile'.$i]['name'])) {
				$file = basename($_FILES['thefile'.$i]['name']);

                //Check for dulpicate filenames
                $builder->where('file1', $file);
                $builder->orWhere('file2', $file);
                $builder->orWhere('file3', $file);
                $builder->orWhere('file4', $file);
                $builder->orWhere('file5', $file);
                $builder->orWhere('image', $file);
                $query = $builder->get();

                //$query = mysql_query("SELECT * FROM orders WHERE file1='$file' OR file2='$file' OR file3='$file' OR file4='$file' OR file5='$file' OR image='$file'");
                if($query->getNumRows() > 0) {
                    $y = 2;
                    while($query->getNumRows() > 0) {
                        $ext = end( explode( '.', $file ) );
                        $new_name = substr($file,0,strlen($file)-strlen($ext)-1);
                        $new_name = $new_name.'-'.$y.'.'.$ext;

                        $builder->resetQuery();
                        $builder->where('file1', $new_name);
                        $builder->orWhere('file2', $new_name);
                        $builder->orWhere('file3', $new_name);
                        $builder->orWhere('file4', $new_name);
                        $builder->orWhere('file5', $new_name);
                        $builder->orWhere('image', $new_name);
                        $query = $builder->get();
                        //$query = mysql_query("SELECT * FROM orders WHERE file1='$new_name' OR file2='$new_name' OR file3='$new_name' OR file4='$new_name' OR file5='$new_name' OR image='$new_name'");
                        $y++;
                    }
                    $file = $new_name;
                }
				$files[$i] = $file;
				$target_path = "files/" . $files[$i]; 
				move_uploaded_file($_FILES['thefile'.$i]['tmp_name'], $target_path);
			}
		}
		
		//Bilden
		$image = '';
		if($_FILES['theimage']['name']) {
			$image = basename($_FILES['theimage']['name']);

            //Check for dulpicate filenames
            $builder->resetQuery();
            $builder->where('file1', $image);
            $builder->orWhere('file2', $image);
            $builder->orWhere('file3', $image);
            $builder->orWhere('file4', $image);
            $builder->orWhere('file5', $image);
            $builder->orWhere('image', $image);
            $query = $builder->get();
            //$query = mysql_query("SELECT * FROM orders WHERE file1='$image' OR file2='$image' OR file3='$image' OR file4='$image' OR file5='$image' OR image='$image'");
            if($query->getNumRows() > 0) {
                $i = 2;
                while($query->getNumRows() > 0) {
                    $ext = end(explode('.',$image));
                    $new_name = substr($image,0,strlen($image)-strlen($ext)-1);
                    $new_name = $new_name.'-'.$i.'.'.$ext;

                    $builder->resetQuery();
                    $builder->where('file1', $new_name);
                    $builder->orWhere('file2', $new_name);
                    $builder->orWhere('file3', $new_name);
                    $builder->orWhere('file4', $new_name);
                    $builder->orWhere('file5', $new_name);
                    $builder->orWhere('image', $new_name);
                    $query = $builder->get();
                    //$query = mysql_query("SELECT * FROM orders WHERE file1='$new_name' OR file2='$new_name' OR file3='$new_name' OR file4='$new_name' OR file5='$new_name' OR image='$new_name'");
                    $i++;
                }
                $image = $new_name;
            }
			
			$target_path = "files/" . $image;
			move_uploaded_file($_FILES['theimage']['tmp_name'], $target_path);
		}

		if($name == '') {
			if($files[1] == '') {
				if($image == '') {
					$name = uniqid();
				} else {
					$name = $image;
				}
			} else {
				$name = $files[1];
			}
		}
		$m2 = (($width/1000) * ($height/1000)) * $quantity;
		
		//var_dump ($done_before);
		
		$arr = array(
					 	'status'	=>	'ny',
					 	'created'	=>	time(),
						'order_id'	=>	$order_id,
						'name'		=>	$name,
						'height'	=>	$height,
						'width'		=>	$width,
						'm2'		=>	$m2,
						'quantity'	=>	$quantity,
						'done_before'	=>	(empty($done_before) ? '0000-01-01' : $done_before),
						'material'	=>	(empty($material) ? '0' : $material),
						'laminate'	=>	(empty($laminate) ? '0' : $laminate),
						'cutter'	=>	(empty($cutter) ? '0' : $cutter),
						'leverans'	=>	(empty($leverans) ? '0' : $leverans),
						'signature_id'	=>	$signature
					);
		
		if( !$id ) {
            //New order
			$builder->insert($arr);
			$id = $db->insertID();
			
			//Image
			$builder->resetQuery();
			$builder->where('id',$id);
			if($image != '') {
                //Vanlig
                $builder->set(array('image'=>$image));
				$builder->update();
			} elseif(isset($_POST['theimage_old'])) {
                $builder->set(array('image'=>$_POST['theimage_old']));
				$builder->update();
			}
			
			//Files
			for($i=1; $i<=5; $i++) {
                if(isset($files[$i])) {
                    //Vanlig ladda upp
					$builder->where('id',$id);
                    $builder->set(array('file'.$i=>$files[$i]));
                    $builder->update();
				} elseif (isset($_POST['thefile'.$i.'_old']) && $_POST['thefile'.$i.'_old'] != '') {
                    //Reprint
					$builder->where('id',$id);
                    $builder->set(array('file'.$i=>$_POST['thefile'.$i.'_old']));
                    $builder->update();
				}
			}
			
			//Comment
			if(!empty($comment)) {
				$builder->set(array(
								'text'		=>	$comment,
								'signature_id'	=> $signature,
								'order_id'	=>	$id,
								'created'	=>	time()
							));
				$builder->insert($arr);
			}
			$session->setTempdata('message',"<p class='message success'>Order '<b>".$name."'</b> laddades upp</p>");
			header('location:'.base_url().'ordrar');
		} else {
            $builder->resetQuery();

            //Uppdatera
			$builder->where('id',$id);
			$builder->set($arr);
			$builder->update();
			
			//Bild
			if($image) {
				$builder->where('id',$id);
				$builder->set(array('image'=>$image));
				$builder->update();
			}
			
			//Files
			foreach($files as $i => $filename) {
				$builder->where('id',$id);
				$builder->set(array('file'.$i=>$filename));
				$builder->update();
			}
			
			$session->setTempdata('message',"<p class='message success'>Order '<b>".$name."'</b> uppdaterades</p>");
			header('location:'.base_url().'ordrar/visa/'.$id);
		}
	}
}
