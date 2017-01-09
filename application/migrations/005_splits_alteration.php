<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Splits_alteration extends CI_Migration {

  public function up()
  {
  
    $this->load->dbforge();

    $fields = array(

      'snum' => array(
      'type' => 'INT',
      'constraint' => 5,
      'unsigned' => TRUE,
      ),
     
    );
    $this->dbforge->add_column('Splits', $fields);
    $fields = array(
        'timestamp' => array(
                'name' => 'stimestamp',
                'type' => 'INT',
        ),
    );
    $this->dbforge->modify_column('Splits', $fields);

  }

  public function down()
  {
    $this->load->dbforge();  
    $this->dbforge->drop_column('Splits', 'snum');

     $fields = array(
        'stimestamp' => array(
                'name' => 'timestamp',
                'type' => 'INT',
        ),
    );
    $this->dbforge->modify_column('Splits', $fields);
  }

}
?>