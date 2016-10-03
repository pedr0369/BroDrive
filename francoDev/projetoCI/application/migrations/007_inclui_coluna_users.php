<?php
class Migration_Inclui_coluna_users extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_column('users', array(
            'id_categories' => array(
            	'type' => 'varchar(50)',
            ),
        ));   
    }
    
    public function down(){
        $this->dbforge->drop_column('users', 'id_categories');
    }
    
}