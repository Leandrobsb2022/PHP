<?php
//Class
require("./conectar.php");
require("./class/class.cst.php");
require("./class/class.lembrei.php");
//variaveis
$icb = new cst;
$lem = new lembrei;
$array = "";
$data = "";
$nome= "";
$senha="";
$nivel="";
$comemoracao = "";
$pararLoop = 0;
$fundo="img\fundo.jpg";

//global
session_start();
$_SESSION['utilizador']=0;
$_SESSION['nivel']=0;
$_SESSION['tipo_T']="";
$_SESSION['cont'] = "0";
$_SESSION['IMPRESSAO'] = "0";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="img/icons/elite/ICO/My Network.ico" type="img/icons/elite/ICO">
<title img >Login</title>
</head>
<body>	
<div class="container-fluid text-center">
<table width="1286" border="0" align="center">
  <tr>
    <th height="92" scope="col"><form action="" method="post" name="form1">
        <label for="senha" id="lab"></label>
        <label></label>
        <label for="senha" id="lab"><br>
        </label>
        <label for="login" id="lab"></label>
        <label></label>
        <label> </label>
        <label for="senha"></label>
        <label>
        <div align="center">
          <p><h1>Controle de acesso </h1></p>
          <p><strong>Usuários </strong>
            <select name="nome" id="nome" tabindex="1">
              <?php
      		$sql = mysql_query("SELECT nome FROM login");
      			  while($monta = mysql_fetch_assoc($sql))
	  			      {
         		    	echo '<option value="'.$monta['nome'].'">'.$monta['nome'].'</option>';
                }
			?>
            </select>
          Senha:
          <input name="senha" type="password" id="senha"  tabindex="2" size="10">
          <input type="submit" name="login" id="login" value="Entrar"  tabindex="3">
          <br>
          </p>
        </div>
        </label>
        <p>
          <?php
			if(isset($_POST['login'])) 
			{
				$senha= $_POST['senha'];
				$nome= $_POST['nome'];
				if(empty($senha))
				{
					echo "Digite uma senha para entrar!";
				}
				else
				{
					$query = mysql_query("SELECT * FROM `login` WHERE 1");
					if(mysql_num_rows($query))
						{
							$resposta=$icb->log($senha,$nome);
					}else{
						$nome = "Administrador";
						$senha= "123admin";
						$cript =  base64_encode($senha);
						$per = 2;
						$dep=8;
						$query = mysql_query("INSERT INTO login (Nome,Nivel,dep,Senha) VALUES ('$nome', '$per','$dep','$cript')");
						echo "Esse e seu primeiro acesso. O usuario administrador foi criando a e senha 123admin. Apos o acesso favor muda senha para sua seguranca em Cadastro de usuarios!";
						return $query;
					}
				}
			}	
 		 ?>
        </p>
     
    </form></th>
  </tr>
  <tr>
    <td height="186"><div align="center"><a href="redes.php" target="_top"></a></div></td>
  </tr>
</table>
</div>
</body>
</html>
