<?php
require "koneksi.php";

$id_pelanggan = $_POST['id_pelanggan'];
$status     = $_POST['status'];

    //update data
    $update = mysqli_query($conn, "UPDATE kotakapp SET  status='$status' WHERE id_pelanggan='$id_pelanggan'");
    if($update){
        echo "<script>alert('Data berhasil diperbaharui')</script>";
        header("Location: ../pelanggan.php");
    }else {
        echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
        header("Location: ../pelanggan.php");
    }
