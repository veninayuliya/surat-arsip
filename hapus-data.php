<?php
include 'koneksi.php';


mysqli_query($db,"DELETE FROM surat WHERE nomor_surat='$_GET[nomor_surat]'");

echo "<script>alert('Data berhasil dihapus');</script>";
echo "<script>location='index.php';</script>";
?>