<?php

session_start();

$login = $_SESSION['login'];

include("../class/DB.php");
include('../class/mensagem.php');

$msg = new Mensagem();
$msg->setMensagem($_POST['mensagem']);
$msg->setUsuario($login);

######################################################################################################
if(isset($_REQUEST["action"])){
    if($_REQUEST["action"] == "envia"){
        $msg->enviaMensagem($msg->getMensagem(), $msg->getUsuario());
    }   
}
######################################################################################################