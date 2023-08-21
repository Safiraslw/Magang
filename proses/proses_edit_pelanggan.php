<?php
    require "koneksi.php";

    $idpel            = $_POST['id_pelanggan'];
    $kode_gardu       = $_POST['kode_gardu'];
    $kode_hantaran    = $_POST['kode_hantaran'];
    $ulp              = $_POST['ulp'];
    $status           = $_POST['status'];
    $latitudey        = $_POST['latitudey'];
    $longitudex       = $_POST['longitudex'];
    $kwh              = $_POST['kwh_daya'];
    $datetime         = $_POST['datetime'];

        //update data
        $update = mysqli_query($conn, "UPDATE kotakapp SET id_pelanggan='$idpel', kode_gardu='$kode_gardu', kode_hantaran='$kode_hantaran', latitudey='$latitudey', longitudex='$longitudex',
        ulp='$ulp', status='$status', kwh_daya='kwh', datetime='$datetime' WHERE id_pelanggan='$idpel'");
        if($update){
            echo "<script>alert('Data berhasil diperbaharui')</script>";
            header("Location: ../pelanggan.php");
        }else {
            echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
            header("Location: ../pelanggan.php");
        }
?>