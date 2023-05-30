@extends('layout.app')

@section('content')
<!-- <div id="map" class="map-container"></div>
<div>
    <input type="checkbox" id="wisataCheckbox" checked>
    <label for="wisataCheckbox">Wisata</label>
</div>
<div>
    <input type="checkbox" id="olehOlehCheckbox" checked>
    <label for="olehOlehCheckbox">Oleh-Oleh</label>
</div> -->
<div class="map-container">
    <div id="map"></div>
    <div class="checkbox-container">
        <div>
            <input type="checkbox" id="wisataCheckbox" checked>
            <label for="wisataCheckbox" class="text-lg">Wisata</label>
        </div>
        <div>
            <input type="checkbox" id="olehOlehCheckbox" checked>
            <label for="olehOlehCheckbox" class="text-lg">Oleh-Oleh</label>
        </div>
    </div>
</div>

<script>
    const map = L.map('map').setView([-7.859900, 113.306272], 11.25);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    const wisataData = {!! json_encode($wisata) !!};
    const olehOlehData = {!! json_encode($oleh_oleh) !!};

    const wisataMarkers = [];
    const olehOlehMarkers = [];

    wisataData.forEach(w => {
        const truncatedDescription = w.description.length > 150 ? w.description.substring(0, 150) + "..." : w.description;
        const customIcon = L.icon({
            iconUrl: w.pict_url,
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
        const marker = L.marker([w.latitude, w.longitude], { icon: customIcon }).addTo(map)
            .bindPopup(`<b>${w.name}</b><br />${truncatedDescription}`).openPopup();
        wisataMarkers.push(marker);
    });

    olehOlehData.forEach(o => {
        const truncatedDescription = o.description.length > 150 ? o.description.substring(0, 150) + "..."  : o.description;
        const customIcon = L.icon({
            iconUrl: o.pict_url,
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
        const marker = L.marker([o.latitude, o.longitude], { icon: customIcon }).addTo(map)
            .bindPopup(`<b>${o.name}</b><br />${truncatedDescription}`).openPopup();
        olehOlehMarkers.push(marker);
    });

    const wisataCheckbox = document.getElementById('wisataCheckbox');
    const olehOlehCheckbox = document.getElementById('olehOlehCheckbox');

    wisataCheckbox.addEventListener('change', function() {
        if (this.checked) {
            wisataMarkers.forEach(marker => map.addLayer(marker));
        } else {
            wisataMarkers.forEach(marker => map.removeLayer(marker));
        }
    });

    olehOlehCheckbox.addEventListener('change', function() {
        if (this.checked) {
            olehOlehMarkers.forEach(marker => map.addLayer(marker));
        } else {
            olehOlehMarkers.forEach(marker => map.removeLayer(marker));
        }
    });
</script>

@endsection

