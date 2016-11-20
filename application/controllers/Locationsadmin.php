<?php
class Locationsadmin extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->model('Locations_model');
                $this->load->helper('url_helper');

        }

     // public function view($page = 'locationsadmin')
     //    {
     //    	if ( ! file_exists(APPPATH.'views/locationsadmin/'.$page.'.php'))
     //            {
     //                    // Whoops, we don't have a page for that!
     //                    show_404();
     //            }
 
     //            $data['title'] = ucfirst($page); // Capitalize the first letter
     //            $data['headerImage'] = 'data.jpg'; 
     //            // $data['messages'] = $this->messages_model->get_messages();

     //            $this->load->view('templates/header', $data);
     //            $this->load->view('templates/drilldownMenu', $data);
     //            $this->load->view('locationsadmin/'.$page, $data);
     //            $this->load->view('templates/footer', $data);
     //    }

        public function locations()
		{
				$modeldata = array();

			    $data['headerImage'] = 'data.jpg'; 
			   

			   

			    $this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('walkdescription', 'Walk Description', 'required');
			    $this->form_validation->set_rules('sepflagid', 'seppyflaggy', 'required');

			    if ($this->form_validation->run() === FALSE)
			    {
			        

			    }
			    else
			    {
			        $this->Locations_model->setLocationDescription();
			    }

			     //$modeldata is the variable that passes the data from the query to the view to be loaded (below) and idwalkdata is the variable to be used within the view. getIDwalk is the function called.
 					
 					$modeldata['idwalkdata'] = $this->Locations_model->getIDwalk();

			    	$this->load->view('templates/header', $data);
			        $this->load->view('templates/drilldownMenu', $data);
			        $this->load->view('locationsadmin/locationsadmin', $modeldata);
			        $this->load->view('templates/footer');
		}

		 public function update_display_flag ($sepflagid)
        {
            $page = 'locationsadmin';

            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['updateSuccess'] = $this->Locations_model->update_display($sepflagid);

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $data['headerImage'] = 'data.jpg'; 
            $modeldata['idwalkdata'] = $this->Locations_model->getIDwalk();

            $this->load->view('templates/header', $data);
			$this->load->view('templates/drilldownMenu', $data);
			$this->load->view('locationsadmin/locationsadmin', $modeldata);
			$this->load->view('templates/footer');
        }

}