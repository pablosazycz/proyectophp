<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/cancharedonda.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <title>HaT-Trick</title>
    <?php
    include('includes/menu.php');
    include('includes/conexion.php');

    $a = 'administrador';
    $b = 'analista';
    //paso 1) Datos de conexion.
    $usuario = 'root';
    $clave = '';
    $servidor = 'localhost';
    $basededatos = 'dbhat';

    //creamos la conexion
    $conexion = mysqli_connect($servidor, $usuario, $clave)
        or die('Mensaje de error');

    // paso 3) conectamos con bd
    $db = mysqli_select_db($conexion, $basededatos);

    //paso 4) creamos la consulta de sql
    $consulta = 'select * from usuario';
    $consulta1 = "select count(distinct usuario) as usuarios from usuario";
    $consulta2 = "select count(distinct usuario) as admin from usuario where ROL='$a'";
    $consulta3 = "select count(distinct usuario) as analistas from usuario where ROL='$b'";
    $consulta4 = "select * from usuario";

    // paso 5) ejecutar la consulta de sql.
    $resultado = mysqli_query($conexion, $consulta);




    //extraer el resultado de la query

    $resultado1 = mysqli_query($conexion, $consulta1);
    while ($fila = mysqli_fetch_assoc($resultado1)) {
        $cantidad_usuario = $fila['usuarios'];
    }

    $resultado2 = mysqli_query($conexion, $consulta2);
    while ($fila = mysqli_fetch_assoc($resultado2)) {
        $cantidad_admin = $fila['admin'];
    }

    $resultado3 = mysqli_query($conexion, $consulta3);
    while ($fila = mysqli_fetch_assoc($resultado3)) {
        $analista = $fila['analistas'];
    }

    $resultado4 = mysqli_query($conexion, $consulta4);
    // 

    //paso 6 cerrar la conexion
    mysqli_close($conexion);


    ?>
</head>

<body>

    <?php menu(); ?>

    <div class="container-fluid">
        <h1 class="fst-italic alert alert-light text-center">Planifica tu próximno partido!</h1>
    </div>

    <br><br>

    <!-- fila 1 -->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <button class=" btn btn-primary container-fluid" type="button">
                    Usuarios: <?php echo $cantidad_usuario; ?>
                </button>
            </div>
            <div class="col-3">
                <button class=" btn btn-primary container-fluid" type="button">
                    Administrador: <?php echo $cantidad_admin; ?>
                </button>
            </div>
            <div class="col-3">
                <button class=" btn btn-primary container-fluid" type="button">
                    Analistas: <?php echo $analista; ?>
                </button>
            </div>
            <div class="col-3">
                <button class=" btn btn-danger container-fluid" type="button">Valores</button>
            </div>

        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover table-dark">
                    <thead>
                        <tr>
                            <td><b>Usuario</b></td>
                            <td><b>Clave</b></td>
                            <td><b>Perfil</b></td>
                            <td><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        while ($columna = mysqli_fetch_array($resultado4)) {
                        ?>
                            <tr>
                                <td><b> <?php echo $columna['USUARIO'] ?></b></td>
                                <td><b> <?php echo $columna['CLAVE'] ?></b></td>
                                <td><b> <?php echo $columna['ROL'] ?></b></td>
                                <td>
                                    <a href="#"> Editar | </a>
                                    <a href="#"> Eliminar </a>
                                </td>
                            </tr>

                        <?php
                         }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-2"></div>

    </div>


</body>

</html>