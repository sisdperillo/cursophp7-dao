<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("select * from usuario");

echo json_encode($usuarios);
