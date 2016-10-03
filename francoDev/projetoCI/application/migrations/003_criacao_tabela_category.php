<?php
class Migration_Criacao_tabela_category extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'auto_increment' => true),
            'name' => array('type' => 'varchar(100)'),
        ));    
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('category');    
    }
    
    public function down(){
        $this->dbforge->drop_tabe('category');
    }
    
}