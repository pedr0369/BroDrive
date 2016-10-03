<?php
class Migration_Altera_permission_boolean extends CI_Migration {
    
    public function up(){
        $this->dbforge->modify_column('users', array(
            'permission' => array('type' => 'boolean', 'default' => '0'),
        ));   
    }
    
    public function down(){
        $this->dbforge->modify_column('users', array(
            'permission' => array('type' => 'bit', 'default' => '0'),
        ));
    }
    
}