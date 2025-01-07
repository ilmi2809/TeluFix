<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tel-U FIx | Pelaporan Masalah Telkom University</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div
                class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark bg-gradient rounded-end-3 vh-100 position-sticky top-0">
                @include('layouts.sidebar')
            </div>
            <div class="col py-3">
                    @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    var map = L.map('map').setView([-6.973424, 107.632773], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([-6.973424, 107.632773], {
        draggable: true
    }).addTo(map);

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat;
        document.getElementById('longitude').value = position.lng;
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });
</script>
</body>
</body>
</html>
