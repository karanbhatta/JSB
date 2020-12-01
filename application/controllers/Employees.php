<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Orders';
				$this->load->library('Pdf_report');

		$this->load->model('model_employees');
		$this->load->model('model_vehicles');
		$this->load->model('model_products');
		$this->load->model('model_company');
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index()
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
$language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
							

if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}			}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		$this->data['page_title'] = 'Manage Employees';
		$this->render_template('employees/index', $this->data);		
	}



public function manageSalary()
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
 $vehicle_no=$this->input->post('emp_id');
			$this->session->set_userdata('emp_id', $vehicle_no);

 $vehicle=$this->model_employees->getEmployeesData();
        $this->data['employee']=$vehicle;


$language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
							

if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}			}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		$this->data['page_title'] = 'Manage Employees';
		$this->render_template('employees/manage_salary', $this->data);		
	}


	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/

	public function fetchEmployeesData()
	{

		
		$result = array('data' => array());

		$data = $this->model_employees->getEmployeesData();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_employees->countOrderItem($value['id']);
			$date = date('d-m-Y', $value['hire_date']);
			$time = date('h:i a', $value['hire_date']);

			$date_time = $date . ' ' . $time;
$img = '<img src="'.base_url($value['picture']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

			// button
			$buttons = '';

			// if(in_array('viewEmployee', $this->permission)) {
			// 	$buttons .= '<a target="__blank" href="'.base_url('employees/report/'.$value['id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
			// }

			if(in_array('updateEmployee', $this->permission)) {
				$buttons .= ' <a href="'.base_url('employees/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteEmployee', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value['status'] == 1) {
				$paid_status = '<span class="label label-success">Available</span>';	
			}
			elseif ($value['status'] == 2) {
			 
				$paid_status = '<span class="label label-warning">Unavailable</span>';
			}

			$result['data'][$key] = array(
				$img,
				$value['employee_id_no'],
				$value['name'],
				$value['phone'],
				$value['present_address'],
				$value['permanent_address'],
				$value['post'],
				
				$date_time,
			
				
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}


	// fetch salary data

	public function fetchSalaryData()
	{



$vehicle_no = $this->session->userdata('emp_id');
	// echo $vehicle_no;


		$result = array('data' => array());

		$data = $this->model_employees->getSalaryData($vehicle_no);

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_employees->countOrderItem($value['id']);
			$from_date = date('d-m-Y', $value['from_date']);

			$to_date = date('d-m-Y', $value['to_date']);
			


			// button
			$buttons = '';

			// if(in_array('viewEmployee', $this->permission)) {
			// 	$buttons .= '<a target="__blank" href="'.base_url('employees/details/'.$value['id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
			// }

			if(in_array('updateEmployee', $this->permission)) {
				$buttons .= ' <a href="'.base_url('employees/updateSalary/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteEmployee', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}


			$result['data'][$key] = array(
				$value['name'],
				$value['phone'],
				$value['salary'],
				$value['bonus'],
				
				$from_date,
				$to_date,
			
				
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
	// end fetch salary data

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/

	public function create()
	{
		if(!in_array('createEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Employee';

		$this->form_validation->set_rules('name', 'Full name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {      





        	
        	$order_id = $this->model_employees->create();
        	
        	if($order_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('employees/index', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('employees/create/', 'refresh');
        	}
        }
        else {
            // false case
              	
 			$language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
						if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}

		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		

            $this->render_template('employees/create', $this->data);
        }	
	}







// create salary

	public function createSalary()
	{
		if(!in_array('createEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $employee = $this->model_employees->getEmployeesData();
        $this->data['employee']=$employee;

		$this->data['page_title'] = 'Add Salary';

		$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_employees->createSalary();
        	
        	if($order_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('employees/manageSalary', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('employees/add_salary/', 'refresh');
        	}
        }
        else {
            // false case
              	
 			$language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
						if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}

		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		

            $this->render_template('employees/add_salary', $this->data);
        }	
	}

	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the order page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}

	/*
	* If the validation is not valid, then it redirects to the edit orders page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	
	public function update($id)
	{
		if(!in_array('updateEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Employee';

		$this->form_validation->set_rules('name', 'Full name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_employees->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('employees/index/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('employees/update/'.$id, 'refresh');
        	}
        } 
        else {
            // false case
           

        	$result = array();
        	$orders_data = $this->model_employees->getEmployeesData($id);

    		$result['employee'] = $orders_data;
    		
    		
    		$this->data['employees'] = $result;


			 $language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
						if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}

		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		

            $this->render_template('employees/edit', $this->data);
        }
	}


// update salary

public function updateSalary($id)
	{
		if(!in_array('updateEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Salary';

		$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_employees->updateSalary($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('employees/manageSalary/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('employees/updateSalary/'.$id, 'refresh');
        	}
        } 
        else {
            // false case
           

        	$result = array();
        	$orders_data = $this->model_employees->getSalaryData($id);
        	$emps = $this->model_employees->getEmployeesData();
			
			$this->data['emp']=$emps;

    		$result['employee'] = $orders_data;
    		
    		
    		$this->data['employees'] = $result;


			 $language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
						if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}

		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		

            $this->render_template('employees/edit_salary', $this->data);
        }
	}

	// close update salary

	public function customer_ledger(){
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		
	
        else {
            // false case
        	$customer = $this->model_orders->getCustomer();
        	        	$this->data['customer_data'] = $customer;

      //   	$result = array();
      //   	// $orders_data = $this->model_orders->getOrdersData($id);

    		// $result['order'] = $orders_data;
    		// // 
    		// // $orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);

    		// foreach($orders_item as $k => $v) {
    		// 	$result['order_item'][] = $v;
    		// }

    		// $this->data['order_data'] = $result;

      //   	$this->data['products'] = $this->model_products->getActiveProductData();   

			 $language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			}
		} else {
						if($language=='np')	{
						$this->lang->load('locale', 'nepali');

						}else{
							$this->lang->load('locale', 'english');

						}

		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		

		$this->render_template('orders/customer_ledger', $this->data);	
        }
	}



	public function getCustomerLedgerDetail(){
		if(isset($_GET["sd"])){
		$sd = strtotime($_GET["sd"]);
	$ed = strtotime($_GET["ed"]);
	$customer_name=$_GET["customer_name"];


}else {
	$sd = "";
	$ed = "";
$customer_name="";
}

		$language = $this->session->userdata('locale');
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->session->set_userdata('locale', 'np');

				$this->lang->load('locale', 'nepali');
			} else {
								$this->session->set_userdata('locale', 'en');

				$this->lang->load('locale', 'english');
			} 
		} else {
							

if($language=='np')	{
						$this->lang->load('locale', 'nepali');
 
						}else{
							$this->lang->load('locale', 'english');

						}			}
		
		$this->data['language'] = $language == '' ? 'en' : $language;
		$data=$this->model_orders->getReport($sd, $ed, $customer_name);
		$data2=$this->model_orders->getReport2($customer_name);
		$data3=$this->model_orders->getReport3($sd, $ed, $customer_name);

		$this->load->view('orders/ledger', ['data'=>$data, 'data2'=>$data2, 'data3'=>$data3]);
	}
	

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$order_id = $this->input->post('order_id');

        $response = array();
        if($order_id) {
            $delete = $this->model_employees->remove($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response); 
	}

	public function removeSalary()
	{
		if(!in_array('deleteEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$order_id = $this->input->post('order_id');

        $response = array();
        if($order_id) {
            $delete = $this->model_employees->removeSalary($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the salary information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response); 
	}

	/*
	* It gets the product id and fetch the order data. 
	* The order print logic is done here 
	*/
	public function printDiv($id) 
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$company_info = $this->model_company->getCompanyData(1);

			$order_date = date('d/m/Y', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Invoice</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
			          '.$company_info['company_name'].'
			          <small class="pull-right">Date: '.$order_date.'</small>
			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
			      <div class="col-sm-4 invoice-col">
			        
			        <b>Bill ID:</b> '.$order_data['bill_no'].'<br>
			        <b>Name:</b> '.$order_data['customer_name'].'<br>
			        <b>Address:</b> '.$order_data['customer_address'].' <br />
			        <b>Phone:</b> '.$order_data['customer_phone'].'<br>
			        <b>Email:</b> '.$order_data['customer_email'].'
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          <thead>
			          <tr>
			            <th>Product name</th>
			            <th>Price</th>
			            <th>Qty</th>
			            <th>Amount</th>
			          </tr>
			          </thead>
			          <tbody>'; 

			          foreach ($orders_items as $k => $v) {

			          	$product_data = $this->model_products->getProductData($v['product_id']); 
			          	
			          	$html .= '<tr>
				            <td>'.$product_data['name'].'</td>
				            <td>'.$v['rate'].'</td>
				            <td>'.$v['qty'].'</td>
				            <td>'.$v['amount'].'</td>
			          	</tr>';
			          }
			          
			          $html .= '</tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        <div class="table-responsive">
			          <table class="table">
			            <tr>
			              <th style="width:50%">Gross Amount:</th>
			              <td>'.$order_data['gross_amount'].'</td>
			            </tr>';

			            if($order_data['service_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Service Charge</th>
				              <td>'.$order_data['service_charge'].'</td>
				            </tr>';
			            }

			            if($order_data['vat_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Vat Charge ('.$order_data['vat_charge_rate'].'%)</th>
				              <td>'.$order_data['vat_charge'].'</td>
				            </tr>';
			            }
			            
			            
			            $html .=' <tr>
			              <th>Discount:</th>
			              <td>'.$order_data['discount'].'</td>
			            </tr>
			            <tr>
			              <th>Net Amount:</th>
			              <td>'.$order_data['net_amount'].'</td>
			            </tr>
			            <tr>
			              <th>Paid Status:</th>
			              <td>'.$paid_status.'</td>
			            </tr>
			          </table>
			        </div>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		}
	}

}