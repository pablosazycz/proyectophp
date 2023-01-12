var x = document.getElementById("geo");
	var lat;
	var long;

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);

		} else {
			x.innerHTML = "no es compatible tu navegador";
		}
	}

	function showPosition(position) {
		x.innerHTML = position.coords.latitude + "," + position.coords.longitude;

		lat = position.coords.latitude;
		long = position.coords.longitude;



		var map = L.map('map', {
			center: [-34.606862, -58.435507],
			zoom: 10,
			layers: tiles
		});
		var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			animate: true,
			watch: true,
			maxZoom: 19,

		}).addTo(map);

		var marcadorpelota = L.icon({
			iconUrl: 'img/markerpelota.png',
			//shadowUrl: 'leaf-shadow.png',
			iconSize: [64, 64], // size of the icon
			//shadowSize: [50, 64], // size of the shadow
			iconAnchor: [32.5, 64], // point of the icon which will correspond to marker's location
			//shadowAnchor: [4, 62], // the same for the shadow
			//popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
		});

		L.marker([-34.644301, -58.580676], {icon: marcadorpelota}).addTo(map).bindPopup("Casa");;





		L.Control.geocoder().addTo(map);

		var lc = L.control
			.locate({

				flyTo: true,
				drawCircle: true,
				position: "topright",
				showCompass: true,
				strings: {
					title: "Ubicacion"
				},
				locateOptions: {
					enableHighAccuracy: true,
					maxZoom: 15
				},

			})
			.addTo(map);


		lc.start();


		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(map);
		}

		map.on('click', onMapClick);

	}