<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h1><a href="index.php" class="logo">AC</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="index.php"><span class="fa fa-user"></span> Alternatif</a>
                </li>
                <li>
                    <a href="kriteria.php"><span class="fa fa-sticky-note"></span> Kriteria</a>
                </li>
                <li>
                    <a href="penilaian.php"><span class="fa fa-list-ol"></span> Penilaian</a>
                </li>
                <li>
                    <a href="hitung.php"><span class="fa fa-cogs"></span> Hitung</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>

                    <h5 class="nav"> SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN APLIKASI EDITOR'S CHOICE DI PLAY STORE |<b>| METODE SAW</b></h5>
                </div>
            </nav>

            <section id="main-content">
                <section class="wrapper">
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li><i class="fa fa-edit"></i><a href=""> Edit</a></li>
                            </ol>
                        </div>
                    </div>

                    <!--START SCRIPT UPDATE-->
                    <?php
                    include 'koneksi.php';

                    if (isset($_POST['edit'])) {
                        $first_nama = $_GET['nama'];
                        $nama = $_POST['nama'];
                        $pengembang = $_POST['pengembang'];
                        $kategori = $_POST['kategori'];
                        if (($nama == "") or ($pengembang == "")) {
                            echo "<script>
                                alert('Tolong lengkapi data yang ada!');
                                </script>";
                        } else {
                            $sql = "UPDATE saw_aplikasi SET nama='$nama',
                                pengembang='$pengembang', kategori='$kategori' WHERE nama='$first_nama'";
                            $hasil = $conn->query($sql);
                            if ($hasil) {
                                echo "<script>
                                    alert('berhasil di update !');
                                    window.location.href='index.php'; 
                                    </script>";
                            }
                        }
                    }
                    ?>
                    <!-- END SCRIPT UPDATE-->

                    <!--start inputan-->
                    <form method="POST" action="">
                        <?php
                        $nama = $_GET['nama'];
                        $sql = "SELECT * FROM saw_aplikasi WHERE nama = '$nama'";
                        $hasil = $conn->query($sql);
                        $rows = $hasil->num_rows;
                        if ($rows > 0) {
                            $row = $hasil->fetch_row();
                            $nama = $row[0];
                            $pengembang = $row[1];
                            $kategori = $row[2];
                        ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Aplikasi</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" value="<?= $nama ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pengembang Aplikasi</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="pengembang" value="<?= $pengembang ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori Aplikasi</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="kategori" value="<?= $kategori ?>">
                                        <option <?php if ($kategori == 'Pendidikan') {
                                                    echo 'selected';
                                                } ?>>Pendidikan</option>
                                        <option <?php if ($kategori == 'Kesehatan') {
                                                    echo 'selected';
                                                } ?>>Kesehatan</option>
                                        <option <?php if ($kategori == 'Hiburan') {
                                                    echo 'selected';
                                                } ?>>Hiburan</option>
                                        <option <?php if ($kategori == 'Permainan') {
                                                    echo 'selected';
                                                } ?>>Permainan</option>
                                        <option <?php if ($kategori == 'Olahraga') {
                                                    echo 'selected';
                                                } ?>>Olahraga</option>
                                        <option <?php if ($kategori == 'Sosial') {
                                                    echo 'selected';
                                                } ?>>Sosial</option>
                                        <option <?php if ($kategori == 'Lainnya') {
                                                    echo 'selected';
                                                } ?>>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-danger mr-3"><a href="index.php">Cancel</a></button>
                            <button type="edit" name="edit" class="btn btn-outline-primary">Edit</button>
                    </form>
                <?php } ?>
                </section>
            </section>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>