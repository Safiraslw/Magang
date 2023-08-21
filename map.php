<?php
require "proses/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM gardu");
$sql1 = mysqli_query($conn, "SELECT * FROM kotakapp");
$sql2 = mysqli_query($conn, "SELECT * FROM tiang");
?>
<!DOCTYPE html>

<head>
    <title>PLN</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sidebar.css" />
    <link rel="stylesheet" href="CSS/button.css" />
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        body::-webkit-scrollbar {
            display: none;
        }
        #map {
            position: fixed;
            right: 0; 
            left: 150px; 
            bottom: 0; 
            top: 0;
            margin-left:150px;
            border-top-left-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-3" style="background-color: #bdd4e9;">
            <!-- START SIDEBAR -->
            <?php
            require "sidebar.php";
            ?>
            <!-- END SIDEBAR -->
        </div>
        <div class="col-lg-9" style="background-color: #bdd4e9;">
        <div id="map"></div>
            <script>
                var icon1 = L.icon({
                    iconUrl: 'icon/gardu.png',
                    iconSize: [60, 60],
                });
                let gardu = [];
                let marker;
                <?php
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    marker = L.marker([<?php echo $data['latitudey']; ?>, <?php echo $data['longitudex']; ?>], {
                            icon: icon1
                        })
                        .bindPopup("<?php echo "Gardu", "<br>", $data['kode_gardu'] ?>");

                    gardu.push(marker);
                <?php } ?>

                var cities = L.layerGroup(gardu);

                var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                });

                var map = L.map('map', {
                    center: [5.1740676, 97.1463503],
                    zoom: 16,
                    layers: [osm, cities]
                });

                var baseMaps = {
                    "OpenStreetMap": osm,
                };

                var overlayMaps = {
                    "Gardu": cities
                };

                var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);

                var icon2 = L.icon({
                    iconUrl: 'icon/square.png',
                    iconSize: [20, 20],
                });
                let pelanggan = [];
                let marker1;
                <?php
                while ($data1 = mysqli_fetch_array($sql1)) {
                ?>
                    marker1 = L.marker([<?= $data1['latitudey'] ?>, <?= $data1['longitudex'] ?>], {
                            icon: icon2
                        })
                        .bindPopup("<?php echo "Pelanggan", "<br>", $data1['id_pelanggan'] ?>");

                    pelanggan.push(marker1);
                <?php } ?>

                var parks = L.layerGroup(pelanggan);

                layerControl.addOverlay(parks, "Pelanggan");


                var icon3 = L.icon({
                    iconUrl: 'icon/black.png',
                    iconSize: [20, 20],
                });
                let tiang = [];
                let marker2;
                <?php
                while ($data2 = mysqli_fetch_array($sql2)) {
                ?>
                    marker2 = L.marker([<?php echo $data2['latitudey']; ?>, <?php echo $data2['longitudex']; ?>], {
                        icon: icon3
                    }).bindPopup("<?php echo "Tiang", "<br>", $data2['kode_tiang'] ?>");

                    tiang.push(marker2);
                <?php } ?>

                var Tiang = L.layerGroup(tiang);

                layerControl.addOverlay(Tiang, "Tiang");
            </script>
        </div>
    </div>
</body>

</html>