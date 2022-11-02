<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<title>Pagina Telefonica</title>
</head>

<body>
	<div class="container">
		<h1 class="fst-italic alert alert-success text-center">Fundacion Telefónica</h1>
	</div>

	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 border">
			<form action="#" method="POST">
				<div class="mb-3 pt-3">
					<label id="nom" name="nom" class="form-label">Ingrese su Nombre</label>
					<input class="form-control" type="text" name="nom" id="nom" placeholder="Nombre">
				</div>
				<div class="mb-3">
					<label id="ape" name="ape" class="form-label">Ingrese su Apellido</label>
					<input class="form-control" type="text" name="ape" id="ape" placeholder="Apellido">
				</div>
				<div class="mb-3">
					<label id="fnac" name="fnac" class="form-label">Ingrese su fecha de nacimiento</label>
					<input class="form-control" type="date" name="fnac" id="fnac" value="<?php echo date("Y-m-d"); ?>">
				</div>

				<div class="mb-3">
					<button type="submit" class="container btn btn-primary">Guardar info</button>
					<button type="button" class="container mt-1 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Saludar!</button>
				</div>
			</form>
		</div>
		<div class="col-4"></div>
	</div>

	<?php
	$nombre = '';
	$apellido = '';


	



	function saludo($nom, $ape)
	{
		$nom = $_POST["nom"];
		$ape = $_POST["ape"];
		return $nom . ' ' . $ape;
	}



	function anios($nac)
	{
		$nac = new DateTime($_POST["fnac"]);
		$hoy = date_create("now");
		$hoy2 = date_add($hoy, date_interval_create_from_date_string("1 year"));
		$edad = $hoy2->diff($nac);
		return ($edad)->format('%y años');
	}

	$ingreso = date('1990-03-20');
	$salida = date('2023-03-23');

	function dias_pasados($fecha_inicial, $fecha_final)
	{

		$fecha_inicial = date_create($_POST["fnac"]);
		$hoy = date_create("now");
		$hoy2 = date_add($hoy, date_interval_create_from_date_string('1 year'));

		$edad = date_diff($hoy2, $fecha_inicial);
		$cant = date_add($fecha_inicial, date_interval_create_from_date_string('33 years'));
		$falta = date_diff($hoy, $cant);
		echo $falta->days . " days";
		echo date('Y-m-d');
		echo date("Y-m-d",time());

	}


$ip=$_SERVER['REMOTE_ADDR'];
echo $ip;

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://api.ipgeolocation.io/ipgeo?apiKey=dae74d852e3b4dd7bf474a4f63634cac&ip='.$ip);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$out=curl_exec($ch);
echo ($out);
curl_close($ch);


	?>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Bienvenido!</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Hola <?php echo saludo($nombre, $apellido) ?> gracias por visitarnos!
					Faltan <?php echo dias_pasados($salida, $ingreso) ?> días para cumplir <?php echo anios($fecha_nac); ?>!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>