<!doctype html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta de usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/movistar.png"/>
    <?php
        include('includes/conexion.php');
        include('includes/menu.php');
      $mensaje ='Ingrese los nuevos datos';
      if(isset($_GET['mensaje'])){
        if($_GET['mensaje']=='uno'){$mensaje='El usuario ya existe en la base';}
      }
    ?>
  </head>
  <body class="container-fluid">


    <div class="alert alert-primary text-center" role="alert">
      <h3 class="fst-italic">Alta de usuario en la base de datossss.</h3>
    </div>
    <br><br>

    <!-- Formulario -->
    <div class="container">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4">
            <form action="alta_usuario_sql.php" method="POST">
              <div class="form-group">
                <label for="usuario" style="color:green" class="font-weight-bold">Ingrese el usuario.</label>
                <input type="text" id="usuario" name="usuario" placeholder="Escriba el usuario" class="form-control">
              </div>
              <br>
              <div class="form-group">
                <label for="clave" style="color:green" class="font-weight-bold">Ingrese la clave.</label>
                <input type="text" id="clave" name="clave" placeholder="Escriba la clave" class="form-control">
              </div> 
              <br>
              <div class="form-group">
                <label for="rol" style="color:green" class="font-weight-bold">Ingrese el perfil.</label>
                <input type="text" id="rol" name="rol" placeholder="Escriba el perfil" class="form-control">
              </div> 
              <br>
              <button type="submit" class="btn btn-success container-fluid">Cargar registro</button>
              <br><br>
              <?php echo $mensaje; ?>                            
            </form>
          </div>
          <div class="col-4"></div>
        </div>
    </div>

    
  </body>
</html>
<script src="js/bootstrap.bundle.min.js"></script>