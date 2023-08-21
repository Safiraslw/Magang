<?php
require "proses/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM kotakapp");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Malika Bakery</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sidebar.css" />
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <link rel="stylesheet" href="CSS/button.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.13.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/DataTables/Buttons-2.4.1/css/buttons.bootstrap5.min.csss" />
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
            <div class="col-lg-11">
                <div class="row mt-2">
                    <div class="card-body ms-4 mt-4">
                        <div class="data_table">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Kode Gardu</th>
                                        <th>ULP</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td><?php echo $data['id_pelanggan'] . "<br>"; ?></td>
                                            <td><?php echo $data['kode_gardu'] . "<br>"; ?></td>
                                            <td><?php echo $data['ulp'] . "<br>"; ?></td>
                                            <td>
                                                <?php
                                                if ($data['status'] == 1) echo "<span class='badge bg-secondary'>Not Ready</span>";
                                                elseif ($data['status'] == 2) echo "<span class='badge bg-warning'>Request Operating</span>";
                                                elseif ($data['status'] == 3) echo "<span class='badge bg-success'>Operating</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#setujui<?php echo $no ?>" type="button" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                    </svg>
                                                </button>
                                                <!-- Modal Setujui-->
                                                <div class="modal fade" id="setujui<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Request Operating</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="proses/proses_setujui_oppelanggan.php">
                                                                <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">ID Pelanggan</label>
                                                                        <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Status</label> <br>
                                                                        <select name="status" class="input">
                                                                            <option disabled selected>Pilih</option>
                                                                            <option value="3">Operating</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn" style="background-color: #D2B48C;">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Setujui -->
                                                <button type="button" class="btn btn-dark link-dark" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?php echo $no ?>" style="background-color: #D2B48C;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="exampleModaledit<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Gardu</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="proses/proses_edit_pelanggan.php">
                                                                    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Id Pelanggan</label>
                                                                        <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Kode Gardu</label>
                                                                        <input type="text" class="form-control" name="kode_gardu" value="<?php echo $data['kode_gardu'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Kode Hantaran</label>
                                                                        <input type="text" class="form-control" name="kode_hantaran" value="<?php echo $data['kode_hantaran'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Unit</label> <br>
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
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Latitude</label>
                                                                        <input type="text" class="form-control" name="latitudey" value="<?php echo $data['latitudey'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Longitude</label>
                                                                        <input type="text" class="form-control" name="longitudex" value="<?php echo $data['longitudex'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Status</label>
                                                                        <input type="text" class="form-control" name="status" value="<?php echo $data['status'] ?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Daya</label>
                                                                        <input type="text" class="form-control" name="kwh_daya" value="<?php echo $data['kwh_daya'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="form-label">Date-Time</label>
                                                                        <input type="datetime-local" class="form-control" name="datetime" value="<?php echo $data['datetime'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn" style="background-color: #D2B48C;">Edit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit -->

                                                <!-- button delete -->
                                                <button type="button" class="btn btn-dark link-dark" data-bs-toggle="modal" data-bs-target="#exampleModaldelete<?php echo $no ?>" style="background-color: #D2B48C;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="exampleModaldelete<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pelanggan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="proses/proses_delete_pelanggan.php">
                                                                    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                                                                    <div class="modal-body">
                                                                        Yakin ingin menghapus <?php echo $data['id_pelanggan']; ?> ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn link-dark" style="background-color: #D2B48C;">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Delete -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                            </table>
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
                buttons: ['excel', 'pdf'],

                lengthMenu: [
                    [3, 10, 25, 50, 100, -1],
                    [3, 10, 25, 50, 100, "All"]
                ],

                language: {
                    "decimal": "",
                    "emptyTable": "Tidak ada data yang tersedia di tabel",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ masukan",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 masukan",
                    "infoFiltered": "(Difilter dari _MAX_ total masukan)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Menampilkan _MENU_ Masukan",
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
    <script src="assets/DataTables/Buttons-2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/DataTables/JSZip-3.10.1/jszip.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="assets/DataTables/Buttons-2.4.1/js/buttons.html5.min.js"></script>
    <script src="assets/DataTables/Buttons-2.4.1/js/buttons.print.min.js"></script>
    <script src="assets/DataTables/Buttons-2.4.1/js/buttons.colVis.min.js"></script>


</body>

</html>