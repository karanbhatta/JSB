	<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Bank extends Admin_Controller 
	{
		public function __construct()
		{
			parent::__construct();

			$this->not_logged_in();
			$this->load->library('Pdf_report');
			$this->data['page_title'] = 'Orders';

			$this->load->model('model_bank');
			// $this->load->model('model_products');
			$this->load->model('model_company');
		}

		/* 
		* It only redirects to the manage order page
		*/
		public function index()
		{
			if(!in_array('viewBank', $this->permission)) {
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
			$this->data['page_title'] = 'Manage Bank';
			$this->render_template('bank/index', $this->data);		
		}

		/*
		* Fetches the orders data from the orders table 
		* this function is called from the datatable ajax function
		*/
		public function fetchBankData()
		{
			$result = array('data' => array());

			$data = $this->model_bank->getBankData();

			foreach ($data as $key => $value) {

				$count_total_item = $this->model_bank->countBankItem($value['id']);
				$date = date('d-m-Y', $value['date']);
				$time = date('h:i a', $value['date']);

				$date_time = $date . ' ' . $time;

				// button
				$buttons = '';

				if(in_array('viewBank', $this->permission)) {
					$buttons .= '<a target="__blank" href="'.base_url('Bank/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
				}

				if(in_array('updateBank', $this->permission)) {
					$buttons .= ' <a href="'.base_url('Bank/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
				}

				if(in_array('deleteBank', $this->permission)) {
					$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
				}

				if($value['transaction_type'] == 1) {
					$transaction_type = '<span class="label label-success">Deposited</span>';	
				}
				elseif ($value['transaction_type'] == 2) {
				 
					$transaction_type = '<span class="label label-warning">Withdraw</span>';
				}

				$result['data'][$key] = array(
					$value['bank_name'],
					$value['ac_name'],
					$value['cheque_no'],
					$value['account_no'],
					$date_time,
					// $count_total_item,
					$value['amount'],
					$value['deposited_by'],
					$transaction_type,
					
					// $paid_status,
					
					
					
					
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
			if(!in_array('createBank', $this->permission)) {
	            redirect('dashboard', 'refresh');
	        }

			$this->data['page_title'] = 'Add Bank Transaction';

					$this->form_validation->set_rules('bank_name', 'Bank', 'trim|required');

		
	        if ($this->form_validation->run() == TRUE) {        	
	        	
	        	$id = $this->model_bank->create();
	        	
	        	if($id) {
	        		$this->session->set_flashdata('success', 'Successfully created');
	        		redirect('Bank/update/'.$id, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('Bank/create/', 'refresh');
	        	}
	        }
	        else {
	            // false case
	        	$company = $this->model_company->getCompanyData(1);
	        	$this->data['company_data'] = $company;
	        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
	        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

	        	// $this->data['products'] = $this->model_products->getActiveProductData();      	
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
			

	            $this->render_template('bank/create', $this->data);
	        }	
		}

		/*
		* It gets the product id passed from the ajax method.
		* It checks retrieves the particular product data from the product id 
		* and return the data into the json format.
		*/
		public function getBankValueById()
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

		public function bankReport(){
			$data=$this->model_bank->getBankData();
			$data2=$this->model_bank->getBankReport();
			$t1="Total Deposited";
			$t2="Total Withdraw";

		$this->load->view('bank/report', ['data'=>$data, 'data2'=>$data2, 't1'=>$t1,'t2'=>$t2]);
		}


		public function update($id)
		{
			if(!in_array('updateBank', $this->permission)) {
	            redirect('dashboard', 'refresh');
	        }

			if(!$id) {
				redirect('dashboard', 'refresh');
			}

			$this->data['page_title'] = 'Update Bank';

			
				
	        if ($this->form_validation->run() == TRUE) {        	
	        	
	        	$update = $this->model_bank->update($id);
	        	
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('Bank/update/'.$id, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('Bank/update/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	        	$company = $this->model_company->getCompanyData(1);
	        	$this->data['company_data'] = $company;
	        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
	        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

	        	$result = array();
	        	$orders_data = $this->model_bank->getBankData($id);

	    		$result['order'] = $orders_data;
	    		// $imports_item = $this->model_bank->getBankItemData($orders_data['id']);

	    		// foreach($imports_item as $k => $v) {
	    		// 	$result['order_item'][] = $v;
	    		// }
	    		$this->data['order_data'] = $result;
	        	// $this->data['products'] = $this->model_products->getActiveProductData();      	
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
			

	            $this->render_template('bank/edit', $this->data);
	        }
		}

		/*
		* It removes the data from the database
		* and it returns the response into the json format
		*/
		public function remove()
		{
			if(!in_array('deleteBank', $this->permission)) {
	            redirect('dashboard', 'refresh');
	        }

			$id = $this->input->post('id');

	        $response = array();
	        if($id) {
	            $delete = $this->model_bank->remove($id);
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
			if(!in_array('viewBank', $this->permission)) {
	            redirect('dashboard', 'refresh');
	        }
	        
			if($id) {
				$order_data = $this->model_bank->getBankData($id);
				$company_info = $this->model_company->getCompanyData(1);

				$order_date = date('d/m/Y', $order_data['date']);
				$paid_status = ($order_data['transaction_type'] == 1) ? "Deposited" : "Withdraw";

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
				        
				        <b>Bank Name:</b> '.$order_data['bank_name'].'<br>
				        <b>Account Holder Name:</b> '.$order_data['ac_name'].'<br>
				        <b>Cheque Number:</b> '.$order_data['cheque_no'].' <br />
				        <b>Account Number:</b> '.$order_data['account_no'].'<br>

				        <b>Amount:</b> '.$order_data['amount'].'<br>
				        <b>Deposited/Withdrawn By:</b> '.$order_data['deposited_by'].'<br>
				        <b>Cheque Number:</b> '.$order_data['cheque_no'].' <br />
				        <b>Account Number:</b> '.$order_data['account_no'].'<br>
				      </div>
				      <!-- /.col -->
				    </div>
				    <!-- /.row -->

				   
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