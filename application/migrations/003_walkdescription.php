<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Walkdescription extends CI_Migration {

 public function up()
 {
  
           $this->load->dbforge();

           $this->dbforge->add_field(array(
   'sepflagid' => array(
    'type' => 'INT',
    'constraint' => 5,
    'unsigned' => TRUE,
   ),
   'walkdescription' => array(
    'type' => 'VARCHAR',
    'constraint' => 256,
    'null' => TRUE,
   ),
   'display' => array(
    'type' => 'TINYINT',
    'default' => '1',
    'constraint' => 1,
   ),
  ));

             $this->dbforge->add_key('sepflagid', TRUE);  
             $this->dbforge->create_table('walkdescription');
 }

 public function down()
 {
           $this->load->dbforge();  
           $this->dbforge->drop_table('walkdescription');
 }

  }
?>