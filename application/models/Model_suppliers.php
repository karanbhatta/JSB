<?php 

class Model_suppliers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
	/* get the orders data */ 
	public function getSupplierData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM imports WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM imports ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



		public function getSupplier($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM suppliers WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM suppliers ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	public function getSuppliersItemData($import_id = null)
	{
		if(!$import_id) {
			return false;
		}

		$sql = "SELECT * FROM imports_item WHERE import_id = ?";
		$query = $this->db->query($sql, array($import_id)); 
		return $query->result_array();
	}

	public function getSuppliersItemDataDetail($import_id = null)
	{
		if(!$import_id) {
			return false;
		}

		$sql = "SELECT * FROM imports LEFT JOIN imports_item on imports_item.import_id=imports.id WHERE imports.supplier_name = ?";
		$query = $this->db->query($sql, array($import_id)); 
		return $query->result_array();
	}


/* get the orders data */ 
	public function getSuplierInformationData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM suppliers WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
 
		$sql = "SELECT * FROM suppliers ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
// supplier ledeger
	
public function getReport($sd, $ed, $customer_name){
	$sql = "SELECT imports.paid_amount, imports.net_amount, imports.bill_no, imports.date_time, imports.supplier_name, imports_item.import_id, imports_item.product_id, imports_item.qty, imports_item.rate, imports_item.amount, products.name, products.sku from imports LEFT join imports_item on imports.id=imports_item.import_id LEFT JOIN products on imports_item.product_id=products.id 
	WHERE imports.date_time  BETWEEN ? AND ? AND imports.sid=?";
			$query = $this->db->query($sql, array($sd,$ed, $customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;

}
public  function getReport2($customer_name)
{
	$sql = "SELECT Distinct name from suppliers where id=?";
			$query = $this->db->query($sql, array($customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;
}
 public function getReport3($sd, $ed, $customer_name){
 	$sql = "SELECT MAX(date_time) as max, MIN(date_time) as min from imports where date_time BETWEEN ? AND ? AND sid=?";
			$query = $this->db->query($sql, array($sd, $ed, $customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;
 }

// end supplier ledger


	public function createSupplier($data)
	{
		if($data) {
			$insert = $this->db->insert('suppliers', $data);
			return ($insert == true) ? true : false;
		}
	}



public function updateSupplier($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('suppliers', $data);
			return ($update == true) ? true : false;
		}
	}

	public function removeSupplier($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('suppliers');
			return ($delete == true) ? true : false;
		}
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $this->input->post('bill_no'),
    		'supplier_name' => $this->input->post('supplier_name'),
    		    		'sid' => $this->input->post('sid'),

    		// 'supplier_address' => $this->input->post('supplier_address'),
    		// 'supplier_phone' => $this->input->post('supplier_phone'),
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $this->input->post('gross_amount_value'),
    		'service_charge_rate' => $this->input->post('service_charge_rate'),
    		'service_charge' => ($this->input->post('service_charge') > 0) ?$this->input->post('service_charge'):0,
    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
    		'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
    		'net_amount' => $this->input->post('net_amount_value'),
    		'discount' => $this->input->post('discount'),
    		'due_amount' => $this->input->post('due_amount_value'),
    		'paid_amount' => $this->input->post('paid_amount'),

    		// bank
    		'cheque_no' => $this->input->post('cheque_no'),
    		'cheque_name' => $this->input->post('cheque_name'),
    		'bank_name' => $this->input->post('bank_name'),
    		'deposited_by' => $this->input->post('deposited_by'),

    		'paid_status' => 2,
    		'user_id' => $user_id
    	);

		$insert = $this->db->insert('imports', $data);
		$import_id = $this->db->insert_id();

		$this->load->model('model_suppliers');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'import_id' => $import_id,
    			'product_id' => $this->input->post('product')[$x],
    			'qty' => $this->input->post('qty')[$x],
    			'rate' => $this->input->post('rate')[$x],
    			'amount' => $this->input->post('amount_value')[$x],
    			'date'=>strtotime(date('Y-m-d h:i:s a')),
    			  's_id' => $this->input->post('sid'),

    		);

    		$this->db->insert('imports_item', $items);

    		// now decrease the stock from the product
    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
    		$qty = (int) $product_data['qty'] + (int) $this->input->post('qty')[$x];

    		$update_product = array('qty' => $qty);


    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
    	}

		return ($import_id) ? $import_id : false;
	}

	public function countOrderItem($import_id)
	{
		if($import_id) {
			$sql = "SELECT * FROM imports_item WHERE import_id = ?";
			$query = $this->db->query($sql, array($import_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
				'supplier_name' => $this->input->post('supplier_name'),
				 'sid' => $this->input->post('sid'),

	    		// 'supplier_address' => $this->input->post('supplier_address'),
	    		// 'supplier_phone' => $this->input->post('supplier_phone'),
	    		'gross_amount' => $this->input->post('gross_amount_value'),
	    		'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		'service_charge' => ($this->input->post('service_charge') > 0) ? $this->input->post('service_charge'):0,
	    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		'vat_charge' => ($this->input->post('vat_charge') > 0) ? $this->input->post('vat_charge') : 0,
	    		'net_amount' => $this->input->post('net_amount_value'),
	    		'due_amount' => $this->input->post('due_amount_value'),
    			'paid_amount' => $this->input->post('paid_amount'),
	    		'discount' => $this->input->post('discount'),
	    		'paid_status' => $this->input->post('paid_status'),
	    		'user_id' => $user_id,


	    		'cheque_no' => $this->input->post('cheque_no'),
    		'cheque_name' => $this->input->post('cheque_name'),
    		'bank_name' => $this->input->post('bank_name'),
    		'deposited_by' => $this->input->post('deposited_by')
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('imports', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_suppliers');
			$get_order_item = $this->getSuppliersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}

			// now remove the order item data 
			$this->db->where('import_id', $id);
			$this->db->delete('imports_item');

			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'import_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
	    			    			  's_id' => $this->input->post('sid'),

	    		);
	    		$this->db->insert('imports_item', $items);

	    		
	    	}

			return true;
		}
	}



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id); 
			$delete = $this->db->delete('imports');

			$this->db->where('import_id', $id);
			$delete_item = $this->db->delete('imports_item');
			return ($delete == true && $delete_item) ? true : false;
		} 
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function todaySale()
	{
		$sql = "SELECT products.name,
SUM(imports_item.amount) as amount
FROM products, imports_item
WHERE products.id=imports_item.product_id
GROUP BY products.id,products.name
ORDER BY products.id";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}

}