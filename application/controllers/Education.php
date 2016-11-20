<?php
class Education extends CI_Controller {

        public function view($page = 'educationQUT')
        {
        	if ( ! file_exists(APPPATH.'views/education/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
 
                $this->load->helper('url');
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['headerImage'] = 'SydneyUniversity.jpg'; 

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('education/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }
}