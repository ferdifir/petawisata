<!DOCTYPE html>
<html lang="en">

<head>
    <base target="_top">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ $wisata->name }} </title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        @keyframes zoomInOut {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset($wisata->pict_url) }}');
            background-size: cover;
            background-position: center;
            z-index: -1;
            animation: zoomInOut 40s infinite;
        }

        /* Card dengan efek glassmorphism */
        .card {
            position: fixed;
            bottom: 100px;
            left: 100px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk konten di dalam card */
        .card-content {
            color: #000;
            margin: 0;
        }

        .category {
            margin-top: 2px;
        }
    </style>


</head>

<body>
    <div class="background-image"></div>

    <div class="card">
        <div class="card-content">
            <h1>{{ $wisata->name }}</h1>
            <p class="category"> {{ $wisata->category_name }}
            <p>
                <span class="material-symbols-outlined">
                    location_on
                </span>
                <a href="https://www.google.com/maps/search/?api=1&query={{ $wisata->latitude }},{{ $wisata->longitude }}" target="_blank">
                    {{ $wisata->location }}
                </a>
            </p>
            <p>{{ $wisata->description }}</p>
        </div>
    </div>

</body>

</html>