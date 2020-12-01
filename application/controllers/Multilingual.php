<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class Multilingual extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$language = '';
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'np') {
				$this->lang->load('locale', 'nepali');
			} else {
				$this->lang->load('locale', 'english');
			}
		} else {
			$this->lang->load('locale', 'english');
		}
		
		$data['language'] = $language == '' ? 'en' : $language;
		
		$this->load->view('dashboard', $data);
	}
}