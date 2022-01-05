<?php
include 'koneksi.php';
$no = $_GET['id'];
$sql = "DELETE FROM saw_kriteria WHERE no='$no'";
$hasil = $conn->query($sql);
echo "<script>
         window.location.href='kriteria.php';
         alert('Bobot Berhasil di Hapus!'); 
         </script>";
