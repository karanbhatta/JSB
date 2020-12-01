 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Orders';
			$this->load->library('Pdf_report');

		$this->load->model('model_suppliers');
		$this->load->model('model_products');
		$this->load->model('model_company');
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index()
	{
		if(!in_array('viewImport', $this->permission)) {
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
		$this->data['page_title'] = 'Manage Imports';
		$this->render_template('suppliers/index', $this->data);		
	}

	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/



// ledger

	public function supplier_ledger(){
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		
	
        else {
            // false case
        	$customer = $this->model_suppliers->getSupplier();
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
		

		$this->render_template('suppliers/suppliers_ledger', $this->data);	
        }
	}



	public function getSupplierLedgerDetail(){
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
		$data=$this->model_suppliers->getReport($sd, $ed, $customer_name);
		$data2=$this->model_suppliers->getReport2($customer_name);
		$data3=$this->model_suppliers->getReport3($sd, $ed, $customer_name);

		$this->load->view('suppliers/ledger', ['data'=>$data, 'data2'=>$data2, 'data3'=>$data3]);
	}
	
	// end ledger


public function report($supplier_name){
// echo $sd;
	if(isset($_GET["sd"])){
		$sd = strtotime($_GET["sd"]);
	$ed = strtotime($_GET["ed"]);
}else {
	$sd = "";
	$ed = "";}
	
	// echo date('d-m-Y', $sd);
	// echo $sd;
				$company_info = $this->model_company->getCompanyData(1);

			$datas=$this->model_suppliers->getReport($supplier_name, $sd, $ed);
			$data2=$this->model_suppliers->getReport2($supplier_name);
			$data3=$this->model_suppliers->getReport3($supplier_name);
			$d=0;
			$p=0;
			          	$n=0;
			// echo $data["name"];
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
			<body>
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
			          '.$company_info['company_name'].'
			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    
<form>
  <label for="sd">Start Date:</label>
  <input type="date" data-date-format="d-m-Y" id="sd" name="sd">
   <label for="ed">End Date:</label>
  <input type="date" id="ed" name="ed">
  <input type="submit">
</form>
			    <!-- Table row -->
			    <div class="row">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          <thead>
			          <tr>
			            <th>Bill Number</th>
			            <th>Date</th>
			            <th>Net Amount</th>
			            <th>Paid Amount</th>
			            <th>Due Amount</th>
			          </tr>
			          </thead>
			          <tbody>'; 
if($datas){
			          foreach ($datas as $v) {
			          	$d=$d+$v['due_amount'];
			          	$p=$p+$v['paid_amount'];
			          	$n=$n+$v['net_amount'];
			          	$html .= '<tr>
				            <td>'.$v['bill_no'].'</td>
				            <td>'.date('d-m-Y', $v['date_time']).'</td>
				            <td>'.$v['net_amount'].'</td>
				            <td>'.$v['paid_amount'].'</td>
				            <td>'.$v['due_amount'].'</td>
			          	</tr>';
			          }
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
			              <th style="width:50%">Total Amount:</th>
			              <td>'.$n.'</td>
			            </tr>';
			            
			            $html .=' <tr>
			              <th>Paid Amount:</th>
			              <td>'.$p.'</td>
			            </tr>
			            <tr>
			              <th>Due Amount:</th>
			              <td>'.$d.'</td>
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
    		
		// $this->	load->view('suppliers/report', ['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
		}



	public function fetchSuppliersData() 
	{
		$result = array('data' => array());

		$data = $this->model_suppliers->getSupplierData();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_suppliers->countOrderItem($value['id']);
			$date = date('d-m-Y', $value['date_time']);
			$time = date('h:i a', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			$buttons = '';

			if(in_array('viewImport', $this->permission)) {
				$buttons .= '<a target="__blank" href="'.base_url('Suppliers/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if(in_array('updateImport', $this->permission)) {
				$buttons .= ' <a href="'.base_url('Suppliers/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}
			$buttons .= ' <a target="blank" href="'.base_url('Suppliers/report/'.$value['sid']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
			if(in_array('deleteImport', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Paid</span>';	
			}
			elseif ($value['paid_status'] == 2) {
			 
				$paid_status = '<span class="label label-warning">Not Paid</span>';
			}else{
				$paid_status = '<span class="label label-danger">Due</span>';
			}

			$result['data'][$key] = array(
				$value['bill_no'],
				$value['supplier_name'],
				// $value['supplier_phone'],
				$date_time,
				// $count_total_item,
				$value['net_amount'],
				$value['paid_amount'],
				$value['due_amount'],
				// $paid_status,
				$value['bank_name'],
				$value['cheque_name'],
				$value['cheque_no'],
				$value['deposited_by'],
				
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{
		if(!in_array('createImport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Import';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$import_id = $this->model_suppliers->create();
        	
        	if($import_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('Suppliers/update/'.$import_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('Suppliers/create/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
$this->data['sups']=$this->model_suppliers->getSuplierInformationData();  
        	$this->data['products'] = $this->model_products->getActiveProductData();      	
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
		

            $this->render_template('suppliers/create', $this->data);
        }	
	}




	// create supplier
	public function createSupplier()
	{
		if(!in_array('createImport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$response = array();

		$this->form_validation->set_rules('name', 'Supplier name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'address' => $this->input->post('address'),
        		'contact' => $this->input->post('contact'),
        		'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_suppliers->createSupplier($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the Supplier information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) { 
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}




public function fetchSupplierInformationData()
	{
		$result = array('data' => array());

		$data = $this->model_suppliers->getSuplierInformationData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('updateImport', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editBrand('.$value['id'].')" data-toggle="modal" data-target="#editBrandModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteImport', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeBrand('.$value['id'].')" data-toggle="modal" data-target="#removeBrandModal"><i class="fa fa-trash"></i></button>
				';
			}		



			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$value['address'],
				$value['contact'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* It checks if it gets the brand id and retreives
	* the brand information from the brand model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchSuplierInformationDataById($id)
	{
		if($id) {
			$data = $this->model_suppliers->getSuplierInformationData($id);
			echo json_encode($data);
		}

		return false;
	}



	public function updateSupplier($id)
	{
		if(!in_array('updateImport', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_supplier_name', 'Supplier name', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_supplier_name'),
	        		'active' => $this->input->post('edit_active'),	
	        		'address' => $this->input->post('edit_supplier_address'),
	        		'contact' => $this->input->post('edit_supplier_contact')	
	        	);

	        	$update = $this->model_suppliers->updateSupplier($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the supplier information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else { 
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the brand information from the database 
	* and returns the json format operation messages
	*/
	public function removeSupplier()
	{
		if(!in_array('deleteImport', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$brand_id = $this->input->post('brand_id');
		$response = array();
		if($brand_id) {
			$delete = $this->model_suppliers->removeSupplier($brand_id);

			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
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
		if(!in_array('updateImport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Import';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_suppliers->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('Suppliers/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('Suppliers/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$result = array();
        	$orders_data = $this->model_suppliers->getSupplierData($id);

    		$result['order'] = $orders_data;
    		$imports_item = $this->model_suppliers->getSuppliersItemData($orders_data['id']);

    		foreach($imports_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
  
    		$this->data['order_data'] = $result;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	
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
		

            $this->render_template('suppliers/edit', $this->data);
        }
	}

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteImport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$import_id = $this->input->post('import_id');

        $response = array();
        if($import_id) {
            $delete = $this->model_suppliers->remove($import_id);
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
			$order_data = $this->model_suppliers->getSupplierData($id);
			$imports_items = $this->model_suppliers->getSuppliersItemData($id);
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
			        <b>Name:</b> '.$order_data['supplier_name'].'<br>
			        <b>Address:</b> '.$order_data['supplier_address'].' <br />
			        <b>Phone:</b> '.$order_data['supplier_phone'].'<br>
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

			          foreach ($imports_items as $k => $v) {

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
				              <th>Vat Charge </th>
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