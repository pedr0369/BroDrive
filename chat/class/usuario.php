<?php

class Usuario {
 
    private $nome;
    private $login;
    private $senha;
    
    public function getNome(){ return $this->nome; }
    public function getLogin(){ return $this->login; } 
    public function getSenha(){ return $this->senha; }
    
    public function setNome($nome){ $this->nome = $nome; }    
    public function setLogin($login){ $this->login = $login; }    
    public function setSenha($senha){ $this->senha = $senha; }
    
    public function cadastraUser($nomeC, $loginC, $senhaC){
        $db = new DB();
        $conn = $db->newConnection();
        $verifica = $conn->query("select login as cont from acesso where login = '$loginC'");
        if($verifica->num_rows == 0){
            $cadastra = $conn->query("insert into acesso (nome, login, senha) values ('$nomeC', '$loginC', '$senhaC')");
            echo "<script>alert('Cadastrado feito com sucesso!');top.location.href='../index.php';</script>";
        }else{
            echo "<script>alert('Usuario ja existente!');top.location.href='../cadastrar.php';</script>";   
        }
    }
    
    public function logar($loginL, $senhaL){
        $db = new DB();
        $conn = $db->newConnection();
        $verifica = $conn->query("select login from acesso where login = '$loginL' and senha = '$senhaL'");
        if($verifica->num_rows == 1){
           $_SESSION['login'] = $loginL;
           $_SESSION['senha'] = $senhaL;
	       return true;
        }else{
            return false;
        }
    }
    
}