<?php
class DotNetProject extends CI_Controller {

        public function view($page = 'dotnetProject')
        {
        	if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
 
                $this->load->helper('url');
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['headerImage'] = 'VS.jpg'; 

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }
}