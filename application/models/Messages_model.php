<?php
class Messages_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_messages($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('messagesDB');
            return $query->result_array();
        }

        $query = $this->db->get_where('messagesDB', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_messages()
    {
        $this->load->helper('url');

        // php sql query fetches the next autoincrement number from the table as 'nextNumber. 
        // nextNumber passes the autoincrement number to $autoInc
        // url_title is a CodeIgniter functions here to concatenate the autoincrement number with the subject, and saves this value to $slug

        $sql = "SELECT `AUTO_INCREMENT` AS `nextNumber` FROM `information_schema`.`TABLES` where `TABLE_NAME` = 'messagesDB'";
        $query = $this->db->query($sql);

        if($query->num_rows() == 1)
        {
            $autoInc = $query->row()->nextNumber;
            $slug = url_title($autoInc.$this->input->post('subject'), 'dash', TRUE);

            $data = array(
                'subject' => $this->input->post('subject'),
                'slug' => $slug,
                'text' => $this->input->post('text'),
                'name' => $this->input->post('name')
            );

            return $this->db->insert('messagesDB', $data);
        }
        else
            return FALSE;
    }

    public function update_display($messageid) {

        $data = array(
            'display' => FALSE,
        );

        $this->db->where('id', $messageid);
        return $this->db->update('messagesDB', $data);


    }

}