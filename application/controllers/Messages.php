<?php
class Messages extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('messages_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['messages'] = $this->messages_model->get_messages();
                $data['title'] = 'Message archive';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('messages/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['message_item'] = $this->messages_model->get_messages($slug);

                if (empty($data['message_item']))
                {
                        show_404();
                }

                $data['title'] = $data['message_item']['subject'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/drilldownMenu', $data);
                $this->load->view('messages/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
{
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Contact';

                $this->form_validation->set_rules('subject', 'Subject', 'required');
                $this->form_validation->set_rules('text', 'Text', 'required');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/drilldownMenu', $data);
                        $this->load->view('messages/create');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->messages_model->set_messages();
                        $this->load->view('messages/success');
                }
        }



       public function recaptcha($str='')
        {
          $google_url="https://www.google.com/recaptcha/api/siteverify";
          $secret='6LdZqAoUAAAAAIlxb_sBXmxmB8fDcGe5ZoMtntg6';
          $ip=$_SERVER['REMOTE_ADDR'];
          $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_TIMEOUT, 10);
          curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
          $res = curl_exec($curl);
          curl_close($curl);
          $res= json_decode($res, true);
          //reCaptcha success check
          if($res['success'])
          {
            return TRUE;
          }
          else
          {
            $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
            return FALSE;
          }
        }
}