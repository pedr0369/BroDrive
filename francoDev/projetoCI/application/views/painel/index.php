<?php
    error_reporting(0);
    $total = 0;
    $cont = 0;
    $user = explode("@", $usuario['email']);
?>

<?php if($this->session->flashdata("danger")): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></div>
<?php endif; ?>

<?php if($this->session->flashdata("info")): ?>
        <div class="alert alert-info"><?php $this->session->flashdata("info"); ?></div>
<?php endif; ?>
    
<div class="col-sm-4 col-md-3 myPanel" ng-controller="codAtivacao"><!-- Meu painel -->

    <?php $this->load->view('painel/modulos_lateral/cod_ativacao'); ?>
    <?php $this->load->view('painel/modulos_lateral/myCategories'); ?>
    <?php $this->load->view('painel/modulos_lateral/myFiles'); ?>

</div> <!-- fim meu painel -->
	
<div class="col-sm-8 col-md-9" ng-controller="codAtivacao"> <!-- Dashboard -->
    
    <h1>DASHBOARD<span class="pull-right btn" style="font-size: 18px;" ng-bind="'Brodrivers: ' + dados.totalUsers.total"></span></h1>

    <div class="col-md-4" style="padding: 0;">
    	<?php $this->load->view('painel/modulos_dashboard/uploadFile'); ?>
    	<?php $this->load->view('painel/modulos_dashboard/arquivosCategoria'); ?>
    </div>
    
    <div class="col-md-8" style="padding: 0;">
    	<?php $this->load->view('painel/modulos_dashboard/cadastroCategories'); ?>
    	<?php $this->load->view('painel/modulos_dashboard/arquivosEnviados'); ?>
    </div>

</div> <!-- fim Dashboard -->