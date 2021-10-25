<?php
    date_default_timezone_set('Asia/Jakarta');
    $waktu_pengarsipan = date("Y-m-d H:i:s A");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Arsip</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">Menu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Arsip
                                <hr>
                            </a>
                            <a class="nav-link" href="about.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-about"></i></div>
                                About
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            <!-- Post Content Column -->
                            <div class="col-md-6"><br>
                                <h2>Arsip Surat >> Unggah</h2>
                                <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
                                    Catatan : <br></p>
                                <ul><li>Gunakan file berformat PDF</li></ul><br>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-grup">
                                        <label>Nomor Surat</label><br>
                                        <input type="text" name="nomor_surat" placeholder="Masukkan nomor surat" class="form-control" required><br>
                                    </div>
                                    <div class="form-grup">
                                        <label>Kategori (pilih salah satu)</label><br>
                                        <select class="form-control" name="kategori">
                                            <option value="Undangan">Undangan</option>
                                            <option value="Pengumuman">Pengumuman</option>
                                            <option value="Nota Dinas">Nota Dinas</option>
                                            <option value="Pemberitahuan">Pemberitahuan</option>
                                        </select>
                                    </div><br>
                                    <div class="form-grup">
                                        <label>Judul</label><br>
                                        <input type="text" name="judul" placeholder="Masukkan judul surat" class="form-control" required><br>
                                    </div>
                                    <div class="form-grup">
                                        <label>File PDF</label><br>
                                        <input type="file" name="filee" class="form-control" required><br><br>
                                    </div>
                                    <a href="index.php" class="btn btn-info">Kembali</a>
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button><br><br>
                                </form>
                                <br><br><br>
                                <?php
                                include 'koneksi.php';
                                if(isset(($_POST['simpan'])))
                                {
                                    $targetfolder = "upload/";
                                    $targetfolder = $targetfolder . basename( $_FILES['filee']['name']) ;
                                    $file_type=$_FILES['filee']['type'];
                                    if ($file_type=="application/pdf") {
                                    if(move_uploaded_file($_FILES['filee']['tmp_name'], $targetfolder))
                                    {
                                    mysqli_query($db,"INSERT INTO surat (nomor_surat,kategori,judul,waktu_pengarsipan,filee) VALUES('$_POST[nomor_surat]','$_POST[kategori]','$_POST[judul]','$waktu_pengarsipan','$targetfolder')");
                                    echo "<script>alert('Data berhasil disimpan');</script>";
		                            echo "<script>location='index.php';</script>";
                                    }
                                    else {
                                    echo "File Gagal di Upload";
                                    }
                                    }
                                    else {
                                    echo "Ekstensi yang diizinkan hanya PDF.<br>";
                                    }
                                }
                                ?>
                            </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; by Venina Yuliya LSP 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>