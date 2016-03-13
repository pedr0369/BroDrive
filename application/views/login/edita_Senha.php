<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 well sistema_login">

    <?php if($this->session->flashdata('alerta')): ?>
        <p class="alert alert-success"><?= $this->session->flashdata('alerta'); ?></p>
    <?php endif; ?>

    <?php echo form_open('sistema/altera_Senha', array('onsubmit' => 'return editarSenha()', 'name' => 'alter'));
                echo form_label('Senha atual', 'senha_atual');
                echo form_password(array(
                    "name" => "senha_atual",
                    "id" => "senha_atual",
                    "class" => "form-control",
                ));
        
                echo form_label('Nova Senha', 'senha');
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control"
                ));
                
                echo form_label('Repita a nova senha', 'rep_new_senha');
                echo form_password(array(
                    "name" => "rep_new_senha",
                    "id" => "rep_new_senha",
                    "class" => "form-control"
                ));
                
                echo form_submit(array(
                    "name" => "editar",
                    "class" => "btn btn-success pull-right btn-block"
                ), "Alterar senha");
        
            echo form_close(); ?>
</div>

<?php $this->load->view('includes/footer'); ?>