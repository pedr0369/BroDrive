<?php
class Migration_Altera_cod_varchar extends CI_Migration {
    
    public function up(){
        $this->dbforge->modify_column('users', array(
            'cod' => array('type' => 'varchar(11)'),
        ));   
    }
    
    public function down(){
        $this->dbforge->modify_column('users', array(
            'cod' => array('type' => 'int', 'default' => '0'),
        ));
    }
    
}