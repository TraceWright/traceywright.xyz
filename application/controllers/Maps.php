<?php
class Maps extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Locations_model');
    }

     public function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
        
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;

    }

	public function view($sepFlag, $page = 'maps')
    {
	 	if ( ! file_exists(APPPATH.'views/maps/'.$page.'.php'))
        {
            
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['locationData'] = $this->Locations_model->getLocations($sepFlag);
        $data['walkDescription'] = $this->Locations_model->getWalkDescription($sepFlag);

        $totaldist = 0;

        $lat1 = 0;
        $lng1 = 0;

        foreach ($data['locationData'] as $key => $item)

        { 
            if ($lat1 == 0){

                $lat1 = $item->lat;
                $lng1 = $item->lng;
                continue;
            } 
               

            $distance = $this->haversineGreatCircleDistance($lat1, $lng1, $item->lat, $item->lng);
                
            $lat1 = $item->lat;
            $lng1 = $item->lng;

            $totaldist += $distance;

        }

        $data['distance'] = round($totaldist, 2, PHP_ROUND_HALF_UP);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/drilldownMenu', $data);
        $this->load->view('maps/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }

       

    public function show($page = 'showincrements')
    {
        // $sepflagid = 'sepflagid';
        // $walkdescription = 'walkdescription';

        $modeldata = array();                          

        if ( ! file_exists(APPPATH.'views/maps/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page);
        //$data['sepFlags'] = $this->Locations_model->getUniqueSep();
        $modeldata['idwalksdata'] = $this->Locations_model->getIDandWalkDescription();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/drilldownMenu', $data);
        $this->load->view('maps/'.$page, $modeldata);
        $this->load->view('templates/footer', $data);

    }


}

?>
