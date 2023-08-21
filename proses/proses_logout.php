<?php
session_start();
    session_destroy();
    if(!empty($_SESSION['username'])){
        session_destroy();
        echo "<script> window.location='../login';</script>";
    }else if(empty($_SESSION['username'])) {
        echo "<script> window.location='../login';</script>";
    }
?>