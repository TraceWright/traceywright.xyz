<?php
class Locations_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insertData($JSONArray)
    {
    	//SubmitData is the controller for this method
    	//print_r($JSONArray);

    	$data = array();

    	foreach ($JSONArray->data as $sflag => $array) 
    	{
    		foreach ($array as $name => $value) {  

	    		$insertJSON = array(
	    			'lat' => $value->lat,
	    			'lng' => $value->lng,
	    			'alt' => $value->alt,
	    			'timestamp' => $value->timestamp,
	    			'sepflag' => $sflag
	    			);

	    		//print_r($value);
	    		array_push($data, $insertJSON);
	    		
	    	}
		} 

		$spdata = $JSONArray->spdata;   

		$this->db->insert_batch('Splits', $spdata);

		$arraycount = count($data);

		$this->db->insert_batch('Locations', $data);

		return ($this->db->affected_rows() != $arraycount) ? false : true;
	}

	public function getSplits($sepFlag)
	{
		$this->db->where('sepflag', $sepFlag);
		$this->db->select('snum, stimestamp');
		$query = $this->db->get('Splits');

		return $query->result();
	}

	public function getUniqueSep()
	{
		$this->db->distinct();
		$this->db->select('sepflag');
		$query = $this->db->get('Locations');

		return $query->result();
	}

	public function getLocations($sepFlag)
	{
		$this->db->where('sepflag', $sepFlag);
		$query = $this->db->get('Locations');
		return $query->result();
	}

	public function getWalkDescription($sepFlagId)
	{
		$this->db->where('sepflagid', $sepFlagId);
		$query = $this->db->get('walkdescription');
		$data = $query->result();
		return $data[0]->walkdescription;
	}

	public function getIDwalk()
	{
		$sql = 'SELECT DISTINCT (L.sepflag), W.walkdescription, min(L.timestamp) AS timestamp FROM `Locations` L LEFT JOIN `walkdescription` W ON L.sepflag = W.sepflagid GROUP BY L.sepflag';
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function setLocationDescription()
	{
		


		$data = array(
                'sepflagid' => $this->input->post('sepflagid'),
                'walkdescription' => $this->input->post('walkdescription'),
            );

		$sql = $this->db->insert_string('walkdescription', $data) . ' ON DUPLICATE KEY UPDATE walkdescription=VALUES(walkdescription)';
		$query = $this->db->query($sql);

          //  return $this->db->insert('walkdescription', $data);

		return $this->db->insert_id();
	}

	public function getIDandWalkDescription()
	{

		$sql = 'SELECT (W.sepflagid), W.walkdescription, min(L.timestamp) AS timestamp FROM `Locations` L LEFT JOIN `walkdescription` W ON L.sepflag = W.sepflagid WHERE W.display = 1 GROUP BY L.sepflag';

		$query = $this->db->query($sql);
		return $query->result();
	}


	 public function update_display($sepflagid) {

        $data = array(
            'display' => FALSE,
        );

        $this->db->where('sepflagid', $sepflagid);
        return $this->db->update('walkdescription', $data);


    }

}


?>