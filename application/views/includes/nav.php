<nav class="navbar navbar-default">
  <div class="container-fluid nav">
    <div class="navbar-header">
        <?= anchor('Painel/index', 'BroDriver', array('class' => 'navbar-brand logo')); ?>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    
    <?php if($usuario = $this->session->userdata('usuario')): ?>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
          <?php if($permissao = $this->session->userdata('permissao')): ?><li><?= anchor('Admin/index', 'Painel'); ?> </li> <?php endif; ?>
              
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle usuarioMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php $user = explode(" ", $usuario['nome']); echo $user[0]; ?>
	          <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">0 de 20 MB</a></li>
	            <li><?= anchor('Sistema/contato', 'Contato'); ?></li>
	            <li><?= anchor('Sistema/meusDados', 'Meus Dados'); ?></li>
	            <li role="separator" class="divider"></li>
	            <li> <?= anchor('Painel/sair', 'Sair'); ?> </li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
    <?php endif; ?>
    
  </div>
</nav>

<div class="container-fluid">