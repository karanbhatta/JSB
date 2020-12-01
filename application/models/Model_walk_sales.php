<?php 

class Model_walk_sales extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
 
 public function getCustomer(){
 	$sql = "SELECT * FROM customers  ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
 }


  public function getCustomerById($id){
 	$sql = "SELECT * FROM customers WHERE id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
 }


  public function getCustomerBySale($id){
 	$sql = "SELECT customers.customer_address, customers.customer_address,customers.customer_email, customers.customer_phone FROM customers LEFT join sales on customers.id=sales.customer_id WHERE sales.id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
 }

	/* get the orders data */
	public function getOrdersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM walk_sales WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		$sql = "SELECT * from walk_sales order by id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

public function getSalesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM walk_sales WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
$sql = "SELECT * from walk_sales order by id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


public function getSalesItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}

			$sql = "SELECT * FROM walk_sales_item WHERE sales_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}



public function getOrdersDataDetail($id = null)
	{
		if($id) {
			$sql = "SELECT * from walk_sales where id=?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		
		
	}


public function getReport($sd, $ed, $customer_name){
	$sql = "SELECT orders.paid_amount, orders.net_amount, orders.bill_no, orders.date_time, orders.customer_name, orders_item.order_id, orders_item.product_id, orders_item.qty, orders_item.rate, orders_item.amount, products.name, products.sku from orders LEFT join orders_item on orders.id=orders_item.order_id LEFT JOIN products on orders_item.product_id=products.id WHERE orders.date_time  BETWEEN ? AND ? AND customer_name=?";
			$query = $this->db->query($sql, array($sd,$ed, $customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;

}
public  function getReport2($customer_name)
{
	$sql = "SELECT Distinct customer_name from orders where customer_name=?";
			$query = $this->db->query($sql, array($customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;
}
 public function getReport3($sd, $ed, $customer_name){
 	$sql = "SELECT MAX(date_time) as max, MIN(date_time) as min from orders where date_time BETWEEN ? AND ? AND customer_name=?";
			$query = $this->db->query($sql, array($sd, $ed, $customer_name));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;
 }

	// get the orders item data
	public function getOrdersItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM sales_item WHERE bill_no = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function create()
	{


		$user_id = $this->session->userdata('id');
		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $bill_no,
    		'customer_name' => $this->input->post('customer_name'),
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $this->input->post('gross_amount_value'),
    		'net_amount' => $this->input->post('net_amount_value'),
    		'discount' => $this->input->post('discount'),
    		'due_amount' => $this->input->post('due_amount_value'),
    		'paid_amount' => $this->input->post('paid_amount'),
    		
    		'paid_status' => 2,
    		'user_id' => $user_id
    	);

		$insert = $this->db->insert('walk_sales', $data);
		$order_id = $this->db->insert_id();

		$this->load->model('model_products');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'sales_id' => $order_id,
    			'product_id' => $this->input->post('product')[$x],
    			'qty' => $this->input->post('qty')[$x],
    			'rate' => $this->input->post('rate')[$x],
    			'amount' => $this->input->post('amount_value')[$x],
    			'date_time'=>strtotime(date('Y-m-d h:i:s a')),
    		);

    		$this->db->insert('walk_sales_item', $items);



    		// $sales = array(
    		// 	'vehicle_no' => $this->input->post('vehicle_no'),
    		// 	'gross_amount' => $this->input->post('gross_amount_value'),
    		// 	'date_time'=>strtotime(date('Y-m-d h:i:s a')),
    		// );

    		// $this->db->insert('sales', $sales);

    		// now decrease the stock from the product
    		// $product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
    		// $qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

    		// $update_product = array('qty' => $qty);


    		// $this->model_products->update($update_product, $this->input->post('product')[$x]);
    	}

		return ($order_id) ? $order_id : false;
	}

	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM sales_item WHERE vehicle_no = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	// total sales
public function countTotalWalkSales($sd=null, $ed=null){

if($sd&&$ed) {
			$sql = "SELECT sum(net_amount) as net_amount  FROM walk_sales WHERE date_time  BETWEEN ? AND ? ";
			$query = $this->db->query($sql, array($sd, $ed));
		return $query->row_array();
		}

		$sql = "SELECT sum(net_amount) as net_amount FROM walk_sales";
		$query = $this->db->query($sql);
		return $query->row_array();

}


// total purchase
public function countTotalPurchases($sd=null, $ed=null){

if($sd&&$ed) {
			$sql = "SELECT sum(net_amount) as net_amount  FROM imports WHERE date_time  BETWEEN ? AND ? ";
			$query = $this->db->query($sql, array($sd, $ed));
			return $query->num_rows();
		}

		$sql = "SELECT sum(net_amount) as net_amount FROM imports";
		$query = $this->db->query($sql);
		return $query->row_array();

}
	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
			'bill_no' => $this->input->post('bill_no'),
    		'customer_name' => $this->input->post('customer_name'),
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $this->input->post('gross_amount_value'),
    		'net_amount' => $this->input->post('net_amount_value'),
    		'discount' => $this->input->post('discount'),
    		'due_amount' => $this->input->post('due_amount_value'),
    		'paid_amount' => $this->input->post('paid_amount'),
    	
    		'paid_status' => $this->input->post('paid_status'),
    		'user_id' => $user_id
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('walk_sales', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				// $this->model_products->update($update_product_data, $product_id);
			}

			// now remove the order item data 
			$this->db->where('sales_id', $id);
			$this->db->delete('walk_sales_item');
			

			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    		'sales_id' => $id,
    			'product_id' => $this->input->post('product')[$x],
    			'qty' => $this->input->post('qty')[$x],
    			'rate' => $this->input->post('rate')[$x],
    			'amount' => $this->input->post('amount_value')[$x],
    			'date_time'=>strtotime(date('Y-m-d h:i:s a')),
	    		);
	    		$this->db->insert('walk_sales_item', $items);

				


	    		// now decrease the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

	    		$update_product = array('qty' => $qty);
	    		// $this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}

			return true;
		}
	}



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id); 
			$delete = $this->db->delete('sales');

			$this->db->where('sales_id', $id);
			$delete_item = $this->db->delete('sales_item');
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
SUM(orders_item.amount) as amount
FROM products, orders_item
WHERE products.id=orders_item.product_id
GROUP BY products.id,products.name
ORDER BY products.id";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}

}