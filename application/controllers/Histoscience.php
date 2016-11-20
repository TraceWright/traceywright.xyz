<?php
class Histoscience extends CI_Controller {

        public function view($page = 'histoscience')
        {
        	if ( ! file_exists(APPPATH.'views/professionalHistory/'.$page.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                        }
 
                $this->load->helper('url');
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['headerImage'] = 'bcc.jpg';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('professionalHistory/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }
}