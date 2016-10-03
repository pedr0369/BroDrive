<div class="row-fluid">

	<ol class="breadcrumb">
	  <li><?= anchor('login/index', 'Página Inicial') ?></li>
	  <li class="active">Cadastro</li>
	</ol>

	<div class="col-sm-8 col-sm-offset-2">
		<div style="margin-top: 20px;" class="bg_bro">
			<h4 class="text-center tit_box">Cadastre-se</h4><br>
			
			<?php if($this->session->flashdata("danger")): ?>
				<div class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></div>
			<?php endif; ?>
			
			<?php 
				echo form_open("Login/confirm_cadastro", array('onsubmit' => 'return formulario()', 'name' => 'cadastro'));
            ?>
            <div class="col-sm-6">
                <?php
					echo form_label("Email", "email");
					echo form_input(array(
						"name" => "email",
						"class" => "form-control",
						"id" => "email",
						"required" => "required",
						"type" => "email"
					));
					
					echo form_label("Código de ativação (Não obrigatório)", "cod");
					echo form_input(array(
						"name" => "cod",
						"class" => "form-control",
						"id" => "cod",
						"type" => "text"
					));
					
					echo form_label("Senha", "password");
					echo form_password(array(
						"name" => "password",
						"class" => "form-control",
						"id" => "senha",
						"required" => "required",
					));
					
					echo form_label("Repita a senha", "r_senha");
					echo form_password(array(
						"name" => "r_senha",
						"class" => "form-control",
						"id" => "r_senha",
						"required" => "required",
					));
                ?>
            <br><br></div>
            <div class="col-sm-6">
                <?php
					echo '<br>' . form_label("Escolha seu avatar", "avatar") . "<br>";
					for($i = 1; $i <= 8; $i++){
						echo "<div class='avatar'>";
						echo form_radio(array(
							'name' => 'avatar',
							'id' => 'avatar',
							'value' => $i,
							'required' => 'required'
						));
						echo "<img src='" . base_url() . "img/avatar/{$i}.png'>";
						echo "</div>";
					}
                ?>
            </div>
            <?php
					echo "<br>" . form_button(array(
						"class" => "btn btn-block",
						"content" => "Cadastrar",
						"type" => "submit"
					));
					
				echo form_close();
			?>
		
		
	</div>
</div>