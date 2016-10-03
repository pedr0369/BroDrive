<div class="row-fluid">
	<div class="col-sm-4 col-sm-offset-4">
        <div class="bg_bro">
			<?php if($this->session->flashdata("danger")): ?>
				<div class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></div>
			<?php endif; ?>
			
			<?php if($this->session->flashdata("info")): ?>
				<div class="alert alert-info"><?= $this->session->flashdata("info"); ?></div>
			<?php endif; ?>
            
            <?php
                if($this->session->flashdata("email")){
                    $email = $this->session->flashdata('email');
                }else{
                    $email = "";
                }
            ?>
		
			<h4 class="text-center tit_box">Login</h4><br>
			<?php 
				echo form_open('Painel/login');
				
					echo form_label("Email", "email");
					echo form_input(array(
						"name" => "email",
						"class" => "form-control",
						"id" => "email",
						"required" => "required",
						"type" => "email",
                        "value" => $email
					));
					
					echo form_label("Senha", "senha");
					echo form_password(array(
						"name" => "senha",
						"class" => "form-control",
						"id" => "senha",
						"required" => "required",
					));
					
					echo form_button(array(
						"class" => "btn pull-right",
						"content" => "Entrar",
						"type" => "submit",
						"style" => "margin-bottom: 40px; margin-top: 5px;"
					));
					
				echo form_close();
				
				echo anchor("login/cadastro", "Ainda não é membro? Clique aqui.", 'class="link_bg"');
			?>
        <br><br>
        </div>		
	</div>
</div>