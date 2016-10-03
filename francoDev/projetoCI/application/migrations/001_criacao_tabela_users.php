<?php
class Migration_Criacao_tabela_users extends CI_Migration {
    
    public function up(){
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'auto_increment' => true),
            'cod' => array('type' => 'INT'),
            'email' => array('type' => 'varchar(100)'),
            'password' => array('type' => 'varchar(50)'),
            'avatar' => array('type' => 'int'),
            'permission' => array('type' => 'bit'),
            'admin' => array('type' => 'bit'),
            'dt_create' => array('type' => 'date')
        ));    
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users');    
    }
    
    public function down(){
        $this->dbforge->drop_tabe('users');
    }
    
}