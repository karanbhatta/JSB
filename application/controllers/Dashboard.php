<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_sales');
		$this->load->model('model_users');
		$this->load->model('model_stores');
		$this->load->model('model_walk_sales');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		$this->data['total_products'] = $this->model_products->countTotalProducts();
		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		$this->data['total_stores'] = $this->model_stores->countTotalStores();
		$this->data['total_sale'] = $this->model_sales->countTotalSales();
		$this->data['total_purchase'] = $this->model_sales->countTotalPurchases();
		$this->data['total_walk_sale'] = $this->model_walk_sales->countTotalWalkSales();

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

		$this->render_template('dashboard', $this->data);
	}
}