<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Splits_addroutenumber extends CI_Migration {

  public function up()
  {
  
    $this->load->dbforge();

    $fields = array(

      'rnum' => array(
      'type' => 'INT',
      'constraint' => 5,
      'unsigned' => TRUE,
      'default' => 0,
      ),
     
    );
    $this->dbforge->add_column('Splits', $fields);

  }

  public function down()
  {
    $this->load->dbforge();  
    $this->dbforge->drop_column('Splits', 'rnum');
  }

}
?>