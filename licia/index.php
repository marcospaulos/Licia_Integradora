<?php ?>
<html> 
<link href="css/login2/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login2/log_css.css">
<!--<script src="css/login2/bootstrap.min.js"></script> -->
<!--<script src="css/login2/jquery-1.11.1.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Login SPA</h2>
        <form class="login-form" method="post" action="open_vestiba.php" id="formlogin">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">USUÁRIO</label>
    <input type="text" id="login"  name="login" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">SENHA</label>
    <input type="password" id="senha"  name="senha" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Lembrar Senha</small>
    </label>
    <button type="submit" class="btn btn-login float-right">LOGAR</button>
  </div>
  
</form>
<div class="copy-text">Marcos Paulo Sales <i class="fa fa-heart"></i> by <a href="https://ucsal.br">Ucsal.br</a></div>
    </div>
    <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="img/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>SPA | Sistema de processamento de Arquivos.</h2>
            
        </div>  
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>  
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>  
    </div>
  </div>
            </div>     
        
    </div>
  </div>
</div>
</section>

</html>