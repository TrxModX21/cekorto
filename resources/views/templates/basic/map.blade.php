@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2">
                <div class="card-header bg--primary">
                    <h5 class="card-title text-white pt-2">@lang('Map of hospitals and clinics in Banda Aceh')</h5>
                </div>

                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/leaflet/leaflet.css') }}">
@endpush

@push('style')
    <style>
        #map {
            height: 60vh;
            width: 100%;
        }

        .leaflet-control-layers {
            background: white;
            padding: 6px;
            border-radius: 4px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4);
        }

        .leaflet-control-layers-toggle {
            background-color: white;
        }

        .leaflet-control-layers-expanded {
            padding: 6px 10px 6px 6px;
            color: #333;
            background: #fff;
        }

        .leaflet-control-layers label {
            margin-bottom: 5px;
            font-weight: normal;
        }
    </style>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/global/leaflet/leaflet.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            const map = L.map('map', {
                center: [5.5483, 95.3238],
                zoom: 13,
                maxBounds: [
                    [5.4483, 95.2238], // Southwest coordinates
                    [5.6483, 95.4238] // Northeast coordinates
                ],
                maxBoundsViscosity: 1.0
            }).setView([5.5483, 95.3238], 13);

            // Layer OpenStreetMap (peta dasar)
            const osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                minZoom: 13,
                maxZoom: 20
            });

            // Layer Satelit (menggunakan ESRI Satellite)
            const satelliteLayer = L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
                    minZoom: 13,
                    maxZoom: 20
                }
            );

            // Layer Labels untuk tampilan hybrid
            const labelsLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                minZoom: 13,
                maxZoom: 20,
                opacity: 0.5
            });

            // Buat grup layer untuk tampilan hybrid
            const hybridLayer = L.layerGroup([satelliteLayer, labelsLayer]);

            // Buat objek base maps untuk control layer
            const baseMaps = {
                "Standar": osmLayer,
                "Satelite": satelliteLayer,
                "Hybrid": hybridLayer
            };

            // Tambahkan control layer ke map
            L.control.layers(baseMaps).addTo(map);

            // Set default layer
            osmLayer.addTo(map);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                minZoom: 13, // Batasan minimum zoom
                maxZoom: 20 // Batasan maximum zoom
            }).addTo(map);

            const markers = L.layerGroup().addTo(map);

            // Fungsi untuk membuat URL Google Maps
            function createGoogleMapsUrl(lat, lng, name) {
                // Format URL untuk membuka di aplikasi Google Maps
                return `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}&destination_name=${encodeURIComponent(name)}`;
            }

            async function loadHospitals() {
                const bounds = map.getBounds();

                try {
                    const response = await fetch(
                        `/api/hospitals?north=${bounds.getNorth()}&south=${bounds.getSouth()}&east=${bounds.getEast()}&west=${bounds.getWest()}`
                    );
                    const hospitals = await response.json();

                    // Hapus marker yang ada
                    markers.clearLayers();

                    // Tambah marker baru
                    hospitals.forEach(hospital => {
                        // Buat konten popup dengan tombol navigasi
                        const popupContent = `
                    <div style="min-width: 200px;">
                        <h4 style="margin: 0 0 8px 0;">${hospital.name}</h4>
                        <div style="margin-bottom: 8px;">
                            <strong>Koordinat:</strong><br>
                            ${hospital.latitude}, ${hospital.longitude}
                        </div>
                        <a href="${createGoogleMapsUrl(hospital.latitude, hospital.longitude, hospital.name)}" 
                        target="_blank" 
                        style="display: inline-block; 
                                background-color: #4285f4; 
                                color: white; 
                                padding: 8px 12px; 
                                text-decoration: none; 
                                border-radius: 4px; 
                                font-size: 14px;">
                            <i class="las la-directions" 
                                style="height: 16px; 
                                        vertical-align: middle; 
                                        margin-right: 5px;">
                            @lang('Open in Google Maps')
                        </a>
                    </div>`;

                        const marker = L.marker([hospital.latitude, hospital.longitude])
                            .bindPopup(popupContent);
                        markers.addLayer(marker);
                    });
                } catch (error) {
                    console.error('Error loading hospitals:', error);
                }
            }

            // Load hospitals saat map bergerak
            map.on('moveend', loadHospitals);

            loadHospitals();
        })(jQuery);
    </script>
@endpush
