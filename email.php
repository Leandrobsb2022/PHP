<html>
<head>
  <title>Enviando E-mail com PHP - DevMedia</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<style type="text/css">
body{
  font-size:12px;
  font-family:Verdana, Geneva, sans-serif;
}
#contato_form{
  width:500px;
  min-height:175px;
  color:#999;
  margin:auto;
}
.asteristico{
  color:#F00;
}
</style>
<body>
    <div id="contato_form">
      <form action="enviar.php" name="form_contato" method="post" >
      <p class="titulo">Formulário <small class="asteristico">*Campos Obrigatorios</small></p>
        <table width="453" align="center">
          <tr>
            <td width="80">Nome:<sup class="asteristico">*</sup></td>
            <td width="310">              
              <div align="left">
                <input type="text" name="nome" maxlength="40" />            
              </div></td>
          </tr>
          <tr>
            <td>E-mail:<sup class="asteristico">*</sup></td>
            <td>              
              <div align="left">
                <input type="email" name="email" maxlength="30" />            
              </div></td>
          </tr>
          <tr>
            <td>Telefone:<sup class="asteristico">*</sup></td>
            <td>              
              <div align="left">
                <input type="text" name="telefone" maxlength="14" />            
              </div></td>
          </tr>
          <tr>
            <td>Opções:<sup class="asteristico">*</sup></td>
            <td>
              
              <div align="left">
                  <select name="escolhas" class="campo_input">
                    <option value="Opção 1">Opção 1</option>
                    <option value="Opção 2">Opção 2</option>
                  </select>
              </div></td>
          </tr>
          <tr>
            <td>Mensagem:<sup class="asteristico">*</sup></td>
            <td>
              
              <div align="left">
                  <textarea name="msg" cols="55" rows="5"></textarea>
              </div></td>
          </tr>
          <tr align="right";>
          <td colspan="2">
              <input type="reset" class="campo_submit" value="Limpar" />
              <input type="submit" class="campo_submit" value="Enviar" />            </td>
          </tr>
          <tr>
            <td colspan="2" align="right"><small class="asteristico">* Campos obrigatorios</small></td>
          </tr>
        </table>
      </form>
    </div>
</body>
</html>