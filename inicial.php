<?PHP
session_start();
$nome = $_SESSION['utilizador'];
$dep = $_SESSION['depart'];
$niv = $_SESSION['nivel'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/icons/elite/ICO/My Network.ico" type="img/icons/elite/ICO">
<title>CONTROL-TI</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
<div class="container">
<div class="btn-group">
  <button class="btn btn-info">SERVIÇOS</button>
	<button class="btn btn-info dropdown-toggle-split" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
	  <li><a href="#" target=""><span class="glyphicon glyphicon-info-sign"></span>Dashbord</a></li>
	  <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Bloquear Tela</a></li>
  </ul>
</div>
	<?php 
	if($niv = 2){
		$niv="Administrador";
	}else{
		$niv = "Usuário";
	}
	?>
  <div><p align="right"><h6 align="right">Seu login: <?PHP echo "{$nome} - Nível: {$niv}" ?></h6></p></div>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">INFRAESTRUTURA</div>
        <figure class="foto-legenda">
          <div class="panel-body"><img src="img/site/rede.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
          <div>
            <figcaption>
              <h4>Recurso em desenvolvimento</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading">IMPRESSORAS</div>
        <figure class="foto-legenda">
          <div class="panel-body"><a href="impressoras.php"><img src="img/site/impressora.jpg" class="img-responsive" style="width:100%" alt="Image"></a></div>
          <div>
            <figcaption>
              <h4>Informações sobre impressoras e toners</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">INFORMAÇÃO</div>
        <figure class="foto-legenda">
          <div class="panel-body"><a href="base.php"><img src="img/site/infor.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
          <div>
            <figcaption>
              <h4>Base de conhecimentos</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading">MOVIMENTAÇÃO</div>
        <figure class="foto-legenda">
          <div class="panel-body"><a href="movimentacao.php"><img src="img/site/logistica.jpg" class="img-responsive" style="width:100%" alt="Image"></a></div>
          </p>
          <p>
          <div>
            <figcaption>
              <h4>Controle de movimento de suprimentos e produtos</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading">SEGURANÇA</div>
        <figure class="foto-legenda">
          <div class="panel-body"><a href="confidecial.php"><img src="img/site/seguranca.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
          <div>
            <figcaption>
              <h4>Senhas Roteadores,WIFI etc....</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel  panel-primary">
        <div class="panel-heading">USUARIOS</div>
        <figure class="foto-legenda">
          <div class="panel-body"><a href="usuarios.php"><img src="img/site/login.jpg" class="img-responsive" style="width:100%" alt="Image"></a></div>
          <div>
            <figcaption>
              <h4>Cadastro de usuários</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-warning">
      <div class="panel-heading">FORNECEDORES</div>
      <figure class="foto-legenda">
        <div class="panel-body"><a href="fornecedores.php"><img src="img/site/fornecedor.jpg" class="img-responsive" style="width:100%" alt="Image"></a></div>
        </p>
        <p>        
        <div>
          <figcaption>
            <h4>Cadastro de fornecedores</h4>
          </figcaption>
        </div>
      </figure>
      <div class="panel-footer"></div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-warning">
      <div class="panel-heading">MODULO</div>
      <figure class="foto-legenda">
        <div class="panel-body"><img src="img/site/output_zvmmKf.gif" class="img-responsive" style="width:100%" alt="Image"></div>
        </p>
        <p>        
        <div>
          <figcaption>
            <h4>Modulo Bloqueado</h4>
          </figcaption>
        </div>
      </figure>
      <div class="panel-footer"></div>
    </div>
  </div>
  <div class="col-sm-4">
      <div class="panel  panel-primary">
        <div class="panel-heading">MODULO</div>
        <figure class="foto-legenda">
          <div class="panel-body"><img src="img/site/output_zvmmKf.gif" class="img-responsive" style="width:100%" alt="Image"></div>
          <div>
            <figcaption>
              <h4>Modulo Bloqueado</h4>
            </figcaption>
          </div>
        </figure>
        <div class="panel-footer"></div>
      </div>
    </div>
</div>
<p><br>
  <br>
</p>
<footer class="container-fluid text-center">
  <form class="form-inline">
    <p><div class="container-fluid text-left">
<h4><p>Desenvolvedor: Leandro Barbosa de Souza Versão 2.0.0 </p></h4>
	</div></p>
  </form>
</footer>
</body>
</html>
