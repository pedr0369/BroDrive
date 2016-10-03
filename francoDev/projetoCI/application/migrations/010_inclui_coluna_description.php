<?php
class Migration_Inclui_coluna_description extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_column('file', array(
            'description' => array(
            	'type' => 'varchar(140)',
            ),
        ));   
    }
    
    public function down(){
        $this->dbforge->drop_column('file', 'description');
    }
    
}
