<?php 

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
$login = $_SESSION['login'];

include("class/DB.php");
include('class/mensagem.php');

$mensagens = new Mensagem();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHAT</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>

      <style type="text/css">
        
          body { background: snow; }
          .cont { padding-top: 1%; position: relative; }
          #chat { border:1px solid #efefef; }
          .usuario { font-weight:bold; float:left; }
          .msg { padding-left:20px; }
          .mensagem { border-bottom: 1px solid #c0c0c0; padding:5px; }
          
          .usuario1 { font-weight:bold; float:left; }
          .msg1 { padding-left:20px; color: #555;  }
          .mensagem1 { border-bottom: 1px solid #c0c0c0; padding:5px; background: lightgray; opacity:0.65; }
          
      </style>
      
  </head>
  <body>
      
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <?php echo "Seja bem vindo {$login}"; ?>
                </a>        
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
        <li><a href="action/acesso.php?action=logout">Sair<span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
            
        </div>
    </nav>
    
      <div class="container-fluid cont">
        <div class="row-fluid">
            <div class="col-md-8 well well-sm col-md-offset-2">
                <h4 class="text-center">CHAT</h4>
                <div id="chat">
                    
                    <?php
                        $mensagens->chat($login);
                    ?>
                    
                </div>
                <form action="action/chat.php?action=envia" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="mensagem" class="form-control input-lg" placeholder="escreva sua mensagem...">
                            <div class="input-group-addon"><input type="submit" class="btn btn-sm btn-primary"  value="ENVIAR"></div>
                        </div>
                    </div>
                </form>                      
                
            </div>  
        </div>
      </div>

  </body>
</html>