<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller 
{	
	public function __construct()
	{
		parent::__construct(); 
		$this->data['page_title'] = 'Stores'; 
		$this->load->model('model_reports');
	}

	/* 
    * It redirects to the report page
    * and based on the year, all the orders data are fetch from the database.
    */
	public function index()
	{
		if(!in_array('viewReports', $this->permission)) {
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
		$today_year = date('Y-m-d');

		if($this->input->post('select_year')) {
			$today_year = $this->input->post('select_year'); 
		}

		$parking_data = $this->model_reports->getOrderData($today_year);
		$this->data['report_years'] = $this->model_reports->getOrderYear();
		
// $this->data['parking_data'] = $parking_data;

		// $final_parking_data = array();
		// foreach ($parking_data as $k => $v) { 
			
		// 	if(count($v) > 1) {
		// 		$total_amount_earned = array();
		// 		foreach ($v as $k2 => $v2) {
		// 			if($v2) {

		// 				$total_amount_earned[] = $v2['gross_amount'];						
		// 			}
		// 		}
		// 		$final_parking_data[$k] = array_sum($total_amount_earned);	
		// 	}
		// 	else {
		// 		$final_parking_data[$k] = 0;	
		// 	}
			
		// }
		
		$this->data['selected_year'] = $today_year;
		$this->data['company_currency'] = $this->company_currency();
		$this->data['results'] = $parking_data;

		$this->render_template('reports/index', $this->data);
	}
}	