<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Splits extends CI_Migration {

 public function up()
 {
  
           $this->load->dbforge();

           $this->dbforge->add_field(array(
   'Id' => array(
    'type' => 'INT',
    'constraint' => 5,
    'unsigned' => TRUE,
    'auto_increment' => TRUE
   ),
   'slat' => array(
    'type' => 'DOUBLE',
    'null' => TRUE,
   ),
   'slng' => array(
    'type' => 'DOUBLE',
    'null' => TRUE,
   ),  
   'timestamp' => array(
    'type' => 'INT',
    'null' => TRUE,
   ),
  ));

             $this->dbforge->add_key('Id', TRUE);  
             $this->dbforge->create_table('Splits');
 }

 public function down()
 {
           $this->load->dbforge();  
           $this->dbforge->drop_table('Splits');
 }

  }
?>