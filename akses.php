<?php
if (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'dashboard') {
    include "dashboard.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'peta') {
    include "map.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'gardu') {
    include "gardu.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'tiang') {
    include "tiang.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan') {
    include "pelanggan.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'gardu1') {
    include "tambah_gardu.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'tiang2') {
    include "tambah_tiang.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan3') {
    include "tambah_pelanggan.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pemeliharaan') {
    include "pemeliharaan.php";
}else{
    include "dashboard.php";
}
