<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<?php $this->load->view('includes/aside'); ?>

<section class="col-sm-9" id="princ">

<?php if($this->session->flashdata('alerta')): ?>
        <p class="alert alert-success"><?= $this->session->flashdata('alerta'); ?></p>
<?php endif; ?>

<?php $usuario = $this->session->userdata('usuario');
    $user = explode(" ", $usuario['nome']);
    echo $user[0];
    $path = 'Diretorio/pedr0369';
    $lista = dir($path);
    while($arquivo = $lista -> read()){ 
        echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; 
    }
?>

</div>

<?php $this->load->view('includes/footer'); ?>