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
    // $username           = $_POST['username'];

    if(empty($kode_gardu) || $kode_gardu == ""){
        echo "<script>alert('Data tidak boleh kosong')</script>";
        header("Location: ../tambah_gardu.php");
        //echo "<script>window.location='gardu.php';</script>";
    }else{
        $select = mysqli_query($conn, "SELECT kode_gardu FROM gardu WHERE kode_gardu='$kode_gardu'");
        
        $hasil = mysqli_fetch_array($select);
        if(isset($hasil['kode_gardu'])){
            echo "<script>alert('Data kode gardu telah ada')</script>";
            header("Location: ../gardu.php");
            //echo "<script>window.location='gardu.php';</script>";
        }else{
            $sql    = mysqli_query($conn, "INSERT INTO gardu (kode_gardu,latitudey,longitudex,type_gardu,jenis_pelayanan,ulp,status)
            VALUES ('$kode_gardu','$latitudey','$longitudex','$tipe','$jenis_pelayanan','$ulp','$status')");
            if($sql){
                echo "<script>alert('Data berhasil ditambah')</script>";
                header("Location: ../gardu.php");
            }else {
                echo "<script>alert('Data tidak berhasil ditambah')</script>";
                header("Location: ../gardu.php");
                // echo "<script>window.location='gardu.php';</script>";
            }
        }
    }
?>