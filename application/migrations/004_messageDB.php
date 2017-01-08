<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_MessageDB extends CI_Migration {

 public function up()
 {
  
           $this->load->dbforge();

           $this->dbforge->add_field(array(
   'id' => array(
    'type' => 'INT',
    'constraint' => 5,
    'unsigned' => TRUE,
   ),
   'subject' => array(
    'type' => 'VARCHAR',
    'constraint' => 256,
    'null' => TRUE,
   ),
   'slug' => array(
    'type' => 'VARCHAR',
    'constraint' => 50,
    'null' => TRUE,
   ),
   'subject' => array(
    'text' => 'TEXT',
    'null' => TRUE,
   ),
   'name' => array(
    'type' => 'VARCHAR',
    'constraint' => 50,
    'null' => TRUE,
   ),
   'display' => array(
    'type' => 'TINYINT',
    'default' => '1',
    'constraint' => 1,
   ),
  ));

             $this->dbforge->add_key('id', TRUE);  
             $this->dbforge->create_table('messagesDB');
 }

 public function down()
 {
           $this->load->dbforge();  
           $this->dbforge->drop_table('messagesDB');
 }

  }
?>