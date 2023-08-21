<?php
require "proses/koneksi.php";
$sql1 = mysqli_query($conn, "SELECT * FROM gardu");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Malika Bakery</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.13.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/DataTables/Buttons-2.4.1/css/buttons.bootstrap5.min.csss" />
    <style>
        body::-webkit-scrollbar {
            display: none;
        }

        .card {
            margin-right: 10px;
            background-color: #ddd;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .input {
            border: 0;
            border-bottom: 1px solid #000;
            width: 350px;
            background-color: #ddd;
        }


        .card-body .row {
            margin-top: 20px;
        }

        .col-lg-6:before,
        .col-lg-6:after {
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: #38d39f;
            transition: .4s;
        }

        form input[type="text"]:focus {
            outline-width: 0;
        }

        form input[type="datetime-local"]:focus {
            outline-width: 0;
        }

        form select:focus {
            outline-width: 0;
        }

        .button {
            /* margin-left: 5px; */
            text-decoration: none;
            color: #fff;
            padding: 6px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
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
            <!-- start content -->
            <?php
            require "user.php";
            ?>
            <div class="col-lg-12">
                <div class="content">
                    <h2>TAMBAH ASET TIANG</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="proses/proses_tambah_data_tiang.php" method="POST">
                            <div class="row" style="margin-top:0;">
                                <div class="div col-lg-6">
                                    <h5>Kode Tiang</h5>
                                    <input type="text" class="input" name="kode_tiang">
                                </div>
                                <div class="div col-lg-6">
                                    <h5>Gardu</h5>
                                    <select name="kode_gardu" id="gardu" class="input">
                                        <option>Pilih</option>
                                        <?php
                                        while ($val = mysqli_fetch_array($sql1)) {
                                        ?>
                                            <option value="<?= $val['kode_gardu']; ?>"> <?= $val['kode_gardu'] ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="div col-lg-6">
                                    <h5>Kode Hantaran</h5>
                                    <input type="text" class="input" name="kode_hantaran">
                                </div>
                                <div class="div col-lg-6">
                                    <h5>ULP</h5>
                                    <select name="ulp" class="input">
                                        <option disabled selected>Pilih</option>
                                        <option value="ULP.11220">ULP.11220 Lhokseumawe</option>
                                        <option value="ULP.11221">ULP.11221 Kruenggeukueh </option>
                                        <option value="ULP.11222">ULP.11222 Geudong</option>
                                        <option value="ULP.11223">ULP.11223 Lhoksukon</option>
                                        <option value="ULP.11224">ULP.11224 Pantonlabu</option>
                                        <option value="ULP.11225">ULP.11225 Bireuen</option>
                                        <option value="ULP.11226">ULP.11226 Matang Glumpang Dua</option>
                                        <option value="ULP.11227">ULP.11227 Samalanga</option>
                                        <option value="ULP.11228">ULP.11228 Gandapura</option>
                                        <option value="ULP.11229">ULP.11229 Takengon</option>
                                        <option value="ULP.11230">ULP.11230 Janarata</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="div col-lg-4">
                                    <h5>Jenis</h5>
                                    <select name="jenis_tiang" class="input" style="width:300px;">
                                        <option disabled selected>Pilih</option>
                                        <option value="Besi"> BESI </option>
                                        <option value="Beton"> BETON </option>
                                    </select>
                                </div>
                                <div class="div col-lg-4">
                                    <h5>Ukuran</h5>
                                    <input type="text" class="input" name="ukuran_tiang" style="width: 300px;">
                                </div>
                                <div class="div col-lg-4">
                                    <h5>Feature</h5>
                                    <select name="feature" class="input" style="width: 280px;">
                                        <option disabled selected>Pilih</option>
                                        <option value="TR"> Tegangan Rendah </option>
                                        <option value="TM"> Tegangan Menengah </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="div col-lg-6">
                                    <h5>Latitude</h5>
                                    <input type="text" name="latitudey" class="input">
                                </div>
                                <div class="div col-lg-6">
                                    <h5>Longitude</h5>
                                    <input type="text" name="longitudex" class="input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="div col-lg-6">
                                    <h5>Date-Time</h5>
                                    <input type="datetime-local" name="datetime" class="input">
                                </div>
                                <div class="div col-lg-6">
                                <div class="div col-lg-6">
                                    <h5>Status</h5>
                                    <select name="status" class="input">
                                        <option value="1">Not Ready</option>
                                        <option value="2">Reaquest Operating</option>
                                    </select>
                                </div>
                                </div>
                            </div><br>
                            <div class="button">
                                <button class="btn" type="submit" style="background-color: #D2B48C;">Simpan</button>
                                <button class="btn" type="reset" style="background-color: #D2B48C;">Batal</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- end content -->
        </div>

    </div>

    <!-- Page level custom scripts -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

</body>

</html>