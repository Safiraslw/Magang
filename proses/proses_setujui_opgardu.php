<?php
require "koneksi.php";

$kode_gardu = $_POST['kode_gardu'];
$status     = $_POST['status'];

    //update data
    $update = mysqli_query($conn, "UPDATE gardu SET  status='$status' WHERE kode_gardu='$kode_gardu'");
    if($update){
        echo "<script>alert('Data berhasil diperbaharui')</script>";
                header("Location: ../gardu.php");
    }else {
        echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
        header("Location: ../gardu.php");
    }
?>