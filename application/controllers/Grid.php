<?php
class Grid extends CI_Controller {

        public function view($page = 'grid')
        {
        	if ( ! file_exists(APPPATH.'views/grid/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
 
                $this->load->helper('url');
                $data['title'] = ucfirst($page); // Capitalize the first letter
                
                $this->load->view('grid/'.$page, $data);

        }
}