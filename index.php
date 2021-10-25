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
                        <h1 class="mt-4">Arsip Surat</h1>
                        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                            Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p><br>
                        <!-- Navbar Search-->
                        <div class="col-md-8">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group">
                                    <p>Cari surat: &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                    <input class="form-control" type="text" placeholder="Search for..."/>
                                    <button class="btn btn-secondary" style="float: right;" id="btnNavbarSearch" type="button">Cari</button>
                                </div>
                            </form>
                        </div><br><br>
                        <!-- Navbar-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengarsipan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $data=mysqli_query($db,"SELECT * FROM surat");
                                        while ($d=mysqli_fetch_array($data)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $d['nomor_surat']; ?></td>
                                            <td><?php echo $d['kategori']; ?></td>
                                            <td><?php echo $d['judul']; ?></td>
                                            <td><?php echo $d['waktu_pengarsipan']; ?></td>
                                            <td>
                                                <a href="hapus-data.php?nomor_surat=<?php echo $d['nomor_surat']; ?>" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ?')">Hapus</a>
                                                    <script>
                                                        $(".hapus").click(function () {
                                                            var jawab = confirm("Press a button!");
                                                            if (jawab === true) {
                                                                var hapus = false;
                                                                if (!hapus) {
                                                                    hapus = true;
                                                                    $.post('hapus-data.php', {id: $(this).attr('nomor_surat')},
                                                                    function (data) {
                                                                        alert(data);
                                                                    });
                                                                    hapus = false;
                                                                }
                                                            } else {
                                                                return false;
                                                            }
                                                        });
                                                    </script>
                                                <a href="unduh-data.php?nomor_surat=<?php echo $d['nomor_surat']?>" class="btn btn-warning">Unduh</a>
                                                <a href="lihat.php?nomor_surat=<?php echo $d['nomor_surat']; ?>" class="btn btn-primary">Lihat>></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <a href="tambah-data.php" class="btn btn-success">Arsipkan Surat</a>
                            </div>
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
