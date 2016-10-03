<?php
class Migration_Inclui_coluna_id_users extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_column('file', array(
            'id_user' => array(
            	'type' => 'int(11)',
            ),
        ));   
    }
    
    public function down(){
        $this->dbforge->drop_column('file', 'id_user');
    }
    
}