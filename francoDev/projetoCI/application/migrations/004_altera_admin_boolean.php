<?php
class Migration_Altera_admin_boolean extends CI_Migration {
    
    public function up(){
        $this->dbforge->modify_column('users', array(
            'admin' => array('type' => 'boolean', 'default' => '0'),
        ));   
    }
    
    public function down(){
        $this->dbforge->modify_column('users', array(
            'admin' => array('type' => 'bit', 'default' => '0'),
        ));
    }
    
}