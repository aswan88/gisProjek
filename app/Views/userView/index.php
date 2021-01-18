<?php;
dd($dataDesa);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS</title>

    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <!-- javascript -->



    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="assets/leaflet/leaflet.js"></script>
    <script src="assets/leaflet/leaflet.ajax.js"></script>
    <!-- <script src="assets/jquery/jquery.slim.min.js"></script> -->
    <script src="assets/leaflet/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    #mapid {
        margin: auto;
        width: 100%;
        height: 60vh;

    }

    .polyLabel {
        background: rgba(255, 255, 255, 0.9);
        color: grey;
        border: 0;
        border-radius: 0px;
        box-shadow: 0 0px 0px;
        font-size: 20px;
        font-weight: bold;
    }
</style>


<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand font-weight-bold">PEMETAAN DESA ADAT DI PULAU AMBON</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-3 bg-light">
                <h2>Desa Adat</h2>
                <div id="data-desa">
                    <?php foreach (json_decode($dataDesa) as $data) : ?>
                        <div class="nav-link">
                            <a href="/view_desa/<?= $data->id_desa; ?>" class="text-primay font-weight-bold"><?= $data->nama_desa; ?></a>

                        </div>
                        <?php

                        $polygon[] = $data->polygon;
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-8">

                <div id="mapid"></div>

            </div>
        </div>
    </div>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script>
        var mymap = L.map('mapid').setView([-3.6415735118867536, 128.18984985351562], 10.5);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYXN3YW5kZXY4OCIsImEiOiJja2huZWppZzIwYWprMnFxa2RqaDJ4MGlwIn0.S6hw_zaUG7WY3nZrGS8nZA'
        }).addTo(mymap);

        let daDes = <?= $dataDesa ?>;
        // console.log(daDes);
        let polygon = <?= json_encode($polygon) ?>

        for (let i = 0; i < daDes.length; i++) {
            let poly = JSON.parse(daDes[i].polygon);
            let geojsonLayer = new L.polygon(poly, {
                fillColor: daDes[i].warna_poli,
                fillOpacity: 0.5,
                radius: 500,
                color: '#f8dc81'

            });
            geojsonLayer.addTo(mymap)
            let long = daDes[i].longitude;
            let lat = daDes[i].latitude;
            let marker = L.marker([lat, long], {
                icon: L.divIcon({
                    html: daDes[i].nama_desa,
                    className: 'polyLabel' // Specify something to get rid of the default class.
                })
            }).addTo(mymap);
            geojsonLayer.bindPopup(daDes[i].nama_desa + '</br> <img src="rumahAdat/' + daDes[i].gambar + '" width="130"></br> </br> <a href="/view_desa/' + daDes[i].id_desa + '">lihat selengkapnya</a>');
        }
    </script>
</body>

</html<