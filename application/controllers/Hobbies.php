<?php
class Hobbies extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
        }

        public function gardening($page = 'gardening')
        {

                if ( ! file_exists(APPPATH.'views/hobbies/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['headerImage'] = 'garden/gardeningbackground.jpg';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('hobbies/gardening', $data);
                $this->load->view('templates/footer');
        }

        public function xml($page = 'gardeningXML')
        {
                header('Content-type: text/xml');
                $this->load->view("hobbies/$page");
        }      

         public function view($page = 'infotech')
        {
                if ( ! file_exists(APPPATH.'views/hobbies/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $this->load->helper('url');
                $data['headerImage'] = 'infotech.jpg';
                $data['title'] = ucfirst($page); // Capitalize the first letter

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('hobbies/'.$page, $data);
                $this->load->view('templates/footer', $data);

        }

}