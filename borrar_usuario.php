<?php
include('includes/conexion.php');

$usuario=$_GET['usuario'];

$sql= "DELETE FROM usuario where usuario = '$usuario' ";
$resultado=mysqli_query($conexion,$sql);
 header("Location: abm.php");

?>