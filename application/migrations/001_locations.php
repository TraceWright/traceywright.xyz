<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Locations extends CI_Migration {

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
   'lat' => array(
    'type' => 'DOUBLE',
    'null' => TRUE,
   ),
   'lng' => array(
    'type' => 'DOUBLE',
    'null' => TRUE,

   ),
   'alt' => array(
    'type' => 'INT',
    'null' => TRUE,
   ),
   'timestamp' => array(
    'type' => 'INT',
    'null' => TRUE,
   ),
   'sepflag' => array(
    'type' => 'INT',
    'default' => 0,
   ),
  ));

             $this->dbforge->add_key('Id', TRUE);  
             $this->dbforge->create_table('Locations');
 }

 public function down()
 {
           $this->load->dbforge();  
           $this->dbforge->drop_table('Locations');
 }

  }
?>