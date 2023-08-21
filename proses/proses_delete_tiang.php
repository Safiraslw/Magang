<?php
    require "koneksi.php";

    $kode_tiang = $_POST['kode_tiang'];

        //update data
        $delete = mysqli_query($conn, "DELETE FROM tiang WHERE kode_tiang='$kode_tiang'");
        if($delete){
            echo "<script>alert('Data berhasil dihapus.')</script>";
            header("Location: ../tiang.php");
        }else {
            echo "<script>alert('Data tidak berhasil dihapus.')</script>";
            header("Location: ../tiang.php");
        }
?>