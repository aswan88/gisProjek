<?php include "template/header.php"; ?>
<!-- css -->
<style>
    #map {
        margin: auto;
        width: 98%;
        height: 60vh;

    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css">

<?php include "template/sidebar.php"; ?>


<div class="container p-5">
    <div class="row mb-3">

        <h3>Tambah Data Desa</h3>

    </div>
    <!-- set flash data -->
    <?php if (session()->getFlashdata('pesanData')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesanData'); ?>
        </div>
    <?php endif; ?>

    <form action="/admin/save_desa" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nama_desa" class="col-form-label font-weight-bold ">Nama Desa <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <input type="text" class="form-control w-100" id="nama_desa" name="nama_desa" placeholder="nama desa" required>

                </div>

                <div class="form-group row">
                    <label for="latitude" class="col-form-label font-weight-bold ">Latitude <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <input type="text" class="form-control w-100" id="latitude" name="latitude" placeholder="latitude" readonly required>
                </div>

                <div class="form-group row">
                    <label for="longitude" class="col-form-label font-weight-bold ">Longitude <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <input type="text" class="form-control w-100" id="longitude" name="longitude" placeholder="longitude" readonly required>
                </div>

                <div class="form-group row">
                    <label for="gambar" class="col-form-label font-weight-bold ">Gambar Rumah Adat <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <input type="file" class="form-control w-100" id="gambar" name="gambar" placeholder="gambar" required>
                </div>

                <div class="form-group row">
                    <label for="warna_poli" class="col-form-label font-weight-bold ">Warna Polygon <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <input type="color" class="form-control w-100" id="warna_poli" name="warna_poli" placeholder="warna_poli" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="warna_poli" class="col-form-label font-weight-bold ">Buat Peta <span class="text-danger">*</span></label>
                </div>
                <div class="form-group row">
                    <div id="map"></div>
                    <textarea name="polygonArea" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row float-right">
            <a href="/admin/desa" class="btn btn-secondary mr-3">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary ">Simpan </button>
        </div>
    </form>

</div>



<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script>
    var map = L.map('map').setView([-3.6415735118867536, 128.18984985351562], 10.5);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYXN3YW5kZXY4OCIsImEiOiJja2huZWppZzIwYWprMnFxa2RqaDJ4MGlwIn0.S6hw_zaUG7WY3nZrGS8nZA'
    }).addTo(map);

    // FeatureGroup is to store editable layers
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        draw: {
            polyline: false,
            rectangle: false,
            circle: false,
            circlemarker: false,

        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);
    map.on('draw:created', function(e) {
        var type = e.layerType,
            layer = e.layer;

        if (type === 'marker') {
            let koordinat = layer.getLatLng();
            console.log(koordinat);
            $("[name = latitude]").val(koordinat['lat']);
            $("[name = longitude]").val(koordinat['lng']);
        } else if (type === 'polygon') {
            let polygon = layer.getLatLngs()[0];
            console.log(polygon);
            $("[name = polygonArea]").val(JSON.stringify(polygon));
        }
        // Do whatever else you need to. (save to db; add to map etc)
        drawnItems.addLayer(layer);
    });
    map.on('draw:edited', function(e) {
        var layers = e.layers;
        layers.eachLayer(function(layer) {
            //do whatever you want; most likely save back to db
        });
    });
</script>
<?php include "template/footer.php"; ?>