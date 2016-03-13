<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 well sistema_login">

<h3 class="text-center">Entre em contato</h3>
        
        <?php if($this->session->flashdata('alerta')): ?>
        	<p class="alert alert-success"><?= $this->session->flashdata('alerta'); ?></p>
        <?php endif; ?>
        
        <?php
        
            echo form_open('sistema/envia_contato', array('onsubmit' => 'return formulario()', 'name' => 'contato'));
                echo form_label('Assunto', 'assunto');
                echo form_input(array(
                    "name" => "assunto",
                    "type" => "text",
                    "id" => "asunto",
                    "placeholder" => "Qual o assunto",
                    "class" => "form-control",
                    "required" => "required"
                ));
        
                echo form_label('Mensagem', 'mensagem');
                echo form_textarea(array(
                    "name" => "mensagem",
                    "id" => "mensagem",
                    "placeholder" => "Insira a mensagem",
                    "class" => "form-control",
                    "required" => "required"
                ));
                
                echo form_submit(array(
                    "name" => "enviar",
                    "class" => "btn btn-success pull-right btn-block"
                ), "Enviar");
        
            echo form_close();
        ?>

</div>

<?php $this->load->view('includes/footer'); ?>