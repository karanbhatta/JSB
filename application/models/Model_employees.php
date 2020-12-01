<?php 

class Model_employees extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
 public function getCustomer(){
 	$sql = "SELECT * FROM employees";
		$query = $this->db->query($sql);
		return $query->result_array();
 }
	/* get the orders data */
	public function getEmployeesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM employees WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM employees ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get salary data

	public function getSalaryData($id = null)
	{
		if($id) {
			$sql = "SELECT salaries.e_id, salaries.id as id, employees.name, employees.phone, salaries.salary, salaries.bonus, salaries.from_date, salaries.to_date from salaries left JOIN employees on salaries.e_id=employees.id WHERE employees.id = ?";
			$query = $this->db->query($sql, array($id));
		return $query->row_array();
		}

		$sql = "SELECT salaries.e_id,  salaries.id, employees.name, employees.phone, salaries.salary, salaries.bonus, salaries.from_date, salaries.to_date from salaries left JOIN employees on salaries.e_id=employees.id ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
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

		$sql = "SELECT * FROM orders_item WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		// $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	                	$upload_image = $this->upload_image();

  	$data = array(
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'post' => $this->input->post('post'),
        		'phone' => $this->input->post('phone'),
        		'alternative_phone' => $this->input->post('alternative_phone'),
        		'picture' => $upload_image,
        		'employee_id_no' => $this->input->post('employee_id_no'),
        		
                'present_address' => $this->input->post('present_address'),
        		'permanent_address' => $this->input->post('permanent_address'),

        		'state' => $this->input->post('state'),
        		
                'city' => $this->input->post('city'),
        		'zip_code' => $this->input->post('zip_code'),

        		'hire_date' => strtotime($this->input->post('hire_date')),
        		
                'status' => $this->input->post('status'),
        	);

		$insert = $this->db->insert('employees', $data);
		$order_id = $this->db->insert_id();

		

		return ($order_id) ? $order_id : false;
	}

	public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('picture'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['picture']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }






	// create salary

	public function createSalary()
	{
		$user_id = $this->session->userdata('id');
		// $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(

    		'e_id' => $this->input->post('employee_id'),
    		'salary' => $this->input->post('salary'),

    		// 'hire_date' => strtotime(date('Y-m-d h:i:s a')),

    		'bonus' =>$this->input->post('bonus'),
    		'from_date' =>strtotime($this->input->post('from_date')),
    		'to_date' =>  strtotime($this->input->post('to_date')),

    	);

		$insert = $this->db->insert('salaries', $data);
		$order_id = $this->db->insert_id();

		

		return ($order_id) ? $order_id : false;
	}
	// end create salary

	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM employees WHERE id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function updateSalary($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
			'e_id' => $this->input->post('employee_id'),
    		'salary' => $this->input->post('salary'),

    		// 'hire_date' => strtotime(date('Y-m-d h:i:s a')),

    		'bonus' =>$this->input->post('bonus'),
    		'from_date' =>strtotime($this->input->post('from_date')),
    		'to_date' =>  strtotime($this->input->post('to_date')),
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('salaries', $data);

			// now the order item 
		

			return true;
		}
	}



	// update salary

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

if($_FILES['picture']['size'] > 0) {
                $upload_image = $this->upload_image();
                $upload_image = array('picture' => $upload_image);
                
               $this->db->update('employees', $upload_image);
            }
  	$data = array(
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'post' => $this->input->post('post'),
        		'phone' => $this->input->post('phone'),
        		'alternative_phone' => $this->input->post('alternative_phone'),
        		'employee_id_no' => $this->input->post('employee_id_no'),
        		
                'present_address' => $this->input->post('present_address'),
        		'permanent_address' => $this->input->post('permanent_address'),

        		'state' => $this->input->post('state'),
        		
                'city' => $this->input->post('city'),
        		'zip_code' => $this->input->post('zip_code'),

        		'hire_date' => strtotime($this->input->post('hire_date')),
        		
                'status' => $this->input->post('status'),
        	);

			$this->db->where('id', $id);
			$update = $this->db->update('employees', $data);

			// now the order item 
		

			return true;
		}
	}
	// close update salary



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id); 
			$delete = $this->db->delete('employees');

			return ($delete == true) ? true : false;
		} 
	}

		public function removeSalary($id)
	{
		if($id) {
			$this->db->where('id', $id); 
			$delete = $this->db->delete('salaries');

			return ($delete == true) ? true : false;
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