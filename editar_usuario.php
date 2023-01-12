
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alta de usuario</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="img/movistar.png" />
  <?php
  include('includes/conexion.php');




  $usuario = $_GET['usuario'];

  $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
  $resultado = mysqli_query($conexion, $sql);
  $row = mysqli_fetch_array($resultado)


  ?>
</head>

<body class="container-fluid">

<?php require('includes/menu.php'); ?>
  <div class="alert alert-primary text-center" role="alert">
    <h3 class="fst-italic">Edicion de usuario en la base de dato.</h3>
  </div>
  <br><br>

  <!-- Formulario -->
  <div class="container">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <form action="editar.php" method="POST">
        <div class="form-group">
                <label for="usuario" style="color:green" class="font-weight-bold">Ingrese el usuario.</label>
                <input type="text"  id="usuario" name="usuario" placeholder="Escriba el usuario" class="form-control" readonly value="<?php echo $row['USUARIO']; ?>">
              </div>
              <br>
          <div class="form-group">
            <label for="clave" style="color:green" class="font-weight-bold" >Clave</label>
            <input type="text" id="clave" name="clave" placeholder="Escriba la clave" class="form-control" value="<?php echo $row['CLAVE']; ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="rol" style="color:green" class="font-weight-bold" >Rol</label>
            <input type="text" id="rol" name="rol" placeholder="Escriba el perfil" value="<?php echo $row['ROL']; ?>" class="form-control">
          </div>
          <br>
          <button type="submit" class="btn btn-success container-fluid">Cargar registro</button>
          <br><br>
          <button type="submit" class="btn btn-danger container-fluid" name='boton' value='0'>Modificar</button>
            <button type="submit" class="btn btn-success container-fluid" name= 'boton' value='1'>Cancelar</button>
        </form>
      </div>
      <div class="col-4"></div>
    </div>
  </div>


</body>

</html>
<script src="js/bootstrap.bundle.min.js"></script>