<?php
class Dbadmin extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->model('messages_model');
                $this->load->helper('url_helper');
        }

    public function view($page = 'dbadmin')
        {
        	if ( ! file_exists(APPPATH.'views/dbadmin/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
 
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['headerImage'] = 'data.jpg'; 
                $data['messages'] = $this->messages_model->get_messages();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('dbadmin/'.$page, $data);
                $this->load->view('templates/footer', $data);



        }

        //when delete button is clicked, pass in messageid, and send trigger to model to update display bool

        public function update_display_flag ($messageid)
        {
            $page = 'dbadmin';

            $data['updateSuccess'] = $this->messages_model->update_display($messageid);

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $data['headerImage'] = 'data.jpg'; 
            $data['messages'] = $this->messages_model->get_messages();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/drilldownMenu', $data);
            $this->load->view('dbadmin/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
}