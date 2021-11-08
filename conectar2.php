<?php
require("./class/class.DB.php");
# variáveis para conectar-se ao banco de dados...
$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$database = "invent_icb";
$db = new DB;
$db->conectar($host, $port, $user, $password, $database);
?>