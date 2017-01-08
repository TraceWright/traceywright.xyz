<?php
class Splits extends CI_Controller {

        public function view($page = 'splits')
        {
                if ( ! file_exists(APPPATH.'views/maps/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $this->load->helper('url');
                $data['headerImage'] = 'running1.jpg';
                $data['title'] = ucfirst($page); // Capitalize the first letter

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('maps/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }
}