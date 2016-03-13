<?php

class Mensagem {
 
    private $mensagem;
    private $usuario;
    
    public function getMensagem(){ return $this->mensagem; }
    public function getUsuario(){ return $this->usuario; }
    
    public function setMensagem($mensagem){ $this->mensagem = $mensagem; }
    public function setUsuario($usuario){ $this->usuario = $usuario; }
    
    public function enviaMensagem($msg, $usuario){
        $data = date("Y-m-d h:i:s");
        $db = new DB();
        $conn = $db->newConnection();
        $insert = "insert into chat (mensagem, usuario, hora) values ('$msg', '$usuario', '$data')";
        $envia = $conn->query($insert);
        header('location:../painel.php');
    }
    
    public function chat($login){
        $db = new DB();
        $conn = $db->newConnection();
        $select = "select * from chat order by id desc limit 10";
        $consulta = $conn->query($select);
        while($row = $consulta->fetch_array()){
            $msg = $row['mensagem'];
            $user = $row['usuario'];
            $hora = $row['hora'];
            
            if($login != $user){
                echo "<p class='mensagem'>" .
                "<span class='usuario'>{$user}:</span>" .
                "<span class='msg'>{$msg}</span>" .
                "</p>";
            }else {
                echo "<p class='mensagem1'>" .
                "<span class='usuario1'>{$user}:</span>" .
                "<span class='msg1'>{$msg}</span>" .
                "</p>";
            }
        }
    }
    
}