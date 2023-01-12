<?php
// Conexión al servidor
require('includes/conexion.php');

// Obtener los datos del registro a modificar.
$p_usuario = $_POST['usuario'];
$p_clave = $_POST['clave'];
$p_rol = $_POST['rol'];
$p_boton = $_POST['boton'];

if($p_boton) {
    header("Location: abm.php");
} else {
    $modificar = "UPDATE usuario SET usuario = '$p_usuario', clave= '$p_clave', rol='$p_rol' WHERE usuario = '$p_usuario'";
    $resultado = mysqli_query($conexion, $modificar);
    header("Location: abm.php");
    
}
?>