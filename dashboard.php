<?php
    require "proses/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM gardu");
$query1 = mysqli_query($conn, "SELECT * FROM kotakapp");
$query2 = mysqli_query($conn, "SELECT * FROM tiang");

$jumlah_gardu = mysqli_num_rows($query);
$jumlah_tiang = mysqli_num_rows($query1);
$jumlah_pelanggan = mysqli_num_rows($query2);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLN</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sidebar.css" />
    <link rel="stylesheet" href="CSS/button.css" />
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <style>
        body::-webkit-scrollbar {
            display: none;
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
                <div class="row mt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: justify;">
                                        <img src="images/electrical-panel.png" class="img me-2" style="float: left; width: 30%;">
                                    </h5>
                                    <center>
                                        <p class="card-text"><?php echo number_format($jumlah_gardu, 0, ",", ".") ?></p>
                                    </center>
                                    <center>
                                        Jumlah Gardu Aktif
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: justify;">
                                        <img src="images/panjat-pinang.png" class="img bg-transparent me-2" style="float: left; width: 36%;">
                                    </h5>
                                    <center>
                                        <p class="card-text"><?php echo number_format($jumlah_tiang, 0, ",", ".") ?></p>
                                    </center>
                                    <center>
                                        Jumlah Tiang Aktif
                                    </center>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: justify;">
                                        <img src="images/eco-house.png" class="img bg-transparent me-2" style="float: left; width: 30%;">
                                    </h5>
                                    <center>
                                        <p class="card-text"><?php echo number_format($jumlah_pelanggan, 0, ",", ".") ?></p>
                                    </center>
                                    <center>
                                        Jumlah Pelanggan Aktif
                                    </center>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="card me-4">
                        <div class="card-body">
                            <div class="data_table">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Gardu</th>
                                            <th>Unit</th>
                                            <th>Status</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $no ?></th>
                                                <td><?php echo $data['kode_gardu'] . "<br>"; ?></td>
                                                <td><?php echo $data['ulp'] . "<br>"; ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['status'] == 3) echo "<span class='badge bg-success'>Operating</span>";
                                                    ?></td>
                                                <td><?php echo $data['username'] . "<br>"; ?></td>
                                            </tr>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>

    </div>

    <!-- Page level custom scripts -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                // buttons: ['excel', 'pdf'],

                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],

                language: {
                    "decimal": "",
                    "emptyTable": "Tidak ada data yang tersedia di tabel",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ masukan",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 masukan",
                    "infoFiltered": "(Difilter dari _MAX_ total masukan)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Menampilkan _MENU_ Masukan Data Pelanggan",
                    "loadingRecords": "Memuat...",
                    "processing": "Sedang di proses...",
                    "search": "Pencarian:",
                    "zeroRecords": "Arsip tidak ditemukan",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Lanjut",
                        "previous": "Kembali"
                    },
                    "aria": {
                        "sortAscending": ": aktifkan urutan kolom ascending",
                        "sortDescending": ": aktifkan urutan kolon descending"
                    }
                }

            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="assets/DataTables/DataTables-1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/DataTables-1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/DataTables/Buttons-2.4.1/js/dataTables.buttons.min.js"></script>
</body>

</html>