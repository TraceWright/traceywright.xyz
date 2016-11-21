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

        $time1 = 0;
        $time2 = 0;

        $lat1 = 0;
        $lng1 = 0;

        $velocityArray = array();

        foreach ($data['locationData'] as $key => $item)

        { 
            if ($lat1 == 0){

                $time1 = $item->timestamp;

                $lat1 = $item->lat;
                $lng1 = $item->lng;

                $counter = 0;
                $incrementTime = 0;
                $incrementDist = 0;
                continue;
            } 
               
            //calculates distance

            $distance = $this->haversineGreatCircleDistance($lat1, $lng1, $item->lat, $item->lng);  

            $lat1 = $item->lat;
            $lng1 = $item->lng;

            $time2 = $item->timestamp;

            $totaldist += $distance;  /* kilometers */

            //calculates time

            $totalseconds = $time2 - $time1;
            $totalhours = $totalseconds / 3600;

            //calculates average speed

            $averageSpeed = $totaldist / $totalhours;

            

            //collect time and distance into 60 second increments

            $incrementDist += $distance;

            $counter ++;

            if ($counter == 6) {

            //put time and distance into 2d key:value array for graph i.e. x:distance, y:totalseconds
            
            array_push($velocityArray, array('x'=>round(($totalseconds / 60), 0, PHP_ROUND_HALF_UP), 'y'=>round(($incrementDist * 1000), 1, PHP_ROUND_HALF_UP)));

            $incrementTime = 0;
            $incrementDist = 0;

            $counter = 0;

            }



        }

        $data['distance'] = round($totaldist, 2, PHP_ROUND_HALF_UP);
        $data['time'] = round($totalseconds / 60, 1, PHP_ROUND_HALF_UP);
        $data['velocityArray'] = $velocityArray;
        $data['averageSpeed'] = round($averageSpeed, 2, PHP_ROUND_HALF_UP);

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
