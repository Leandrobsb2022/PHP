<?php
require( "./class/class.catedral.php" );
require( "./class/class.cst.php" );
require( "./class/class.tonner.php" );
require( "./conectar.php" );
$ICB = new cst;
$to = new tonner;
$ip = "";
$marca = "";
$modelo = "";
$local = "";
$campo = "";
$busca = "";
$quant01=0;
$saida = 0;
$titulo= "";
$ton = "";
$model = "";
$quant = 0;
$unid = "";
$delete = 0;

$cod = "";
$setores = "";
$equipa = "";
$dt_ent = "";
$dt_sai = "";
$col = "";
$desti = "";
$resp_sai = "";
$tip = "";
$obs = "";

 $mod = "";
 $local_="";

session_start();
$_SESSION[ 'exec' ] = "";
$_SESSION[ 'pesq' ] = "";
#$_SESSION['utilizador'] = "ICB";
#$_SESSION['nivel'] =1;
$nome = $_SESSION[ 'utilizador' ];
$nivel = $_SESSION[ 'nivel' ];
?>
<!DOCTYPE html>
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
</head>
<body background="">
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
  </p>
    <form id="form1" name="form1" method="post" action="" >
  <table width="1560" border="1">
  </table>
    <p><em>
      <label for="label2"></label>
    </em>
      <input name="voltar" type="submit" class="btn btn-info btn-sm" id="voltar" formaction="inicial.php" value="VOLTAR"  align="right"/>
    </p>
    <table width="900" border="0">
      <tbody>
        <tr>
          <th width="856" scope="row"><div class="alert alert-primary btn-sm" role="alert">
            <h5 align="left">IMPRESSORA </h5>
          </div></th>
          <td width="50">&nbsp;</td>
        </tr>
      </tbody>
    </table
      
    <p><h6>IP
              :
              <input name="IP" type="text" id="IP" size="15" maxlength="15" value="<?php echo $ip; ?>"/>
    Marca:
              <input name="marca" type="text" class="Leandro" id="marca" size="15" maxlength="15" value="<?php echo $marca; ?>"/>
		
		Modelo:
              <input name="modelo" type="text" class="Leandro" id="modelo" size="20" maxlength="30" value="<?php echo $modelo; ?>"/>
            Local
            :
            <input name="LOC2" type="text" class="Leandro" id="LOC2" size="15" maxlength="15" value="<?php echo $local; ?>"/>
      </h6></p>
    <p><em>
      <label for="IP"></label>
    </em>
      <input type="submit" name="Salvar" id="Salvar" class="btn btn-secondary btn-sm" value="Nova impressora" />
      <input type="submit" name="del" id="del"  class="btn btn-danger btn-sm" value="Delete Impressora por IP" />
      <input name="imp" type="submit" onClick="printDiv(print)" class="btn btn-secondary btn-sm" id="impressao" form="form1" formaction="imprimir.php" formtarget="_blank" value="Imprimir lista" />
    </p>
    <span class="align-content-md-left">
    <?php
		
        //Salvar dados impressora
      if ( isset( $_POST[ 'Salvar' ] ) ) {
          $ip = $_POST[ 'IP' ];
          $marca = $_POST[ 'marca' ];
          $modelo = $_POST[ 'modelo' ];
          $local = $_POST[ 'LOC2' ];
          #echo "<label>{$ip}{$marca}{$modelo}{$local}</label>" ;
          if ( $nivel <> 2 ) {
              echo "<h4>Voce nao tem permissao de salvar ou alterar dados!!!</h4>";
          } else {
              $resposta = $ICB->adicionar_impr( $ip, $marca, $modelo, $local );
          }
      }
        //pesquisa por ip da impressora
            if ( isset( $_POST[ 'pesquisa_imp' ] ) ) {
                $busca = $_POST[ 'pes' ];
                $campo = "loc";
                if ( ( $nivel == 2 ) ) {
                    $respo = $ICB->lista_impr( $campo, $busca, $nivel );
                    $query = mysql_query( "SELECT * FROM `impr` WHERE  $campo='$busca' " );
                    if ( mysql_num_rows( $query ) ) {
                        while ( $array = mysql_fetch_row( $query ) ) {
                            $ip = $array[ 0 ];
                            $marca = $array[ 2 ];
                            $modelo = $array[ 3 ];
                            $local = $array[ 1 ];
                        }
                    }
                }
            }
      if ( isset( $_POST[ 'del' ] ) ) {
          $ip = $_POST[ 'IP' ];
          if ( $nivel <> 2 ) {
              echo "<h4>Voce nao tem permissao de excluir dados!!!</h4>";
          } else {
              $resposta = $ICB->delete_impr( $ip );
          }
      }
      ?>
    </span>
        
    <table width="863" border="0">
      <tr>
        <th scope="col" align="left" class=""> <h6>Departamento</h6> </th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th width="115" scope="col"><div align="left">
            <select name="pes" id="pes" value="Departamento">
              <option ><?php echo $local; ?></option>
              <?php
              $sql = mysql_query( "select DISTINCT loc FROM `impr` WHERE 1" );
              while ( $monta = mysql_fetch_assoc( $sql ) ) {
                  echo '<option value="' . $monta[ 'loc' ] . '">' . $monta[ 'loc' ] . '</option>';
              }

              ?>
            </select>
          </div></th>
        <th width="118" scope="col"> <div align="left">
            <input type="submit" name="pesquisa_imp" id="pesquisa_imp" class="btn btn-secondary btn-sm" value="Localizar por Dep" />
          </div></th>
        <th width="137" scope="col"><div align="left"></div></th>
        <th width="350" scope="col"> <div align="left"></div></th>
        <th width="9" scope="col"><div align="left"></div></th>
        <th width="108" scope="col">&nbsp;</th>
      </tr>
    </table>
    <table width="1559" border="1">
      <tbody>
      </tbody>
    </table>
    <p><em>
      <label for="NOME PC"></label>
    </em>
      <?php
          
          if ( isset( $_POST[ 'busca' ] ) ) {
                $ton = $_POST[ 'cmb' ];
                $query = mysql_query( "SELECT * FROM `impr_tonner` WHERE  ton='$ton' " );
                if ( mysql_num_rows( $query ) ) {
                    while ( $array = mysql_fetch_row( $query ) ) {
                        $ton = $array[ 0 ];
                        $model = $array[ 1 ];
                        $quant = $array[ 2 ];
                        $_SESSION['control']=$array[ 2 ];
                    }
                } else {
                    echo "<h5>nenhum toner encontrado!</h5>";
                }
            }
            ?>
    <table width="1157" height="293" border="0" align="left">
      <tr>
        <th colspan="2" scope="col"><div class="alert alert-primary btn-sm" role="alert">
          <h5 align="left">TONER</h5>
        </div></th>
      </tr>
      <tr>
        <th width="667" height="57" align="leFt" scope="col"><h6>Tonner:
          <input name="toner" type="text" id="toner" size="12" maxlength="20" value="<?php echo "$ton"; ?>"/>
          Modelo:
          <input name="model" type="text" id="model" size="30" maxlength="40" value="<?php echo "$model"; ?>" />
          Em estoque:
          <?php
            if ( $nivel <> 2 ) {
              echo "<input name=quant type=text id=quant size=2 maxlength=2 readonly=readonly onkeypress=return onlynumber() value=$quant/>";
          } else {
              echo "<input name=quant type=text id=quant size=2 maxlength=2  onkeypress=return onlynumber() value= $quant />";
          }  
          ?>
          <input name="quant2" type="hidden" id="quant2" size="2" maxlength="2" onKeyPress="return onlynumber();" value="<?php echo "$saida"; ?>" />
        </h6></th>
        <th width="480" align="left" scope="col"><input name="tonner" type="submit" id="tonner" class="btn btn-secondary btn-sm" value="Adic.Alter - Toner" /></th>
      </tr>
      <tr>
        <th colspan="2" scope="col"><p>
        <h6>Toner:</h6>
          <select name="cmb" id="cmb">
            <option ><?php echo $ton; ?></option>
            <?php
              $sql = mysql_query( "SELECT ton FROM `impr_tonner` WHERE 1" );
              while ( $monta = mysql_fetch_assoc( $sql ) ) {
                  echo '<option value="' . $monta[ 'ton' ] . '">' . $monta[ 'ton' ] . '</option>';
              }
              ?>
          </select>
          <input type="submit" name="busca" id="busca" class="btn btn-secondary btn-sm" value="Localizar Toner" />
          <input type="submit" name="visua" id="visua" class="btn btn-secondary btn-sm" onClick="" value="Visualizar Est. Toner" />
          <input type="submit" name="media" id="media" class="btn btn-secondary btn-sm" onClick="" value="Visualizar média" />
        </p></th>
      </tr>
      <tr>
      </tr>
      <tr>
        <th colspan="2" scope="col">
		  <p>
    <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#adm" onclick="" aria-expanded="false" aria-controls="collapseExample">
		VER INFORMAÇÕES
	   </button>
    <span class="align-content-md-left">
    </span></p>	
        </th>
      </tr>
    </table>
<div class="collapse" id="adm" onClick="">
  <div class="card card-body" onClick="">
	<div class="alert alert-info btn-sm" role="alert">
    <h6 align="left">DADOS - PARA VISUALIZAR CLICK EM TONER OU MEDIA</h6>
		 <?php
        if ( isset( $_POST[ 'visua' ] ) ) {
            $busca = "";
            $resposta = $to->lista_tonner( $busca );
            $resposta = $to->LEG();
			$titulo=1;
        }
        if ( isset( $_POST[ 'tonner' ] ) ) {
            if ( $nivel <> 2 ) {
                echo "<h5>Voce nao tem permissao de adicionar ou alterar dados!!!</h5>";
            } else {
                $ton = $_POST[ 'toner' ];
                $model = $_POST[ 'model' ];
                $quant = $_POST[ 'quant' ] - $_POST[ 'quant2' ];;
                $respo = $to->adicionar_tonner( $ton, $model, $quant );
                //$respo1 = $to->tonner_media( $quant01, $quant, $ton, $unid );
            }
        }
         if ( isset( $_POST[ 'media' ] ) ) {
		  $titulo=1;
          $resposta = $to->visualizar_media(); 
         }
		?>
  <p>
    <p><br>
    </p>
    <table width="1560" border="1">
      <tbody>
      </tbody>
    </table>
    <div></div>
      <div align="left"><em>
      <label for="DEP"></label>
      <label for="label2"></label>
      </em><em>
      <label for="RESP"></label>
      <label for="label2"></label>
      <label for="OBSER"></label>
      </em>      </div>
  </form>
</div>
<script>
	function MyClick() {
	var variaveljs = confirm("deseja realmente deletar?")
	$delete = variaveljs
	}
    function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
    function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('about:blank');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
function printDiv(divID)  
    {
        var conteudo = document.getElementById(divID).innerHTML;  
        var win = window.open();  
        win.document.write(conteudo);  
        win.print();  
        win.close();//Fecha após a impressão.  
    } 
</script>
    
</body>
</html>