<?php
$usuario = $_POST ["user"];
$contrasenia = $_POST ["pass"];

$confuser= "admin";
$confpass= "1234";

if ($usuario == $confuser && $contrasenia == $confpass) {
  header ( "location:user-properties.html");
}
else {
    header ( "location:404.html");
    }

?>