<?php
require("./class/class.cst.php");
require("./conectar.php");
require_once("dompdf/dompdf_config.inc.php");
$ICB = new cst;
$cnpj= "";
$ip  = "";
$pc = "";
$dep  = "";
$resp = "";
$team ="";
$ramal  = "";
$desc="";
$carg= "";
$loc= "";
$campo ="";
$busca = "";
session_start();
$_SESSION['exec'] = "";
$_SESSION['pesq'] = "";
#$_SESSION['utilizador'] = "ICB";
#$_SESSION['nivel'] =1;
$nome = $_SESSION['utilizador'];
$nivel = $_SESSION['nivel'];
$_SESSION['tipo_T']="Re";
$tipo_t = $_SESSION['nivel'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Cadastro de dados</title>
<span id='topo'></span>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body background="">
<p align="left"><em>
  <label for="teste"></label>
</em></p>
<?php
$datedia = date('d/m/Y');

if($_SESSION['nivel'] <> 2)
{
	#echo "<p align=left><em></em>Login: <label>{$nome} (Padrão) </label>  Data:<label> {$datedia}</label>" ;
	header('Location: BLOQUEIO.php');	 
}else{
	#echo "<p align=left><em></em>Login: <label>{$nome} (Administrador) </label>  Data:<label> {$datedia}</label>" ; 
}
?>
</p>
<p align="left"><span class="style1">CADASTRO DE REDE</span><em>
  <?php
  
   if(isset($_POST['Salve'])) 
  			{
				$_SESSION['IMPRESSAO'] = "REDE";
				$descri= $_POST['pes'];
				switch ($descri) 
					{
    				case 0:
       					$campo = "ip";
        			break;
    				case 1:
        				$campo = "ram";
       				 break;
    				case 2:
        				$campo = "host";
        			break;
					case 3:
        				$campo = "dep";
        			break;
					case 4:
        				$campo = "resp";
        			break;
					case 5:
        				$campo = "loc";
        			break;
					}
					$_SESSION['exec'] = $_POST['txtloc'];
					$_SESSION['pesq'] = $campo;
					if($_POST['txtloc'] <> ""){header('Location: impressao_impr.php');}	

   			 }
 if(isset($_POST['LOC'])) 
  	{
		
		if($_POST['txtloc'] <> ""){
		$busca =  $_POST['txtloc'];
		$descri= $_POST['pes'];
		switch ($descri) 
			{
    			case 0:
        			$campo = "ram";
       			break;
    			case 1:
        			$campo = "host";
        		break;
				case 2:
        			$campo = "dep";
        		break;
				case 3:
        			$campo = "resp";
        		break;
				case 4:
        			$campo = "loc";
        		break;
			}
			
				if(($nivel == 1)) 
					{
						if(($busca == "ti") || ($campo == "ip") || ($campo == "host")) 
							{
									echo "Voce nao tem permissão de consulta {$busca}";
							}else{
									$respo=$ICB->lista($campo,$busca,$nivel,$tipo_t);
							}
					}
			if(($nivel == 2) )
				{
					$respo=$ICB->lista($campo,$busca,$nivel,$tipo_t);
					$query = mysql_query("SELECT * FROM `red_tel` WHERE  $campo='$busca' ");
					if(mysql_num_rows($query))
						{
							while($array = mysql_fetch_row($query)) 
								{		
									$pc  = $array[0];
									$dep  = $array[1];
									$resp = $array[2];
									$team  =$array[3];
									$ramal= $array[4];
									$carg = $array[5];
									$loc = $array[6];
									$desc= $array[7];
									$cnpj= $array[8];
								}
						}
				}
				}else{
						
	
			}
	}
	
?>
</em></p>
<table width="1558" border="1">
  <tbody>
    <tr>
      <th height="18" bgcolor="#000000" scope="col"></th>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="" >
  <p><em>
    <label for="label2">Computador:</label>
    <input name="HOST" type="text" class="Leandro" id="HOST" maxlength="15" size="50" value="<?php echo $pc; ?>"/>
  </em><em>Depar:
  <label for="label2">
  <select name="DEP" id="DEP" value="<?php echo $dep; ?>">
    <option ><?php echo $dep; ?></option>
    <?php
		$sql = mysql_query("SELECT dep FROM depart");
      
	  while($monta = mysql_fetch_assoc($sql))
	  {
         echo '<option value="'.$monta['dep'].'">'.$monta['dep'].'</option>';
      }
      ?>
  </select>
Usuário:</label>
  <input name="RESP" type="text" class="Leandro" id="RESP" size="25" maxlength="20" value="<?php echo $resp; ?>"/>
  </em></p>
  <p><em>
    <label for="IP"></label>
    <label for="label2"></label>
  </em><em>AnyDesk :
  <input name="TEAM" type="text" id="TEAM" size="20" maxlength="10" value="<?php echo $team; ?>"/>
  <label for="label2"> Ramal:</label>
  <input name="RAM" type="text" id="RAM" size="15" maxlength="4" value="<?php echo $ramal; ?>"/>
  </em><em>
  <label for="label2">Local:</label>
  <input name="LOC2" type="text" class="Leandro" id="label" size="45" maxlength="15" value="<?php echo $loc; ?>"/>
  </em><em>
  <label for="label2">Função :</label>
  <input name="CARGO" type="text" class="Leandro" id="CARGO" size="26" maxlength="15" value="<?php echo $carg; ?>"/>
  </em></p>
  <p><em>
    <label for="NOME PC"></label>
  </em><em>
  <label for="label2"></label>
  <label for="label2"></label>
  </em><em>
  <label for="label2">Informação Adicional:</label>
  <label for="label2"></label>
  </em><em>
  <input name="OBSER" type="text" class="Leandro" id="OBSER" value="<?php echo $desc; ?>" size="120" />
  </em></p>
  <p><em>
    <label for="DEP"></label>
    <label for="label2"></label>
  </em><em>
  <input type="submit" name="Salvar" id="Salvar" value="Novo/Alterar" />
  <input type="submit" name="del" id="del" value="Delete" />
  </em><em>
  <?php 
	if(isset($_POST['Salvar'])) 
  	{	
		$pc = $_POST['HOST'];
		$dep  = $_POST['DEP'];
		$resp = $_POST['RESP'];
		$team = $_POST['TEAM'];
		$ramal  = $_POST['RAM'];
		$desc= $_POST['OBSER'];
		$carg= $_POST['CARGO'];
		$loc= $_POST['LOC2'];
		if($nivel <> 2){
				echo "Voce nao tem permissao de salvar ou alterar dados!!!";
		}
		else
		{
		$resposta = $ICB-> adicionar($pc,$dep,$resp,$team,$ramal,$carg,$loc,$desc);
		}
	}
	 
	if(isset($_POST['del'])) 
  	{
	$pc = $_POST['HOST'];
		if($nivel <> 2){
				echo "Voce nao tem permissao de excluir dados!!!";
		}
		else
		{
		$resposta = $ICB-> delete($pc);
		}
	}
	?>
  </em></p>
  <table width="1558" border="1">
    <tbody>
      <tr>
        <th height="18" bgcolor="#000000" scope="col"></th>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p><em>
    <label for="RESP"></label>
    <label for="label2"></label>  
    <label for="OBSER"></label>
    <label>Tipo:</label>
    <label></label>
    <select name="pes" id="pes">
      <option value="1">RAMAL</option>
      <option value="2">PC</option>
      <option value="3">DEPART</option>
      <option value="4">USUARIO</option>
      <option value="5">LOCAL</option>
    </select>
    <label>Dig:</label>
    <input name="txtloc" type="text" class="Leandro" id="txtloc" onchange="return bar()"/>
    <input type="submit" name="LOC" id="LOC" value="Localizar" />
    <input type="submit" name="Salve" id="Salve" value="Impressão" />
    <input type="submit" name="visual" id="visual" value="Visualizar todos com ramais" />
    <label for="Salvar xls"></label>
    <label for="OBSER"><br />
  </label>
  </em></p>
  <p>
    <label>Informações encontradas:</label>
  &nbsp;
  <?php
	if(isset($_POST['apar'])) 
  		{
			$busca= "WKE";
$resposta = $ICB-> apar_wke($busca);
}
    if(isset($_POST['visual'])) 
    {
        $resposta = $ICB-> lista($campo,$busca,$nivel,$tipo_t);
			}	
?>
  </p>
  <p>
    <label></label>
  </p>
  <p><label></label>
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>