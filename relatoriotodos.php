<?php
require_once("dompdf/dompdf_config.inc.php");
require("./conectar.php");
require("./class/class.cst.php");
$ICB = new cst;
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatorio</title>
</head>
<body>
<?php
$busca  = $_SESSION['exec'];
$campo= $_SESSION['pesq'];
$nivel = $_SESSION['nivel'];
$responsavel=$ICB->excel($campo,$busca);
header("Content-type: application/vnd.ms-excel");   
header("Content-Disposition: attachment; filename=rel.xls");
header("Pragma: no-cache");
exit;
?>
</body>
</html>