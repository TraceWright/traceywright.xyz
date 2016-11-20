<?php
class Nails extends CI_Controller {

        public function view($page = 'nails')
        {
                if ( ! file_exists(APPPATH.'views/nails/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $this->load->helper('url');
                $data['headerImage'] = 'painting.jpg';
                $data['title'] = ucfirst($page); // Capitalize the first letter

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('nails/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }
}