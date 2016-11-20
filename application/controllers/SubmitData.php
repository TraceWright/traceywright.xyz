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

		else

		{
		echo 'data_transfer_failed';
		}

		//print_r (json_decode ($locationData));
	}


}