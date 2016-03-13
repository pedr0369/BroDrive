<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container">

    <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 well sistema_login">
        
        <h3 class="text-center">Entre no sistema</h3>
        
        <?php if($this->session->flashdata('alerta')): ?>
        <p class="alert alert-success"><?= $this->session->flashdata('alerta'); ?></p>
        <?php endif; ?>        
        
        <?php
            echo form_open('Painel/login');
                echo form_label('Email', 'email');
                echo form_input(array(
                    "name" => "usuario",
                    "type" => "email",
                    "placeholder" => "Insira seu e-mail",
                    "class" => "form-control",
                    "required" => "required"
                ));
        
                echo form_label('Senha', 'senha');
                echo form_password(array(
                    "name" => "senha",
                    "placeholder" => "Insira sua senha",
                    "class" => "form-control",
                    "required" => "required"
                ));
                
                echo "<br>" . anchor('Sistema/cadastro', 'Cadastre-se ');
        
                echo form_submit(array(
                    "name" => "logar",
                    "class" => "btn btn-success pull-right"
                ), "Login");
        
            echo form_close();
        ?>
        
    </div>
    
</div>

<?php $this->load->view('includes/footer'); ?>