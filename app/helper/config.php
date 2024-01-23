<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "conversa";
$con = mysqli_connect($servidor, $usuario, $password) or die("Falha ao conectar no servidor");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($con, $basededatos) or die("Opps, falha ao conectar ao banco de dados!");

