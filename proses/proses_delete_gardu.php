<?php
    require "koneksi.php";

    $kode_gardu = $_POST['kode_gardu'];

        //update data
        $delete = mysqli_query($conn, "DELETE FROM gardu WHERE kode_gardu='$kode_gardu'");
        if($delete){
            echo "<script>alert('Data berhasil dihapus.')</script>";
            header("Location: ../gardu.php");
        }else {
            echo "<script>alert('Data tidak berhasil dihapus.')</script>";
            header("Location: ../gardu.php");
        }
?>