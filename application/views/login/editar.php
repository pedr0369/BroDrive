<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 well sistema_login">
    <?php echo form_open('sistema/editar', array('onsubmit' => 'return editDados()', 'name' => 'editar'));
                echo form_label('Nome', 'nome');
                echo form_input(array(
                    "name" => "nome",
                    "type" => "text",
                    "id" => "nome",
                    "value" => $nome,
                    "class" => "form-control",
                ));
        
                echo form_label('Celular', 'cel');
                echo form_input(array(
                    "name" => "cel",
                    "id" => "cel",
                    "value" => $cel,
                    "class" => "form-control"
                ));
                
                echo form_submit(array(
                    "name" => "editar",
                    "class" => "btn btn-success pull-right btn-block"
                ), "Editar");
                
                echo anchor('Sistema/edita_Senha', 'Modificar a senha');
        
            echo form_close(); ?>
</div>

<?php $this->load->view('includes/footer'); ?>