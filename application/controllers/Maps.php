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
        $data['headerImage'] = 'running1.jpg'; 
        $data['locationData'] = $this->Locations_model->getLocations($sepFlag);
        $data['walkDescription'] = $this->Locations_model->getWalkDescription($sepFlag);
        $data['arraysplits'] = $this->Locations_model->getSplits($sepFlag);
        $splitsdatarnum = $this->Locations_model->getSplitsRnum($sepFlag);


        if (sizeof($splitsdatarnum) > 0) 
        {
            $data['routeNumber'] = $splitsdatarnum[0]->rnum;
        }
        else
        {
            $data['routeNumber'] = 0;   
        }


        $totaldist = 0;

        $time1 = 0;
        $time2 = 0;

        $lat1 = 0;
        $lng1 = 0;
        $altitude = 0;

        $velocityArray = array('x'=>array(), 'y'=>array(), 'z'=>array());
        //$altitudeArray = array('altavg'=>$altavg);

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
            $altitude += $item->alt;

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

                $altavg = $altitude / 6;

            //put time and distance into 2d key:value array for graph i.e. x:distance, y:totalseconds
            
            array_push($velocityArray['x'], round(($totalseconds / 60), 0, PHP_ROUND_HALF_UP));
            array_push($velocityArray['y'], round(($incrementDist * 1000), 1, PHP_ROUND_HALF_UP));
            array_push($velocityArray['z'], $altavg);

            $incrementTime = 0;
            $incrementDist = 0;
            $altitude = 0;

            $counter = 0;

            }



        }

        if (count($velocityArray['z']) > 0) 
        {
            $elevation = ( max($velocityArray['z'])) - (min($velocityArray['z']));
        }
        else 
        {
            $elevation = 0;
        }

        $data['distance'] = round($totaldist, 2, PHP_ROUND_HALF_UP);
        $data['time'] = round($totalseconds / 60, 1, PHP_ROUND_HALF_UP);
        $data['velocityArray'] = $velocityArray;
        $data['averageSpeed'] = round($averageSpeed, 2, PHP_ROUND_HALF_UP);
        $data['elevation'] = round($elevation, 1, PHP_ROUND_HALF_UP);

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
        $data['headerImage'] = 'running1.jpg'; 
        //$data['sepFlags'] = $this->Locations_model->getUniqueSep();
        $modeldata['idwalksdata'] = $this->Locations_model->getIDandWalkDescription();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/drilldownMenu', $data);
        $this->load->view('maps/'.$page, $modeldata);
        $this->load->view('templates/footer', $data);

    }


}

?>
