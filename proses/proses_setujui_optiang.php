<?php
require "koneksi.php";

$kode_tiang = $_POST['kode_tiang'];
$status     = $_POST['status'];

    //update data
    $update = mysqli_query($conn, "UPDATE tiang SET  status='$status' WHERE kode_tiang='$kode_tiang'");
    if($update){
        echo "<script>alert('Data berhasil diperbaharui')</script>";
                header("Location: ../tiang.php");
    }else {
        echo "<script>alert('Data tidak berhasil diperbaharui')</script>";
        header("Location: ../tiang.php");
    }
?>