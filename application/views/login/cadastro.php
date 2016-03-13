<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container">

    <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 well sistema_login">
        
        <h3 class="text-center">Cadastre-se</h3>
        
        <?php if($this->session->flashdata('alerta')): ?>
        	<p class="alert alert-danger"><?= $this->session->flashdata('alerta'); ?></p>
        <?php endif; ?>
        
        <?php
            echo form_open('sistema/confirm_cadastro', array('onsubmit' => 'return formulario()', 'name' => 'cadastro'));
                echo form_label('Nome', 'nome');
                echo form_input(array(
                    "name" => "nome",
                    "type" => "text",
                    "id" => "nome",
                    "placeholder" => "Insira seu nome",
                    "class" => "form-control",
                    "required" => "required"
                ));
        
                echo form_label('Email', 'email');
                echo form_input(array(
                    "name" => "email",
                    "type" => "email",
                    "id" => "email",
                    "placeholder" => "Insira seu email",
                    "class" => "form-control",
                    "required" => "required"
                ));
                
                echo form_label('Senha', 'senha');
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "placeholder" => "Insira sua senha",
                    "class" => "form-control",
                    "required" => "required"
                ));
        
                echo form_label('Repita a Senha', 'r_senha');
                echo form_password(array(
                    "name" => "r_senha",
                    "id" => "r_senha",
                    "placeholder" => "Repita a senha",
                    "class" => "form-control",
                    "required" => "required"
                ));
        
                echo form_label('Celular', 'cel');
                echo form_input(array(
                    "name" => "cel",
                    "id" => "cel",
                    "placeholder" => "Insira o número do seu celular com ddd",
                    "class" => "form-control",
                    "required" => "required"
                ));
                
                echo "<br> *** Você receberá um e-mail quando sua conta for ativada, daí poderá usufruir do sistema.<br><br>";
                
                echo form_submit(array(
                    "name" => "logar",
                    "class" => "btn btn-success pull-right btn-block"
                ), "Cadastrar");
        
            echo form_close();
        ?>
        
    </div>
    
</div>

<?php $this->load->view('includes/footer'); ?>
