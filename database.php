<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "kritik_saran_client";

$connection = mysqli_connect($hostname, $username, $password, $database);

if(!$connection){
    die("koneksi gagal:".mysqli_connect_error());
}
?>