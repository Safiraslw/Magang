<?php
    require "koneksi.php";

    $idpel = $_POST['id_pelanggan'];

        //update data
        $delete = mysqli_query($conn, "DELETE FROM kotakapp WHERE id_pelanggan='$idpel'");
        if($delete){
            echo "<script>alert('Data berhasil dihapus.')</script>";
            header("Location: ../pelanggan.php");
        }else {
            echo "<script>alert('Data tidak berhasil dihapus.')</script>";
            header("Location: ../pelanggan.php");
        }
?>