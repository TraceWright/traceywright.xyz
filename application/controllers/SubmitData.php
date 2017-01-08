<?php
class SubmitData extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('Locations_model');
        }

	public function getjson() 
	{
		//$locationData = $this->input->post('data');

		$locationData = file_get_contents('php://input');

		$locationDecoded = json_decode($locationData);

		$success = $this->Locations_model->insertData($locationDecoded);

		if ($success == true) {

			echo 'data_received';	
		}
		else if ($success == false) 
		{
			echo 'data_transfer_failed';
		}
		else {

			echo 'unknown_error';
		}

		//print_r (json_decode ($locationData));
	}

	public function testData() 
	{
		//$locationData = $this->input->post('data');

		$locationData = file_get_contents('php://input');

		$file = '/tmp/testData.txt';
		file_put_contents($file, $locationData);
		
		echo 'data_transfer_failed';	

	}


}