<?php
class Migration_Criacao_tabela_file extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'auto_increment' => true),
            'name' => array('type' => 'varchar(100)'),
            'extension' => array('type' => 'varchar(10)'),
            'id_categories' => array('type' => 'varchar(50)'),
            'description' => array('varchar' => '255'),
            'dt_create' => array('type' => 'date'),
            'dt_last_download' => array('type' => 'date'),
        ));    
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('file');    
    }
    
    public function down(){
        $this->dbforge->drop_tabe('file');
    }
    
}