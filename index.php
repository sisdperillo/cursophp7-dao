<?php

require_once("config.php");


$usuario = new Usuario();

$id=1;

$usuario->loadById($id);

echo $usuario;
