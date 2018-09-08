<?php 

require_once("DAO/config.php");
require_once("DAO/class/sql.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);


?>