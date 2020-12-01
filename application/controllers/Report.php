<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{	

	
	public function __construct()
	{
		parent::__construct(); 
				$this->load->library('Pdf_report');
			$this->load->model('Model_report');

		// $this->data['page_title'] = 'Reports';
	}

	/* 
    * It redirects to the report page
    * and based on the year, all the orders data are fetch from the database.
    */
	public function index()	{
		if(isset($_GET["sd"])){
		$sd = strtotime($_GET["sd"]);
	$ed = strtotime($_GET["ed"]);
}else {
	$sd = "";
	$ed = "";}

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
		$data=$this->Model_report->getReport($sd, $ed);
		$data2=$this->Model_report->getReport2($sd, $ed);
		$this->load->view('reports/report', ['data'=>$data, 'data2'=>$data2, 'customer_name'=>$customer_name]);
	}
}	