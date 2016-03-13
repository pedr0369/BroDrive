<?php

include("../class/DB.php");
include('../class/usuario.php');

$user = new Usuario();
$user->setLogin($_POST['login']);
$user->setSenha(md5($_POST['password']));

######################################################################################################
if(isset($_REQUEST["action"])){
    if($_REQUEST["action"] == "cadastrar"){
        
        $user->setNome($_POST['nome']);        
        $user->cadastraUser($user->getNome(), $user->getLogin(), $user->getSenha());
        
    }   
}
######################################################################################################
if(isset($_REQUEST["action"])){
    if($_REQUEST["action"] == "logar"){
        
        session_start();
        
        if($user->logar($user->getLogin(), $user->getSenha())){
            header('location:../painel.php');
        }else{
            echo "<script>alert('Login inválido, tente novamente!');top.location.href='../index.php';</script>";   
        }
        
    }   
}
#######################################################################################################
if(isset($_REQUEST["action"])){
    if($_REQUEST["action"] == "logout"){
        
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:../index.php');
    }
}
########################################################################################################