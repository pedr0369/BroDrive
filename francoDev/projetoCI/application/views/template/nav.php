<nav class="navbar navbar-default">
  <div class="container-fluid nav">
    <div class="navbar-header">
        <?= anchor('Painel/index', '<img src="' . base_url() . '/img/logo.png">', array('class' => 'navbar-brand logo')); ?>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
		<?php if($usuario = $this->session->userdata('usuario')): ?>
			<?php if($usuario['admin'] == 1): ?>
				<li><?= anchor('Admin/index', 'Painel', array('class' => 'menu_solto')); ?> </li>				
			<?php endif; ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle usuarioMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php $user = explode("@", $usuario['email']); echo "<img src='" . base_url() . "img/avatar/" . $usuario['avatar'] . ".png' width='50px'> " . $user[0]; ?>
	          <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><?= anchor('Login/contato', 'Contato'); ?></li>
	            <li><?= anchor('Painel/editar', 'Editar Dados'); ?></li>
		    <li><?= anchor('Login/faq', 'FAQ'); ?></li>
	            <li role="separator" class="divider"></li>
	            <li> <?= anchor('Painel/sair', 'Sair'); ?> </li>
	          </ul>
	        </li>
	<?php else: ?>
			<li><?= anchor('Login/contato', 'Contato', array('class' => 'menu_solto')); ?> </li>
			<li><?= anchor('Login/faq', 'FAQ', array('class' => 'menu_solto')); ?> </li>
	<?php endif; ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
    
  </div>
</nav>