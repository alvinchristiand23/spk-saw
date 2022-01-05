<?php
include 'koneksi.php';
$nama = $_GET['nama'];
$sql = "DELETE FROM saw_aplikasi WHERE nama='$nama'";
$hasil = $conn->query($sql);

$sql = "DELETE FROM saw_penilaian WHERE nama='$nama'";
$hasil = $conn->query($sql);

echo "<script>window.location.href='index.php';
    alert('Berhasil di Hapus !'); 
    </script>";
