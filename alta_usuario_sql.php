<?php
    // Conexión al servidor
    include("includes/conexion.php");

    // Buscar los datos enviados al servidor.
    $p_usuario = $_POST['usuario'];
    $p_clave = $_POST['clave'];
    $p_rol = $_POST['rol'];

    // Verifico si el usuario ya existe.
    $consulta1 = "select count(distinct usuario) as nuevo from usuario where usuario = '$p_usuario' ";

    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a = mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    };    

    // Estructura de decisión.
    if($existe==1){
        // Modifico el mensaje y vuelvo al formulario.
        header("Location: alta_usuario.php?mensaje=uno");
    }else{
        // El usuario a cargar no existe, le permito agregarlo.
        $alta = "insert into usuario values('$p_usuario','$p_clave','$p_rol')";
        $resultado_alta = mysqli_query($conexion,$alta);
        header("Location: abm.php");
    }

    

?>