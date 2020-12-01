<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Vehicles';

		$this->load->model('model_vehicles');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		if(!in_array('viewVehicle', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_vehicles->getVehicleData();

		$this->data['results'] = $result;
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

						}		}
		
		$this->data['language'] = $language == '' ? 'en' : $language;

		$this->render_template('vehicle/index', $this->data);
	}

	/*
	* Fetches the brand data from the brand table 
	* this function is called from the datatable ajax function
	*/
	public function fetchVehiclesData()
	{
		$result = array('data' => array());

		$data = $this->model_vehicles->getVehicleData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('viewVehicle', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editVehicle('.$value['id'].')" data-toggle="modal" data-target="#editVehicleModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteVehicle', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeVehicle('.$value['id'].')" data-toggle="modal" data-target="#removeVehicleModal"><i class="fa fa-trash"></i></button>
				';
			}				

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['v_no'],
				$value['d_name'],
				$value['d_contact'],
				$value['cd_name'],
				$value['cd_contact'],
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
	public function fetchVehicleDataById($id)
	{
		if($id) {
			$data = $this->model_vehicles->getVehicleData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create()
	{

		if(!in_array('createVehicle', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('v_no', 'Vehicle no', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'v_no' => $this->input->post('v_no'),
        		'd_name' => $this->input->post('d_name'),
        		'd_contact' => $this->input->post('d_contact'),
        		'cd_name' => $this->input->post('cd_name'),
        		'cd_contact' => $this->input->post('cd_contact'),
        		'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_vehicles->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the vehicle information';			
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

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	
	public function updateVehicle($id)
	{
		if(!in_array('updateVehicle', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_vehicle_no', 'Vehicle No', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'v_no' => $this->input->post('edit_vehicle_no'),
        		'd_name' => $this->input->post('edit_driver_name'),
        		'd_contact' => $this->input->post('edit_driver_contact'),
        		'cd_name' => $this->input->post('edit_co_driver_name'),
        		'cd_contact' => $this->input->post('edit_co_driver_contact'),
        		'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_vehicles->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
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
	public function remove()
	{
		if(!in_array('deleteVehicle', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$vehicle_id = $this->input->post('vehicle_id');
		$response = array();
		if($vehicle_id) {
			$delete = $this->model_vehicles->remove($vehicle_id);

			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the vehicle information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}