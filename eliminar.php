<?php

$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tienda_ropa_p7");

$id = $_GET['id'];

$consulta = "DELETE FROM `ropa` WHERE `id`=$id";

$respuesta = mysqli_query($conexion, $consulta);

mysqli_query($conexion,$consulta);

header('location: index.html');
?>
