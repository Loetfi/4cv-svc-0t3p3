<?php  

namespace App\Repositories;

use DB;
use App\Models\OTP as OTPModel;
use Illuminate\Database\QueryException; 

class DatatableOTPRepo
{
	var $table          = 'Users';
	var $column_order   = array( 'UserId','UserId', 'Username','Email','Name','Phone','UserId' ); 
	//set column field database for datatable orderable
	var $column_search  = array( 'UserId','UserId', 'Username','Email','Name','Phone','UserId' ); //set column field database for datatable searchable 
	var $order          = array('UserId' => 'DESC'); // default order

	private function _get_datatables_query() {
		try {
			
			// $this->db->select("a.* , a.username as Username , concat(a.first_name,' ',a.last_name) as Fullname");
			// $this->db->from($this->table.' a');   

			$users = DB::table('OTP')->select('OTPSendId', 'PhoneNumber')

			$i = 0;
			foreach ($this->column_search as $item) { // loop column
			if(@$_GET['search']['value']) { // if datatable send POST for search

				if($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					// $this->db->like($item, @$_POST['search']['value']);
					->where($item, 'like', @$_GET['search']['value'].'%')
				}
				else {
					// $this->db->or_like($item, @$_GET['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) { //last loop
					// $this->db->group_end(); //close bracket
				}
				$i++;
			}
		}

			if(isset($_GET['order'])) { // here order processing
				// $this->db->order_by($this->column_order[@$_POST['order']['0']['column']], @$_POST['order']['0']['dir']);
				->orderBy($this->column_order[@$_GET['order']['0']['column']], @$_GET['order']['0']['dir'])
			}
			else if(isset($this->order)) {
				$order = $this->order;
				->orderBy(key($order), $order[key($order)])
			}


		} catch (Exception $e) {
			echo 'error';
		}

	}


	public function get_datatables() {
			$this->_get_datatables_query();
			// if(!isset($where['GroupId'])) $this->db->where_in('GroupId', [7,9]);
			// if(count($where) > 0) $this->db->where_not_in('GroupId', [7,9]);
			if(@$_GET['length'] != -1) ->limit(@$_GET['length'])->offset(@$_GET['start']);
			// $query = $this->db->get();
			return ->get(); 
	}

	public static function get()
	{
		try { 
			foreach (OTPModel::get() as $key=> $category) {
				$categories[$category->OTPSendId] = $category->PhoneNumber;
			}
			return $categories;
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}

	} 


}
