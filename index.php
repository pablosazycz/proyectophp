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
	<link rel="icon" href="img/cancharedonda.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<title>HaT-Trick</title>
</head>

<body>
	<?php menu(); ?>

	<div class="container-fluid">
		<h1 class="fst-italic alert alert-light text-center">Planifica tu próximno partido!</h1>
	</div>

	<div class="row" id="card">
		<div class="col-4"></div>
		<div class=" col-4 card opacity-75 text-bg-dark shadow-lg rounded">
			<h5 class="card-header">Featured</h5>
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-primary container" data-bs-toggle="modal" data-bs-target="#login">
							Apreta para iniciar sesion
						</button>
					</div>
					<div class="col">
						<button type="button" class="btn btn-success container " data-bs-toggle="modal" data-bs-target="#register">
							Apreta para Registrarte
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-4"></div>
	</div>






	<!-- 	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 border opacity-75 text-bg-dark shadow-lg rounded">
			<form class="" method="POST">
				<div class="mb-3 pt-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">Ingrese el mail con el cual se registro.</div>
				</div>
				<div class="mb-3">
					<label for="pass" class="form-label">Password</label>
					<input type="password" class="form-control" id="pass">
					<div id="passHelp" class="form-text">No comparta su contraseña con nadie.</div>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="check1">
					<label class="form-check-label" for="check1">Recuerdame</label>
				</div>
				<button type="submit" class="btn btn-primary container mb-3">Iniciar Sesion!</button>
			</form>
		</div>
		<div class="col-4"></div>
	</div>
	<br> -->


	<div class="modal fade " id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-bg-dark shadow-lg rounded">
				<div class="row">			
				<div class="modal-header text-end">
					<h1 class="modal-title fs-5" id="loginLabel">Inicia Sesion!</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="opacity-75 text-bg-dark shadow-lg rounded">
						<form class="" method="POST">
							<div class="mb-3 pt-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp">
								<div id="emailHelp" class="form-text">Ingrese el mail con el cual se registro.</div>
							</div>
							<div class="mb-3">
								<label for="pass" class="form-label">Password</label>
								<input type="password" class="form-control" id="pass">
								<div id="passHelp" class="form-text">No comparta su contraseña con nadie.</div>
							</div>
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="check1">
								<label class="form-check-label" for="check1">Recuerdame</label>
							</div>
							<button type="submit" class="btn btn-primary container mb-3">Iniciar Sesion!</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>








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