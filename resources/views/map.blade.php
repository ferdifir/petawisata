<!DOCTYPE html>
<html lang="en">

<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pilih Lokasi</title>

	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

	<style>
		html,
		body {
			height: 100%;
			margin: 0;
		}

		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>


</head>

<body>

	<div id="map" style="width: 100%; height: 100%;"></div>
	<script>
		const map = L.map('map').setView([-7.859900, 113.306272], 11.25);

		const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		}).addTo(map);

		function onMapClick(e) {
			const {
				lat,
				lng
			} = e.latlng;
			const popup = L.popup()
				.setLatLng([lat, lng])
				.openOn(map);
			popup.setLatLng(e.latlng)
				.setContent(`Koordinat yang dipilih:<br>Latitude: ${lat}<br>Longitude: ${lng}`)
				.openOn(map);
			setTimeout(() => {
				localStorage.setItem('latitude', lat);
				localStorage.setItem('longitude', lng);
				history.back();
			}, 1000);
		}

		map.on('click', onMapClick);
	</script>

</body>

</html>