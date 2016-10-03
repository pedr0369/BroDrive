<div class="row-fluid">

	<ol class="breadcrumb">
	  <li><?= anchor('painel/index', 'Painel Inicial') ?></li>
	  <li class="active">Painel de Administração</li>
	</ol>

	<?php if($this->session->flashdata("danger")): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></div>
	<?php endif; ?>
	
	<?php if($this->session->flashdata("info")): ?>
		<div class="alert alert-info"><?= $this->session->flashdata("info"); ?></div>
	<?php endif; ?>

	<div class="col-sm-6 col-md-4">	<!-- usuarios pendentes -->	
		<div class="list-group ">
			<h4 class="list-group-item active text-center">
                <span class='glyphicon glyphicon-eye-open'></span> Usuários Pendentes</h4><br>
			<table class="table table-responsive table-condensed">
				<?php 
					foreach($usuarios as $usuario):
						if($usuario['permission'] == 0):
				?>
							<tr>
								<td><b><?php $login = explode("@", $usuario['email']); echo $login[0]; ?></b></td>
								<td><?= dataPtBr($usuario['dt_create']); ?></td>
								<td class="text-right"><?= anchor("Admin/allow/{$usuario['id']}", "<span class='glyphicon glyphicon-check'></span>"); ?></td>
								<td class="text-right"><?= anchor("Admin/denny/{$usuario['id']}", "<span class='glyphicon glyphicon-remove-circle'></span>"); ?></td>
							</tr>			
				<?php
						endif;
					endforeach;
				?>
			</table>		
        </div>
	</div><!-- usuarios pendentes -->
	
	<div class="col-sm-6 col-md-4">	<!-- usuarios ativos -->	
		<div class="list-group">
		
			<h4 class="list-group-item active text-center">
                <span class='glyphicon glyphicon-thumbs-up'></span> Usuários ativos</h4><br>
			<table class="table table-responsive table-condensed">
			<?php 
				foreach($usuarios as $usuario):
					if($usuario['permission'] == 1 && $usuario['admin'] == 0):
			?>
						<tr>
							<td><b><?php $login = explode("@", $usuario['email']); echo $login[0]; ?></b></td>
							<td><?= dataPtBr($usuario['dt_create']); ?></td>
							<td class="text-right"><?= anchor("Admin/promove/{$usuario['id']}", "<span class='glyphicon glyphicon-user'></span>"); ?></td>
							<td class="text-right"><?= anchor("Admin/denny/{$usuario['id']}", "<span class='glyphicon glyphicon-remove-circle'></span>"); ?></td>
						</tr>				
			<?php
					endif;
				endforeach;
			?>
			</table>
		</div>		
	</div><!-- usuarios ativos -->
	
	<div class="col-sm-6 col-md-4">	<!-- usuarios administradores -->	
		<div class="list-group">
		
			<h4 class="list-group-item active text-center">
                <span class='glyphicon glyphicon-king'></span> Administradores</h4><br>
			<table class="table table-responsive table-condensed">
			<?php 
				foreach($usuarios as $usuario):
					if($usuario['permission'] == 1 && $usuario['admin'] == 1):
			?>		
						<tr>
							<td><b><?php $login = explode("@", $usuario['email']); echo $login[0]; ?></b></td>
							<td><?= dataPtBr($usuario['dt_create']); ?></td>
						</tr>							
			<?php
					endif;
				endforeach;
			?>
			</table>
		</div>		
	</div><!-- usuarios administradores -->		
	
	<div class="col-sm-6 col-md-4"><!-- usuarios banidos -->		
		<div class="list-group">
		
			<h4 class="list-group-item active text-center">
                <span class='glyphicon glyphicon-thumbs-down'></span> Usuários Banidos</h4><br>
			<table class="table table-responsive table-condensed">
			<?php 
				foreach($usuarios as $usuario):
					if($usuario['permission'] == -1):
			?>
						<tr>
							<td><b><?php $login = explode("@", $usuario['email']); echo $login[0]; ?></b></td>
							<td><?= dataPtBr($usuario['dt_create']); ?></td>
							<td class="text-right"><?= anchor("Admin/allow/{$usuario['id']}", "<span class='glyphicon glyphicon-ok'></span>"); ?></td>
						</tr>			
			<?php
					endif;
				endforeach;
			?>
			</table>
		</div>		
	</div><!-- usuarios banidos -->		
</div>