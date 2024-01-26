<?php

namespace App\Models;

use CodeIgniter\Model;

class CaveOrdersModel extends Model
{
    protected $table      = 'thecave_orders';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = [
        'id',
        'status',
        'created',
        'order_id',
        'name',
        'image',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
        'height',
        'width',
        'm2',
        'quantity',
        'done_before',
        'material',
        'laminate',
        'cutter',
        'leverans',
        'signature_id',
    ];

    public function get( $status = false) {
        $session = session();
		$db = \Config\Database::connect();
		$builder = $db->table($this->table);

		//Set default order by
		if( $session->getTempdata('order_by') == '' ) {
            $session->setTempdata('order_by', 'id');
        }
		if( $session->getTempdata('order_how') == '' ) {
            $session->setTempdata('order_how', 'DESC');
        }
		
		if(is_numeric($status)) {
            //Get single order
            $builder->where('id', $status);
		} else {
            //Normal
			if($status) {
                $builder->where('status', $status);
			}

			if(!empty($_GET['search_text'])) {
				$text = $_GET['search_text'];
				$arr = explode(' ',$text);
				$search = '';
				foreach($arr as $word) {
					if(!empty($search)) { $search .= " OR "; }
					$search .= "name LIKE '%$word%'";
					$search .= " OR id = '$word'";
					$search .= " OR file1 like '%$word%'";
					$search .= " OR file2 like '%$word%'";
					$search .= " OR file3 like '%$word%'";
					$search .= " OR file4 like '%$word%'";
					$search .= " OR file5 like '%$word%'";
				}
				$builder->where("(".$search.")");
			}
			$order_by = $session->getTempdata('order_by');
			$order_how = $session->getTempdata('order_how');
			
			if($order_by == 'comments') {
				$builder->select("*, (SELECT count(order_id) FROM thecave_comments WHERE order_id=orders.id) AS comments");
			}
			
			$builder->orderBy($order_by, $order_how);
		}
		$q = $builder->get();

		$orders = array();
		$i = 0;
		foreach($q->getResultArray() as $row) {
			$orders[$i] = $row;
			$orders[$i]['order_id'] = empty($row['order_id']) ? '&nbsp;' : $row['order_id'];
			$orders[$i]['material_name'] = $this->get_data('thecave_materials',$row['material']);
			$orders[$i]['laminate_name'] = $this->get_data('thecave_laminates',$row['laminate']);
			$orders[$i]['cutter_name'] = $this->get_data('thecave_cutters',$row['cutter']);
			if($row['status'] == 'ny') {
				$orders[$i]['new_status'] = 'printad';
			} elseif($row['status'] == 'printad') {
				$orders[$i]['new_status'] = 'klar';
			} elseif($row['status'] == 'klar') {
				$orders[$i]['new_status'] = 'arkiverad';
			} else {
				$orders[$i]['new_status'] = '';
			}

			if(!empty($row['image']) && file_exists('files/'.$row['image'])) {
				$filename = 'files/'.$row['image'];
			} else {
				$filename = 'images/no_image.jpg';
			}
			$orders[$i]['image_url'] = base_url().$filename;
			$orders[$i]['thumb_url'] = base_url().'timthumb.php?src=/'.$filename.'&h=150&w=150&zc=1';
			if($row['done_before'] == '0000-00-00') {
				$orders[$i]['done_before'] = '&nbsp;';
			}
			$orders[$i]['m2'] = round($row['m2'],4);
			
			//Comments
			$orders[$i]['comments'] = array();

			$builder2 = $db->table('thecave_comments');
			$builder2->where('order_id',$row['id']);
			$builder2->orderBy('id','asc');
			$q = $builder2->get();
			$orders[$i]['comments'] = $q->getResultArray();
			
			$i++;
		}
		
		if(count($orders) == 1 && is_numeric($status)) {
			$orders = $orders[0];
		}
		
		return $orders;
	}
	
	public function get_data($table, $id = '') {
		$db = \Config\Database::connect();
		$builder = $db->table($table);

		if($id != '') {
			$builder->where('id',$id);
			$q = $builder->get();
			$r = $q->getResultArray();
			if(!empty($r[0]['name'])) {
				return $r[0]['name'];
			} else {
				return '&nbsp;';
			}
		} else {
			$q = $builder->get();
			return $q->getResultArray();
		}
	}
}