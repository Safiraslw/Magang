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
    // $username           = $_POST['username'];

    if(empty($idpel) || $idpel == ""){
        echo "<script>alert('Data tidak boleh kosong')</script>";
        header("Location: ../pelanggan.php");
    }else{
        $select = mysqli_query($conn, "SELECT id_pelanggan FROM kotakapp WHERE id_pelanggan='$idpel'");
        
        $hasil = mysqli_fetch_array($select);
        if(isset($hasil['id_pelanggan'])){
            echo "<script>alert('Data kode barang telah ada')</script>";
            header("Location: ../pelanggan.php");
        }else{
            $sql    = mysqli_query($conn, "INSERT INTO kotakapp (id_pelanggan,kode_gardu,kode_hantaran,ulp,status,latitudey,longitudex,kwh_daya,datetime)
            VALUES ('$idpel','$kode_gardu','$kode_hantaran','$ulp','$status','$latitudey','$longitudex','$kwh','$datetime')");
            if($sql){
                echo "<script>alert('Data berhasil ditambah')</script>";
                header("Location: ../pelanggan.php");
            }else {
                echo "<script>alert('Data tidak berhasil ditambah')</script>";
                header("Location: ../pelanggan.php");
            }
        }
    }
?>