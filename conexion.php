<?php
function conectar(){
    $hostname_localhost ="68.70.164.26";
	$database_localhost ="polizona_57";
	$username_localhost ="polizona_57";
	$password_localhost ="Calvillo-57";
    $conexionA = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
    return $conexionA;
}
?>