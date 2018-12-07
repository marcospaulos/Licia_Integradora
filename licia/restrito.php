<?php 




?>

<!DOCTYPE html>
<html>

<head>
    <title>Integradora Loguin</title>

     <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php 
require_once './include/barra.php';

?>

<div class="container" style="margin-top: 5%;">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Login Integradora</div>
            <div class="panel-body">
            
            <!-- Login Form -->
            <form role="form" method="post" action="open.php" id="formlogin" name="formlogin">
            
            <!-- Username Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                    <label for="username"><span class="text-danger" style="margin-right:5px;">*</span>Usuario:</label>
                        <div class="input-group">
                            <input class="form-control" id="login" type="text" name="login" placeholder="Username" required/>
                            <span class="input-group-btn">
                                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Content Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="password"><span class="text-danger" style="margin-right:5px;">*</span>Senha:</label>
                        <div class="input-group">
                            <input class="form-control" id="senha" type="password" name="senha" placeholder="Password" required/>
                            <span class="input-group-btn">
                                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></label>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Login Button -->
                <div class="row">
                    <div class="form-group col-xs-4">
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                </div>
                 <div class="row">
                   
                        <p class="text-danger"  align="center">Suporte : marcos.sales@ucsal.br</p>
                   
                </div>
                
            </form>
            <!-- End of Login Form -->
            
        </div>
    </div>
</div>

</body>
</html>