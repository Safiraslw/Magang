<?php
    require "koneksi.php";

    $kode_gardu         = $_POST['kode_gardu'];
    $latitudey          = $_POST['latitudey'];
    $longitudex         = $_POST['longitudex'];
    $tipe               = $_POST['type_gardu'];
    $jenis_pelayanan    = $_POST['jenis_pelayanan'];
    $ulp                = $_POST['ulp'];
    $status             = $_POST['status'];
    $datetime           = $_POST['datetime'];

        //update data
        $update = mysqli_query($conn, "UPDATE gardu SET kode_gardu='$kode_gardu', latitudey='$latitudey', longitudex='$longitudex', type_gardu='$tipe',
        jenis_pelayanan='$jenis_pelayanan', ulp='$ulp', status='$status', datetime='$datetime' WHERE kode_gardu='$kode_gardu'");
        if($update){
            echo "<script>window.location='../gardu.php';</script>";
        }else {
            echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
        }
?>