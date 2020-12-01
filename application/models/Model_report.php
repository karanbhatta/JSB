<?php 

class Model_report extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getReport($sd, $ed){
	$sql = "SELECT * FROM orders WHERE date_time  BETWEEN ? AND ?";
			$query = $this->db->query($sql, array($sd,$ed));

		$result = $query->result_array();
		// $return_data = array_unique($return_data);

		return $result;
	}

	public function getReport2($sd, $ed){
	$sql = "SELECT * FROM imports WHERE date_time  BETWEEN ? AND ?";
			$query = $this->db->query($sql, array($sd,$ed));
		// $return_data = array_unique($return_data);

		return $result;
	}

	public function getDailyReport(){
	$sql = "SELECT * FROM orders WHERE date_time=strtotime(date('Y-m-d h:i:s a'))";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		
		// $return_data = array_unique($return_data);

		return $result;
	}
	public function getMonthlyReport(){
	$sql = "SELECT * FROM orders ";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		
		// $return_data = array_unique($return_data);

		return $result;
	}
}