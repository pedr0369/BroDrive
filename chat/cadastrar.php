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
        
          body {
            background: snow;   
          }
          
          .cont {
            padding-top: 10%; position: relative;   
          }
          
      </style>
      
  </head>
  <body>
    
      <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    HOME
                </a>               
            </div>
        </div>
    </nav>
      
      <div class="container-fluid cont">
        <div class="row-fluid">
            <div class="col-md-4 well well-small col-md-offset-4 ">
                <h4 class="text-center">Cadastre-se</h4>
                
                <form method="post" action="action/acesso.php?action=cadastrar">
                    <div class="form-group">
                        <label for="login">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Cadastrar" class="btn btn-default col-md-4 col-md-offset-4">
                    </div>
                
            </div>  
        </div>
      </div>

  </body>
</html>