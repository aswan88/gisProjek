<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS</title>

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />

    <!-- javascript -->



    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
    <script src="<?= base_url(); ?>/assets/leaflet/leaflet.ajax.js"></script>
    <!-- <script src="assets/jquery/jquery.slim.min.js"></script> -->
    <script src="<?= base_url(); ?>/assets/leaflet/jquery.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    #mapid {
        margin: auto;
        width: 100%;
        height: 60vh;

    }

    .polyLabel {
        background: rgba(255, 255, 255, 0.7);
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

    <div class="container pt-5 mb-5">
        <div class="row">
            <h2>Desa Adat
                <?php
                $data = json_decode($dataDesa);
                echo  $data->nama_desa;
                ?>

            </h2>
            <div id="data-desa">

            </div>
        </div>
        <div class="row">
            <div id="mapid"></div>
        </div>

        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <h3 class="text-center">Demografi</h3>
                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
                                <div class="card border-info mb-3">
                                    <div class="card-body text-info">
                                        <h5 class="card-title">Luas Wilayah</h5>
                                        <p class="card-text">
                                            <?= number_format($infoDesa['luas_wilayah']); ?> M<sup>2</sup>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border-info mb-3">
                                    <div class="card-body text-info">
                                        <h5 class="card-title">Jumlah Penduduk</h5>
                                        <p class="card-text"><?= number_format($infoDesa['jumlah_pend']); ?> Jiwa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <h3 class="text-center">Informasi Desa</h3>
                        <p class="justify-content-center"><?= $infoDesa['info_lengkap']; ?></p>
                    </blockquote>
                </div>
            </div>
        </div>

    </div>
    </div>



    <script>
        let daDes = <?= $dataDesa ?>;
        let folder = window.location.origin;
        var mymap = L.map('mapid').setView([daDes.latitude, daDes.longitude], 11.5);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYXN3YW5kZXY4OCIsImEiOiJja2huZWppZzIwYWprMnFxa2RqaDJ4MGlwIn0.S6hw_zaUG7WY3nZrGS8nZA'
        }).addTo(mymap);
        console.log(daDes);

        // daDes.forEach(obj => {
        //     Object.entries(obj).forEach(([key, value]) => {
        //         console.log(polygon, value);
        //     });
        //     console.log('-------------------');
        // });


        let poly = JSON.parse(daDes.polygon);
        let geojsonLayer = new L.polygon(poly, {
            fillColor: daDes.warna_poli,
            fillOpacity: 0.5,
            radius: 500
        });
        geojsonLayer.addTo(mymap);
        let long = daDes.longitude;
        let lat = daDes.latitude;
        L.marker([lat, long], {
            icon: L.divIcon({
                html: daDes.nama_desa,
                className: 'polyLabel' // Specify something to get rid of the default class.
            })
        }).addTo(mymap);
    </script>
</body>

</html<