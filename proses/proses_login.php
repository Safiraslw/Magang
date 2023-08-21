<?php
session_start();

require "koneksi.php";
$username = (isset($_POST["username"])) ? htmlentities($_POST["username"]) : "";
$password = (isset($_POST["password"])) ? htmlentities(md5($_POST["password"])) : "";
echo $username, "<br>", $password;

$hasil = mysqli_query($conn, "select * from akun WHERE username='$username' 
    && password='$password'");
$row = mysqli_fetch_array($hasil);
if ($hasil) {
    if ((isset($row['username']) && isset($row['password']))
        && $row['username'] == $username && $row['password'] == $password
    ) {
        $_SESSION['username'] = $row['username'];
        //echo "<script> window.location='../dashboard.php';</script>";
        header("Location: ../dashboard");
    } else {
        //echo "<script> window.location='../login.php';</script>";
        header("Location: ../login");
    }
}

    // echo "id adalah : "  .  $row["id"]. "<br>";
    // echo "Username adalah :  " .  $row["Username"]. "<br>";
    // echo "Password adalah : "  .  $row["Password"]. "<br>";
    // echo "Level adalah : "  .  $row["Level"]. "<br>";
