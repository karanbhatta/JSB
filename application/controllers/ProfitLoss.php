<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfitLoss extends Admin_Controller 
{
	public function __construct()
	{ 
		parent::__construct();
 
		$this->not_logged_in();

		$this->data['page_title'] = 'Profit Loss';
				$this->load->library('Pdf_report');

		$this->load->model('model_orders');
		$this->load->model('model_walk_sales');
		$this->load->model('model_sales');
		$this->load->model('model_company');
	}

	/* 
	* It only redirects to the manage order page
	*/

public function index()
	{
		 $sd=strtotime($this->input->post('sd'));

			 $ed=strtotime($this->input->post('ed'));

		$this->data['total_sale'] = $this->model_sales->countTotalSales($sd, $ed);
		$this->data['total_purchase'] = $this->model_sales->countTotalSales($sd, $ed);
	$this->data['total_walk_sale'] = $this->model_walk_sales->countTotalWalkSales($sd, $ed);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;



	// $result = array('data' => array());
	 $this->data['chart_data'] = $this->model_orders->todaySale();
	 
	  // echo "<pre>";
	  // print_r($data1);
	  // echo "</pre>"; die;
      // = $data;
      // $this->load->view('dashboard',$data);
            // $this->load->view('dashboard');
	 // language
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
		

	// end language

		$this->render_template('profit_loss/index', $this->data);
	}



}