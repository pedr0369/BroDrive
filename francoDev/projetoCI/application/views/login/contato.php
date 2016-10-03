<div class="row-fluid">

	<ol class="breadcrumb">
	  <li><?= anchor('login/index', 'Página Inicial') ?></li>
	  <li class="active">Contato</li>
	</ol>

	<div class="col-sm-6 col-sm-offset-3 bg_box">
		<div style="margin-top: 20px;" class="bg_bro">
			<h4 class="text-center tit_box">Entre em contato</h4><br>
			
			<?php if($this->session->flashdata("danger")): ?>
				<div class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></div>
			<?php endif; ?>
			
			<?php 
			
				if(isset($email)){ $email = $email; }
				else{ $email = ""; }
			
				echo form_open("Login/envia_contato", array('name' => 'cadastro'));
					
					echo form_label("Email", "email");
					echo form_input(array(
						"name" => "email",
						"value" => $email,
						"type" => "text",
						"type" => "email",
						"class" => "form-control",
						"required" => "required",	
					));
					
					echo form_label("Assunto", "assunto");
					echo form_input(array(
						"name" => "assunto",
						"class" => "form-control",
						"id" => "assunto",
						"required" => "required",
						"type" => "text"
					));
					
					echo form_label("Mensagem", "mensagem");
					echo form_textarea(array(
						"name" => "mensagem",
						"class" => "form-control",
						"id" => "mensagem",
						"required", "required"
					));
					
					echo "<br>" . form_button(array(
						"class" => "btn btn-block",
						"content" => "Cadastrar",
						"type" => "submit"
					)) . "<br>";
					
				echo form_close();
			?>
		</div>
		
	</div>

</div>