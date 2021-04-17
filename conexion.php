<?php
$host='localhost';
$db='ecommerce';
$user='Jara';
$pass='123456';

$conexion=new mysqli($host,$user,$pass,$db);
if($conexion->connect_errno){
    echo "El sitio web está experimentado problemas";
}
?>