<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="col-sm-6">
	<h3 class="text-center">Permissões Pendentes</h3>
	<ul class="list-group">
	<?php foreach($permissao as $permiss): ?>
		<li class="list-group-item">
			<span class="badge"><?= anchor('Admin/recusar/' . $permiss['cod'], '<span class="glyphicon glyphicon-remove-circle"></span>'); ?></span>
			<span class="badge"><?= anchor('Admin/aprovar/' . $permiss['cod'] . "/" . $permiss['email'], '<span class="glyphicon glyphicon-ok"></span>'); ?></span>
			<b><?= $permiss['nome'] . " / " . $permiss['email'] ?> </b>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<div class="col-sm-4 col-sm-offset-1">
	<h3 class="text-center">Usuários comuns</h3>
	<ul class="list-group">
	<?php foreach($permissioned as $permissed): ?>
		<?php if($permissed['admin'] == 0): ?>
		<li class="list-group-item">
			<span class="badge"><?= anchor('Admin/promover/' . $permissed['cod'], 'Tornar admin: <span class="glyphicon glyphicon-user"></span>'); ?></span>
			<b><?= $permissed['nome']; ?> </b>
		</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
</div>

<?php $this->load->view('includes/footer'); ?>