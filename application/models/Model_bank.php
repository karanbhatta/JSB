<?php 

class Model_bank extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
	public function getBankData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM bank_transaction WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM bank_transaction ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

		public function getBankReport($id = null)
	{
		

		$sql = "SELECT sum(amount) as amountt from bank_transaction GROUP BY transaction_type";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	public function getSuppliersItemData($import_id = null)
	{
		if(!$import_id) {
			return false;
		}

		$sql = "SELECT * FROM imports_item WHERE import_id = ?";
		$query = $this->db->query($sql, array($import_id));
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		// $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bank_name' => $this->input->post('bank_name'),
    		'ac_name' => $this->input->post('cheque_name'),
    		'account_no' => $this->input->post('account_no'),
    		'cheque_no' => $this->input->post('cheque_no'),
    		'date' => strtotime(date('Y-m-d h:i:s a')),
    		'amount' => $this->input->post('amount'),
    		'transaction_type' => $this->input->post('transaction_type'),

    		// bank
    		
    		'deposited_by' => $this->input->post('deposited_by'),

    		
    	);

		$insert = $this->db->insert('bank_transaction', $data);
		$import_id = $this->db->insert_id();

		

		return ($import_id) ? $import_id : false;
	}

	public function countBankItem($import_id)
	{
		if($import_id) {
			$sql = "SELECT * FROM bank_transaction WHERE id = ?";
			$query = $this->db->query($sql, array($import_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
				'bank_name' => $this->input->post('bank_name'),
    		'ac_name' => $this->input->post('ac_name'),
    		'account_no' => $this->input->post('account_no'),
    		'cheque_no' => $this->input->post('cheque_no'),
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'amount' => $this->input->post('amount'),
    		'transaction_type' => $this->input->post('transaction_type'),
    		'paid_amount' => $this->input->post('paid_amount'),

    		// bank
    		
    		'deposited_by' => $this->input->post('deposited_by'),
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('bank_transaction', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			

			return true;
		}
	}



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id); 
			$delete = $this->db->delete('bank_transaction');

		
			return ($delete == true) ? true : false;
		} 
	}

	

}