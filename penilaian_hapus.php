<?php
include 'koneksi.php';
$nama = $_GET['nama'];
$sql = "DELETE FROM saw_penilaian WHERE nama='$nama'";
$hasil = $conn->query($sql);
echo "<script>
window.location.href='penilaian.php';
alert('berhasil di hapus !'); 
</script>";
