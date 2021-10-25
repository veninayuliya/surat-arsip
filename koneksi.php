<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "e-arsip";

$db = mysqli_connect($server, $username, $password, $database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>