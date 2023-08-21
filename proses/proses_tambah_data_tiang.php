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

    if(empty($kode_tiang) || $kode_tiang == ""){
        echo "<script>alert('Data tidak boleh kosong')</script>";
        header("Location: ../tiang.php");
        // echo "<script>window.location='tiang.php';</script>";
    }else{
        $select = mysqli_query($conn, "SELECT kode_tiang FROM tiang WHERE kode_tiang='$kode_tiang'");
        
        $hasil = mysqli_fetch_array($select);
        if(isset($hasil['kode_tiang'])){
            echo "<script>alert('Data kode tiang telah ada')</script>";
            header("Location: ../tiang.php");
        }else{
            $sql    = mysqli_query($conn, "INSERT INTO tiang (kode_tiang,kode_gardu,kode_hantaran,ulp,latitudey,longitudex,jenis_tiang,ukuran_tiang,feature,status,datetime)
            VALUES ('$kode_tiang','$kode_gardu','$kode_hantaran','$ulp','$latitudey','$longitudex','$jenis_tiang','$ukuran','$feature','$status','$datetime')");
            if($sql){
                echo "<script>alert('Data berhasil ditambah')</script>";
                header("Location: ../tiang.php");
            }else {
                echo "<script>alert('Data tidak berhasil ditambah')</script>";
                header("Location: ../tiang.php");
            }
        }
    }
?>