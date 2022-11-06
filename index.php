<?php
include('includes/menu.php');
$nombre = '';
$apellido = '';

function saludo($nom, $ape)
{
	$nom = $_POST["nom"];
	$ape = $_POST["ape"];
	return $nom . ' ' . $ape;
}
$fecha_nac = null;
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

/* function dias_pasados($fecha_inicial, $fecha_final)
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

 */
$ip = $_SERVER['REMOTE_ADDR'];
$apiKey = 'dae74d852e3b4dd7bf474a4f63634cac';
$location = get_geolocation($apiKey, $ip);
$decodedLocation = json_decode($location, true);


function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
{
	$url = "https://api.ipgeolocation.io/ipgeo?apiKey=" . $apiKey . "&ip=" . $ip . "&lang=" . $lang . "&fields=" . $fields . "&excludes=" . $excludes;
	$cURL = curl_init();

	curl_setopt($cURL, CURLOPT_URL, $url);
	curl_setopt($cURL, CURLOPT_HTTPGET, true);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json',
		'User-Agent: ' . $_SERVER['HTTP_USER_AGENT']
	));

	return curl_exec($cURL);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="img/movistar.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<title>Pagina Telefonica</title>
</head>

<body>
 <?php menu(); ?>
 
	<div class="container-fluid">
		<h1 class="fst-italic alert alert-success text-center">Fundacion Telefónica</h1>
	</div>

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6 border">
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
		<div class="col-3"></div>
	</div>
	<br>


	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Bienvenido!</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Hola <?php echo saludo($nombre, $apellido) ?> gracias por visitarnos!
					Vas a cumplir <?php echo anios($fecha_nac); ?>!
					Nos estas visitado de:
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<h3 class="text-center">Tu Ip es: <?php echo $decodedLocation['ip'] ?> </h3>
							</div>
							<br>
							<hr>
							<div class="col-12">
								<table class="table text-center">
									<tr>
										<th>Continente</th>
										<td><?php echo $decodedLocation['continent_name'] ?></td>
									</tr>
									<tr>
										<th>Pais</th>
										<td><?php echo $decodedLocation['country_name'] ?></td>
									</tr>
									<tr>
										<th>Provincia</th>
										<td><?php echo $decodedLocation['state_prov'] ?></td>
									</tr>
									<tr>
										<th>Ciudad</th>
										<td><?php echo $decodedLocation['city'] ?></td>
									</tr>
									<tr>
										<th>Latitud</th>
										<td><?php echo $decodedLocation['latitude'] ?></td>
									</tr>
									<tr>
										<th>Longitud</th>
										<td><?php echo $decodedLocation['longitude'] ?></td>
									</tr>
									<th>Bandera</th>
									<td> <img src="<?php echo $decodedLocation['country_flag'] ?>" alt="" srcset=""> </td>
									</tr>
									<th>Te conectas con</th>
									<td> <?php echo $decodedLocation['isp'] ?> </td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>