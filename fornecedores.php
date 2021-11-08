<?php
#conexão do banco e declaração das classes
require_once("dompdf/dompdf_config.inc.php"); 
require("./conectar.php");
require("./class/class.forn.php");
#require("./class/class.cst.php");
#objeto classe
#$ICB = new cst;
$itens = new forn;
#Variaveis cadastro
$tipo = "";
$checar = false;
$cnpj= "";
$empr  = "";
$tel = "";
$contato  = "";
$cel = "";
$serv ="";
$ende  = "";
$bair="";
$cid= "";
$infor="";
$cep="";
$id_for = "";
$situa="";
$sit01="";
$sit02 = "";
$max = 0;
$min = 0;
$i = 0;
#variaveis de pesq.
$at= "";
$campo ="";
$busca = "";
$id = "0";
#Variaveis Globais
session_start();
#pesquisa global
$_SESSION['exec'] = "";
$_SESSION['pesq'] = "";
$_SESSION['numero']= "";
#usuarios acesso
$nome = $_SESSION['utilizador'];
$nivel = $_SESSION['nivel'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Cadastro de dados</title>
<link href="css/mai.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<style type="text/css">
<!--
.style7 {
	font-size: 24;
	font-weight: bold;
}
-->
</style>
</head>
<body load="" background="" >
<div class="container">
	<form id="form1" name="form1" method="post" action="" >
<p align="left" action ="">
  <input name="voltar" type="submit" class="btn btn-info btn-sm" id="voltar" formaction="inicial.php" value="VOLTAR"  align="left"/>
</p>
<p align="left">
  <?php 
if(isset($_POST['pro'])) 
  	{
	
	if ($_SESSION['cont'] == $max){
			echo "Ultimo registro";
			$_SESSION['cont'] = 0;
		}else{
			$_SESSION['cont'] = $_SESSION['cont'] + 1 ;
			$campo = "id";
			$id =$_SESSION['cont']; 
			$respo=$itens->lista($campo,$id);
			$query = mysql_query("SELECT * FROM `forne_terc` WHERE  $campo='$id' ");
					if(mysql_num_rows($query))
						{
						
							while($array = mysql_fetch_row($query)) 
								{		
									$empr = $array[1];
									$cnpj = $array[2];
									$tel  = $array[3];
									$contato = $array[4];
									$cel  =$array[5];
									$serv = $array[6];
									$cep= $array[7];
									$ende = $array[8];
									$bair = $array[9];
									$cid = $array[10];
									$infor= $array[11];
									$situa= $array[12];
								
									
								}
		
								$tes= " Situação Atual: ";
								if($situa == "1"){
									echo "<b><font color='#298A08'> {$tes} Ativa</font></b>";
								}else{
									echo "<b><font color='#FF0000'> {$tes} Inativa </font></b>";
								}
								
						}
		}
			
	}	
	
	if(isset($_POST['nex'])) 
  	{
		if ($_SESSION['cont'] == $min){
			echo "primeiro registro";
		}else{
			$_SESSION['cont'] = $_SESSION['cont'] - 1 ;
			$campo = "id";
			$id =$_SESSION['cont']; 
			$respo=$itens->lista($campo,$id);
			$query = mysql_query("SELECT * FROM `forne_terc` WHERE  $campo='$id' ");
					if(mysql_num_rows($query))
						{
						
							while($array = mysql_fetch_row($query)) 
								{		
									$empr = $array[1];
									$cnpj = $array[2];
									$tel  = $array[3];
									$contato = $array[4];
									$cel  =$array[5];
									$serv = $array[6];
									$cep= $array[7];
									$ende = $array[8];
									$bair = $array[9];
									$cid = $array[10];
									$infor= $array[11];
									$situa= $array[12];
								
									
								}
		
								$tes= " Situação Atual: ";
								if($situa == "1"){
									echo "<b><font color='#298A08'> {$tes} Ativa</font></b>";
								}else{
									echo "<b><font color='#FF0000'> {$tes} Inativa </font></b>";
								}
								
						}
		}
			
	
	}
?>
  <em>
  <?php
 if(isset($_POST['LOC'])) 
  	{
			$id =$_POST['pes'];
			$campo = "emp";
			if(($nivel == 2) )
				{
					$respo=$itens->lista($campo,$id);
					
					$query = mysql_query("SELECT * FROM `forne_terc` WHERE  $campo='$id' ");
					if(mysql_num_rows($query))
						{
						
							while($array = mysql_fetch_row($query)) 
								{		
									$empr = $array[1];
									$cnpj = $array[2];
									$tel  = $array[3];
									$contato = $array[4];
									$cel  =$array[5];
									$serv = $array[6];
									$cep= $array[7];
									$ende = $array[8];
									$bair = $array[9];
									$cid = $array[10];
									$infor= $array[11];
									$situa= $array[12];
									$id_for = $array[0];
									
								}
		
								$tes= " Situação Atual: $situa";
								if($situa == "1"){
									echo "<b><font color='#298A08'> {$tes} Ativa</font></b>";
								}else{
									echo "<b><font color='#FF0000'> {$tes} Inativa </font></b>";
								}
								
								
						}
				}
	}
?>
  <?php
	$MAXIMO = mysql_query("SELECT MAX(id) FROM `forne_terc` where 1");
	$MINIMO = mysql_query("SELECT MIN(id) FROM `forne_terc` where 1");
	$row = mysql_fetch_array($MAXIMO);
	$row2 =  mysql_fetch_array($MINIMO); 
	$max = $row[0];
	$min = $row2[0];
	
$datedia = date('d/m/Y');
if($_SESSION['nivel'] <> 2)
{
	#tela de bloqueio caso o usuario não tenha acesso
	header('Location: BLOQUEIO.php'); 
}else{
	#caso livre acesso 
}
?>
  </em></p>
		<div class="alert alert-primary btn-sm" role="alert">
  <h5 align="left"><span class="style6">CADASTRO DE FORNECEDORES</span></h5>
  <strong></strong></div>
	</h6>
	  <table width="1141" border="0" align="center">
	    <tbody>
	      <tr>
	        <th width="358" scope="col">&nbsp;</th>
	        <th width="280" scope="col"><em>
            <label for="label3"></label>
            </em></th>
	        <th width="142" scope="col"><em><h6>&nbsp;</h6>
	        </em></th>
	        <th width="195" scope="col"><em><h6>&nbsp;</h6>
	        </em></th>
	        <th width="144" scope="col"><em><h6>&nbsp;</h6>
	        </em></th>
          </tr>
	      <tr>
	        <td align="center"><em ><h6 align="center">Tipo serv.</h6>
                <input name="srv" type="text" id="srv" size="30" maxlength="30" value="<?php echo $serv; ?>" />
            </em></td>
	        <td align="center"><em>
	          <label for="label9"><h6 align="center">Endereço</h6></label>
              <input name="ende" type="text" id="ende" size="40" maxlength="40" value="<?php echo $ende; ?>"/>
	        </em></td>
	        <td align="center"><em>
	          <label for="label10"><h6 align="center">Cep</h6></label>
              <input name="cep" type="text" class="Leandro" id="cep" size="15" maxlength="15" value="<?php echo $cep; ?>"/>
            </em></td>
	        <td align="center"><em>
	          <label for="label11"><h6 align="center">Bairro</h6></label>
              <input name="bai" type="text" class="Leandro" id="bai" size="15" maxlength="15" value="<?php echo $bair; ?>"/>
	        </em></td>
	        <td align="center"><h6>Cidade</h6>
            <input name="cid" type="text" id="cid" value="<?php echo $cid; ?>" size="15" maxlength="15" /></td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	       
          </tr>
        </tbody>
	  </table>
	  <p>
	    <label for="CNPJ">CNPJ </label>
        <em>
        <input name="CNPJ" type="text" id="CNPJ" value="<?php echo $cnpj; ?>" size="20" maxlength="20" />
      </em><em>Empresa
      <input name="empr" type="text" class="Leandro" id="empr" value="<?php echo $empr; ?>" size="40" maxlength="30"/>
      </em><em>Tel</em></p>
<input name="tel" type="text" class="Leandro" id="tel" value="<?php echo $tel; ?>" size="15" maxlength="14"/>
<em>
<h6>Contato</h6>
<input name="cont" type="text" class="Leandro" id="cont" size="21" maxlength="15" value="<?php echo $contato; ?>"/>
</em>
<h6><em>Cel/Tel</em></h6>
<input name="cel" type="text" class="Leandro" id="cel" size="15" maxlength="15" value="<?php echo $cel; ?>"/>
<p>&nbsp;</p>
	  <table width="1138" border="0">
	    <tbody>
	      <tr>
	        <th width="115" height="66" scope="col"><h6>Ativa</h6>
              <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" />
            <label></label></th>
	        <th width="149" scope="col"><h6>Inativa</h6>
	          <input type="radio"  name="RadioGroup1" value="2" id="RadioGroup1_1" />
            <p></p></th>
	        <th width="860" scope="col"><p></th>
          </tr>
        </tbody>
      </table>
	  <h6>&nbsp;</h6>
		<h6><em>Informações Opicionais</em></h6>
      <label for="label16"></label>
        <label></label>
        <p></p>
        <p><em>
          <input name="OBSER" type="text" class="Leandro" id="OBSER" value="<?php echo $infor; ?>" size="130" />
        </em></p>
		<p></p>
	    <p><em>
        <input type="submit" name="Salvar" id="Salvar" value="Novo/Alterar" />
        <input type="submit" name="pro" id="pro" value="Próximo " />
        <input type="submit" name="nex" id="nex" value="Anterior" />
        <?php
	
if(isset($_POST['Salvar'])) 
  	{			
			#$row = 0;
			#$id = 0;
			#$resultado = mysql_query("SELECT MAX(id) FROM `forne_terc` where 1");
			#$row = mysql_fetch_array($resultado);
			#$id = $row[0] + 1;
		
		$sit01 = $_POST['RadioGroup1'];
		$sit02 = $_POST['RadioGroup2'];
		$cnpj= $_POST['CNPJ'];
		$empr  = $_POST['empr'];
		$tel = $_POST['tel'];
		$contato  = $_POST['cont'];
		$cel = $_POST['cel'];
		$serv = $_POST['srv'];
		$cep  = $_POST['cep'];
		$bair= $_POST['bai'];
		$cid= $_POST['cid'];
		$ende= $_POST['ende'];
		if(empty($sit01)){$situa = $_POST['RadioGroup2'];}
		if(empty($sit02)){$situa = $_POST['RadioGroup1'];}
		if(empty($sit01) && empty($sit02)){$situa = 1;$_POST['RadioGroup2'] = 0;$_POST['RadioGroup1'] = 1;}
		$infor = $_POST['OBSER'];
		$id = $_POST['txtid'];	
		if($id == ""){ $id= 0;}
		if($nivel <> 2){
				echo "Voce nao tem permissao de salvar ou alterar dados!!!";
		}
		else
		{
			if (!is_numeric($cnpj)){
			     echo "O campo cnpj precisa ser preenchido!!!1";
			}else{
				$resposta = $itens-> adicionar_forn($cnpj,$empr,$tel,$contato,$cel,$serv,$cep,$ende,$bair,$cid,$infor,$situa,$id);
			}
		}
	}
	?>
        </em></p>
	    <p><em>
        <label for="label2"></label>
        </em>
	      <label> Empresa :
	        <select name="pes" id="pes">
	          <?php
      $sql = mysql_query("SELECT emp FROM forne_terc order by emp asc");
      
	  while($monta = mysql_fetch_assoc($sql))
	  {
         echo '<option value="'.$monta['emp'].'">'.$monta['emp'].'</option>';
      }
	 ?>
            </select>
          </label>
	      <label></label>
	      <input type="submit" name="LOC" id="LOC" value="Buscar" />
	      <input type="submit" name="visual" id="visual" value="Visualizar todos" />
	      <label for="Salvar xls"></label>
	      <input type="submit" name="impri" id="impri" value="Del reg." disabled="true"/>
	      <label> Cod_Forn:
	        <input name="txtid" type="text" id="txtid" value="<?php echo $id_for; ?>" size="4" maxlength="4" readonly="True" />
          </label>
	      <em>
          <?php
 if(isset($_POST['impri'])) 
  			{
			if($nivel <> 2){
				echo "Voce nao tem permissao de excluir dados!!!";
		}
		else
		{
			$id = $_POST['txtid'];
			$resposta = $itens-> delete_forn($id);
		}
			}
       if(isset($_POST['visual'])) 
  			{
				$resposta = $itens-> lista($campo,$busca,$id);
				}
			 if(isset($_POST['Salve'])) 
  				{
				$descri= $_POST['pes'];
				switch ($descri) 
					{
    				case 0:
       					$campo = "id";
        			break;
					}
					$_SESSION['exec'] = $_POST['txtloc'];
					$_SESSION['pesq'] = $campo;
					#header('Location: relatorio.php');	
   		}
?>
        </em></p>
	    <div class="alert alert-primary btn-sm" role="alert">
	      <h5 align="left"><span class="style6">Registros</span></h5>
        <strong></strong></div>
	    <p><br />
        </p>
	    <label>Informações encontradas:</label>
	    &nbsp;
	    </p>
	    <p><em>
        <label for="DEP"></label>
        <label for="label2"></label>
        </em><em>
        <label for="RESP"></label>
        <label for="label2"></label>  
        <label for="OBSER"></label>
        <label for="OBSER"><br />
        </label>
        </em></p>
  </form>
</div>
</body>
</html>