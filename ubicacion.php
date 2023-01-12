<?php include('includes/menu.php');?>

<!DOCTYPE html>
<html lang="es">

<head>
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="img/cancharedonda.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

	<title>HaT-Trick</title>
</head>

<body  onload="getLocation()">
	<?php menu(); ?>

	<div class="container-fluid">
		<h1 id="titu" class="titu">Planifica tu próximo partido!</h1>
	</div>

	<button type="button" class="btn btn-primary container" data-bs-toggle="modal" data-bs-target="#exampleModal">GPS php</button>

	<p class="text-bg-dark" id="geo"></p>

	<div class="row border">
	<div class="col-3  border">
		Las canchas de futbol en mapa son:
	</div>
	<div class="col-8 border">
	<div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"></div>
	</div>
	<div class="col-1 border"></div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Bienvenido!</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

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




<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script src="js/ubicacion.js"> </script>	
</body>
</html>
