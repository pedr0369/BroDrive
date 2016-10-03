<?php
class Migration_Inclui_coluna_file extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_column('file', array(
            'size' => array(
            	'type' => 'int(11)',
            ),
        ));   
    }
    
    public function down(){
        $this->dbforge->drop_column('file', 'size');
    }
    
}