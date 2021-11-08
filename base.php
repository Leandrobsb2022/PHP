6.<?php
require("./class/class.base.php");
require("./class/class.cst.php");
require("./conectar.php");
$ICB = new base;
$login = new cst;
session_start();
$_SESSION['exec'] = "";
$_SESSION['pesq'] = "";
$busca = $_SESSION['ID'];
$nome = $_SESSION['utilizador'];
$_SESSION[ 'del_confirm' ] = 0;
$senha= "";
$nivel = $_SESSION['nivel'];
$loc = "";
$descr = "";
$tipo= "";
$descri = "";
$data = date('d/m/Y');
$senha=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>informação TI</title>
</head>
<body background="">
	
<form id="form1" name="form1" method="post" action="" >
	<div class="container">
		<h6><p>
	<?php
		
		$datedia = date( 'd/m/Y' );
	if ( $_SESSION[ 'nivel' ] <> 2 ) {
	  echo "<p align=left><em></em>Login: <label>{$nome} (Padrão) </label>  Data:<label> {$datedia}</label>";
	  header( 'Location: BLOQUEIO.php' );
	  echo "NIVEL SEM ACESSO: ";
	} else {
	  echo "<p align=left><em></em>Login: <label>{$nome} (Administrador) </label>  Data:<label> {$datedia}</label>";
	}
?>
	</h6></p>
		  <input name="voltar" type="submit" class="btn btn-info btn-sm" id="voltar" formaction="inicial.php" value="VOLTAR"  align="left"/></p>
<div class="alert alert-primary btn-sm" role="alert">
    <h5>INFORMAÇÕES</h5>
	<br />
</div>
  <table width="206" height="35" border="0" align="left">
    <tbody>
      <tr>
        <th width="121" scope="row"><label for="label3"> <h6>DATA:</label>
          </h6>
          <h6><em>
            <input name="DT" type="text" class="Leandro" id="DT" value="<?php echo $data; ?>" size="15" maxlength="12"/>
            </em> <strong>
            <p></p>
            <label for="label3">USUARIO:</label>
            </strong></h6>
          <h6><em>
            <input name="RESP" type="text" class="Leandro" id="RESP" size="15" maxlength="20" value="<?php echo $nome; ?>"/>
          </em></h6>
          <h6>TIPO:</h6>
          <h6><em>
            <select name="CMB" id="CMB">
              <option value="0">TELEFONIA</option>
              <option value="1">REDE</option>
              <option value="2">COMPUTADOR</option>
              <option value="3">INTERNET</option>
              <option value="4">E-MAIL</option>
              <option value="5">IMPRESSORA</option>
              <option value="6">INTERFACE</option>
              <option value="7">FIREWALL</option>
              <option value="8">ANTT</option>
            </select>
        </em></h6></th>
      </tr>
    </tbody>
  </table>
  <h6>INFORMAÇÃO</h6>
  <p>
    <textarea type="text" id="OBSER" name="OBSER" rows="7" maxlength="500" cols="170"></textarea>
    <em>
    <input type="submit" name="del" id="del" onClick="login_del()" class="btn btn-danger btn-sm"value="Conhecimento Desnecessário" disabled />
  </em><em>Deletar o ID:
  <input name="id" type="text" id="id" value="0" size="4" maxlength="12"/>
  </em></p>
  <p><em>
    <input type="submit" name="Salvar" id="Salvar" class="btn btn-secondary btn-sm" value="Adicionar Conhecimento" />
    <input type="submit" name="loca" id="loca" class="btn btn-secondary btn-sm" value="Pesquisa" />
    <select name="CMB2" id="CMB2">
      <option value="0">TELEFONIA</option>
      <option value="1">REDE</option>
      <option value="2">COMPUTADOR</option>
      <option value="3">INTERNET</option>
      <option value="4">E-MAIL</option>
      <option value="5">IMPRESSORA</option>
      <option value="6">INTERFACE</option>
      <option value="7">FIREWALL</option>
      <option value="8">ANTT</option>
    </select>
  </em><em>
  <?php
	if($_SESSION['nivel'] <> 2)
{
	header('Location: BLOQUEIO.php');
}else{
		
}			 
  if(isset($_POST['Salvar'])) 
		{
			$nome = $_SESSION['utilizador'];
			$data = $_POST['DT'];
		switch ($_POST['CMB']) 
			{
      case 0:
        $tipo = "TELEFONIA";
        break;
      case 1:
        $tipo = "REDE";
        break;
      case 2:
        $tipo = "COMPUTADOR";
        break;
      case 3:
        $tipo = "INTERNET";
        break;
      case 4:
        $tipo = "E-MAIL";
        break;
      case 5:
        $tipo = "IMPRESSORA";
        break;
      case 6:
        $tipo = "INTERFACE";
        break;
      case 7:
        $tipo = "FIREWALL";
        break;
      case 8:
        $tipo = "ANTT";
        break;
			}
			$descri=$_POST['OBSER'];
	  		$respo=$ICB->adicionar_base($nome,$descri,$data,$tipo);
		}
	if(isset($_POST['del']))
		{
		
		//$respo=$login->logC($senha,$nome);
			$descri=$_POST['id'];
			if(empty($descri) or $descri === 0){
				echo "<label> <FONT COLOR=red><h5>Favor digite o ID a ser deletado!</h5></font></label>";		
			}else{
				$respo=$ICB->delete_base($descri);
				//if($_SESSION[ 'del_confirm' ] === 1){
					
				//} else {
					//echo "<label> <FONT COLOR=red><h5>Senha não confere!!</h5></font></label>";
				//}
			}
		}
		
  ?>
  </em></p>
  <div class="alert alert-primary btn-sm" role="alert">
    <h5 align="left">RESUMO</h5>
  </div>
  
  <?php
	
	
		if(isset($_POST['loca'])) 
		{
			$loc = 1;
			switch ($_POST['CMB2']) 
			{
    		case 0:
					$tipo = "TELEFONIA";
			 break;
			 case 1:
				 $tipo = "REDE";
				break;
			 case 2:
				 $tipo = "COMPUTADOR";
			 break;
			 case 3:
				 $tipo = "INTERNET";
			 break;
			 case 4:
				 $tipo = "E-MAIL";
			 break;
			 case 5:
				 $tipo = "IMPRESSORA";
			 break;
			 case 6:
				 $tipo = "INTERFACE";
			 break;
			case 7:
				 $tipo = "FIREWALL";
			 break;
			 case 8:
				 $tipo = "ANTT";
			 break;
			}
			
			$respo=$ICB->visualize_base($loc,$tipo);
		}
		?>
</form>
		<script>
			function login_del()
				{
					var test = prompt('digite a senha de autorização');
				}
		</script>
</body>
</html>