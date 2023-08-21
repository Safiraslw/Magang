<?php
    require "koneksi.php";

    $kode_tiang            = $_POST['kode_tiang'];
    $kode_gardu            = $_POST['kode_gardu'];
    $kode_hantaran         = $_POST['kode_hantaran'];
    $ulp                   = $_POST['ulp'];
    $latitudey             = $_POST['latitudey'];
    $longitudex            = $_POST['longitudex'];
    $jenis_tiang           = $_POST['jenis_tiang'];
    $ukuran                = $_POST['ukuran_tiang'];
    $feature               = $_POST['feature'];
    $status                = $_POST['status'];
    $datetime              = $_POST['datetime'];
    // $username           = $_POST['username'];

        //update data
        $update = mysqli_query($conn, "UPDATE tiang SET kode_tiang='$kode_tiang', kode_gardu='$kode_gardu', kode_hantaran='$kode_hantaran', ulp='$ulp', latitudey='$latitudey', longitudex='$longitudex',
        jenis_tiang='$jenis_tiang', ukuran_tiang='$ukuran', feature='$feature', status='$status', datetime='$datetime' WHERE kode_tiang='$kode_tiang'");
        if($update){
            echo "<script>alert('Data berhasil diperbaharui')</script>";
                header("Location: ../tiang.php");
        }else {
            echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
            header("Location: ../tiang.php");
        }
?>