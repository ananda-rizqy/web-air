<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
    echo "<script>window.location.replace('../index.php')</script>";
}

include "../assets/func.php";
$te2d = new klas_te2d;
$koneksi = $te2d->koneksi();
$tipe_user = $te2d->tipe_user($_SESSION['user']);
$dt_user = $te2d->data_user($_SESSION['user']);
// $bacor = $air->enkrip_pass($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background: rgb(34,195,193);background: linear-gradient(0deg, rgba(34,195,193,1) 0%, rgba(45,53,253,1) 100%);">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Andan 46</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                            <a>
                                <?php
                                if ($tipe_user == "admin") {
                                    //Manajemen user, Lihat komplain, Lihat pemakaian semua warga, Ubah data meter
                                    ?>
                                    <a class="nav-link" href="index.php?p=user">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Manajemen username
                                    </a>
                                    <a class="nav-link" href="index.php?p=komplain">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Lihat komplain

                                        <a class="nav-link" href="index.php?p=pemakaian">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat pemakaian warga

                                            <a class="nav-link" href="index.php?p=data">
                                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                                Ubah data
                                            </a>
                                            <?php
                                } elseif ($tipe_user == "petugas") {
                                    ?>
                                        </a>
                                        <a class="nav-link" href="index.php?p=input_meter">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Input meter
                                        </a>
                                        <a class="nav-link" href="index.php?p=komplain">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat komplain
                                        </a>
                                        <a class="nav-link" href="index.php?p=pemakaian">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat pemakaian semua warga
                                        </a>
                                        <a class="nav-link" href="index.php?p=data">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Ubah data meter 1 bulan
                                        </a>
                                        <a class="nav-link" href="index.php?p=tempo">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat jatuh tempo
                                        </a>
                                        <?php
                                } elseif ($tipe_user == "bendahara") {
                                    ?>
                                        <a class="nav-link" href="index.php?p=bayar">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Transaksi Pembayaran
                                        </a>
                                        <a class="nav-link" href="index.php?p=tarif">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Manajemen Tarif
                                        </a>
                                        <a class="nav-link" href="index.php?p=komplain">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat Komplain
                                        </a>
                                        <a class="nav-link" href="index.php?p=pemakaian">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat Data Pemakaian
                                        </a>
                                        <?php
                                } elseif ($tipe_user == "warga") {
                                    ?>
                                        <a class="nav-link" href="index.php?p=notif">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Notif Meter Via Email
                                        </a>
                                        <a class="nav-link" href="index.php?p=pemakaian">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat Pemakaian Sendiri
                                        </a>
                                        <a class="nav-link" href="index.php?p=pemakaian_warga">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat Pemakaian Semua Warga
                                        </a>
                                        <a class="nav-link" href="index.php?p=tagihan">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Lihat Tagihan Sendiri
                                        </a>
                                        <a class="nav-link" href="index.php?p=komplain">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Ajukan Komplain
                                        </a>
                                        <a class="nav-link" href="index.php?p=notif">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Notif Jatuh Tempo
                                        </a>
                                        <a class="nav-link" href="index.php?p=bayar">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Bayar
                                        </a>
                                        <?php
                                }
                                ?>
                                    <div class="sb-sidenav-footer">
                                        <div class="small">Logged in as:</div>
                                        <?php
                                        echo $te2d->tipe_user($_SESSION['user']);
                                        ?>
                                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                //echo $_SERVER['REQUEST_URI'];
                $e = explode("=", $_SERVER['REQUEST_URI']);
                //echo "<BR>hasil: " . $e[1];
                if (!empty($e[1])) {

                    if ($e[1] == "user" || $e[1] == "user_edit&nik") {
                        $h1 = "Manajemen Username";
                        $h2 = "Menu untuk CRUD data user";
                    } elseif ($e[1] == "komplain") {
                        $h1 = "Lihat komplain";
                        $h2 = "Menu untuk lihat data komplain warga";
                    } elseif ($e[1] == "pemakaian") {
                        $h1 = "Lihat pemakaian";
                        $h2 = "Menu untuk lihat data pemakaian warga";
                    } elseif ($e[1] == "data") {
                        $h1 = "Ubah data";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "input_meter" || $e[1] == "input_meter_edit&no") {
                        $h1 = "Input meter";
                        $h2 = "Menu untuk lihat data input meter";
                    } elseif ($e[1] == "komplain") {
                        $h1 = "Lihat komplain";
                        $h2 = "Menu untuk lihat data pemakaian warga";
                    } elseif ($e[1] == "pemakaian") {
                        $h1 = "Lihat pemakaian";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "tempo") {
                        $h1 = "Lihat jatuh tempo";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "komplain") {
                        $h1 = "Lihat komplain";
                        $h2 = "Menu untuk lihat data komplain warga";
                    } elseif ($e[1] == "tarif" || $e[1] == "tarif_edit&id_tarif") {
                        $h1 = "Manajemen Tarif";
                        $h2 = "Menu untuk lihat data pemakaian warga";
                    } elseif ($e[1] == "komplain") {
                        $h1 = "Lihat komplain";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "pemakaian") {
                        $h1 = "Lihat data pemakaian";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "notif") {
                        $h1 = "Notif meter";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "pemakaian") {
                        $h1 = "Lihat pemakaian sendiri";
                        $h2 = "Menu untuk lihat data komplain warga";
                    } elseif ($e[1] == "pemakaian_warga") {
                        $h1 = "Lihat pemakaian warga";
                        $h2 = "Menu untuk lihat data pemakaian warga";
                    } elseif ($e[1] == "tagihan") {
                        $h1 = "Lihat tagihan";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "komplain") {
                        $h1 = "Lihat komplain";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "notif") {
                        $h1 = "Lihat notif";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    } elseif ($e[1] == "bayar") {
                        $h1 = "Bayar";
                        $h2 = "Menu untuk ubah data pemakaian data";
                    }
                } else {
                    $h1 = "Dashboard";
                    $h2 = "Dashboard";
                }
                ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?php echo $h1 ?></h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?php echo $h2 ?></li>
                    </ol>
                    <div class="row" id="summary">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <div class="ms-3">m<sup>3</sup></div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="mx-auto">Total Volume Pemakaian</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <div class="ms-3">orang</div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="mx-auto">Pelanggan</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <div class="ms-3">pelanggan</div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="mx-auto">Sudah Dicatat</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <div class="ms-3">pelanggan</div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="mx-auto">Belum Dicatat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chart">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $status = "";
                    if (isset($_POST['tombol'])) {
                        $t = $_POST['tombol'];
                        if ($t == "user_add") {
                            $nik = $_POST['nik'];
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $username = $_POST['username'];
                            $pass = $_POST['password'];
                            $alamat = $_POST['alamat'];
                            $no_telepon = $_POST['no_telepon'];
                            $tipe_user = $_POST['tipe_user'];
                            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                            $qc = mysqli_query($koneksi, "SELECT nik FROM user WHERE nik = '$nik' OR username = '$username'");
                            $jc = mysqli_num_rows($qc);

                            if (empty($jc)) {
                                mysqli_query($koneksi, "INSERT INTO user (nik,nama,email,username,password,alamat,no_telepon,tipe_user) VALUES ('$nik',\"$nama\",'$email','$username', '$pass','$alamat','$no_telepon','$tipe_user')");
                                if (mysqli_affected_rows($koneksi) > 0) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-user >
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user >
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            } else {
                                echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>NIK $nik atau Username $username</strong> sudah ada!
                                    </div>
                                    ";

                            }
                        } elseif ($t == "user_edit") { //tombol simpan di #user_add diklik untuk ubah data
                            $nik = $_POST['nik'];
                            $nama = $_POST['nama'];
                            $tipe_user = $_POST['tipe_user'];
                            $email = $_POST['email'];
                            $no_telepon = $_POST['no_telepon'];
                            $alamat = $_POST['alamat'];

                            mysqli_query($koneksi, "UPDATE user SET nama=\"$nama\",tipe_user='$tipe_user',email='$email', no_telepon='$no_telepon',alamat='$alamat' WHERE nik='$nik'");
                            if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\" id=alert-user>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> berhasil diubah....
                                    </div>
                                    <script>window.location.replace('index.php?p=user')</script>;
                                    ";
                            } else { //data gagal masuk
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> tidak ada perubahan....
                                    </div>";
                            }
                        } elseif ($t == "user_hapus") {
                            $nik = $_POST['nik'];
                            mysqli_query($koneksi, "DELETE FROM user WHERE nik='$nik'");
                            if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> berhasil dihapus....
                                    </div>
                                    <script>window.location.replace('index.php?p=user')</script>;
                                    ";
                            } else { //data gagal masuk
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> tidak jadi dihapus....
                                    </div>";
                            }
                        } elseif ($t == "tarif_add") {
                            $id_tarif = $_POST['id_tarif'];
                            $tipe_tarif = $_POST['tipe_tarif'];
                            $tarif = $_POST['tarif'];
                            $status = $_POST['status'];

                            $qc = $qc = mysqli_query($koneksi, "SELECT id_tarif FROM tarif WHERE id_tarif = '$id_tarif'");
                            $jc = mysqli_num_rows($qc);

                            if (empty($jc)) {
                                mysqli_query($koneksi, "INSERT INTO tarif (id_tarif,tipe_user,tarif,status) VALUES ('$id_tarif',\"$tipe_tarif\",'$tarif','$status')");
                                if (mysqli_affected_rows($koneksi) > 0) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            } else {
                                echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Id tarif $id_tarif</strong> sudah ada!
                                    </div>
                                    ";

                            }

                        } elseif ($t == "tarif_edit") { //tombol simpan di #user_add diklik untuk ubah data
                            $id_tarif = $_POST['id_tarif'];
                            $tipe_tarif = $_POST['tipe_tarif'];
                            $tarif = $_POST['tarif'];
                            $status = $_POST['status'];

                            mysqli_query($koneksi, "UPDATE tarif SET tipe_user='$tipe_tarif',tarif='$tarif',status='$status' WHERE id_tarif='$id_tarif'");
                            if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> berhasil diubah....
                                        </div>
                                        <script>window.location.replace('index.php?p=tarif')</script>;
                                        ";
                            } else { //data gagal masuk
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> tidak ada perubahan....
                                        </div>
                                        ";
                            }
                        } elseif ($t == "tarif_hapus") {
                            $id_tarif = $_POST['id_tarif'];
                            mysqli_query($koneksi, "DELETE FROM tarif WHERE id_tarif='$id_tarif'");
                            if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> berhasil dihapus....
                                        </div>";
                            } else { //data gagal masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> tidak jadi dihapus....
                                        </div>";
                            }
                        } elseif ($t == "input_meter_add") {
                            $id_pelanggan = $_POST['id_pelanggan'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $tgl = $_POST['tgl'];
                            $waktu = $_POST['waktu'];

                            if ($meter_akhir < $meter_awal) {
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Meter akhir</strong> tidak boleh lebih kecil dari meter awal....
                                 </div>";
                            } else {
                                $pemakaian = $meter_akhir - $meter_awal;
                                $id_pencatat = $te2d->sesi_to_nik($_SESSION['user']);
                                mysqli_query($koneksi, "INSERT INTO meter (id_pelanggan,meter_awal,meter_akhir,pemakaian,tanggal,waktu,id_pencatat) VALUES ('$id_pelanggan', '$meter_awal', '$meter_akhir', '$pemakaian', '$tgl', '$waktu', '$id_pencatat')");
                                if (mysqli_affected_rows($koneksi)) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            }

                        } elseif ($t == "input_meter_edit") { //tombol simpan di #user_add diklik untuk ubah data
                            $no = $_POST['no'];
                            $id_pelanggan = $_POST['id_pelanggan'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $tgl = $_POST['tgl'];
                            $waktu = $_POST['waktu'];
                            if ($meter_akhir < $meter_awal) {
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>Meter akhir</strong> tidak boleh lebih kecil dari meter awal....
                                </div>";
                            } else {
                                $pemakaian = $meter_akhir - $meter_awal;
                                $id_pencatat = $te2d->sesi_to_nik($_SESSION['user']);
                                mysqli_query($koneksi, "UPDATE meter SET id_pelanggan='$id_pelanggan',meter_awal='$meter_awal',meter_akhir='$meter_akhir',pemakaian= '$pemakaian',tanggal= '$tgl',waktu= '$waktu',id_pencatat= '$id_pencatat' WHERE no='$no'");
                                if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                    echo "<div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                <strong>Data</strong> berhasil diubah....
                                            </div>
                                            <script>window.location.replace('index.php?p=input_meter')</script>;
                                            ";
                                } else { //data gagal masuk
                                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                <strong>Data</strong> tidak ada perubahan....
                                            </div>";
                                }
                            }

                        } elseif ($t == "input_meter_hapus") {
                            $no = $_POST['no'];
                            mysqli_query($koneksi, "DELETE FROM meter WHERE no='$no'");
                            if (mysqli_affected_rows($koneksi)) { //data berhasil dihapus
                                echo "<div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> berhasil dihapus....
                                        </div>";
                            } else { //data gagal masuk
                                echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> tidak jadi dihapus....
                                        </div>";
                            }
                        }


                    } elseif (isset($_GET['p'])) { //tombol ubah di #user_list diklik
                        $p = $_GET['p'];
                        if ($p == "user_edit") {
                            // echo "masuk sini";
                            $nik = $_GET['nik'];

                            $q = mysqli_query($koneksi, "SELECT nama,email,username,password,alamat,no_telepon,tipe_user FROM user WHERE nik='$nik'");
                            $d = mysqli_fetch_row($q);
                            $nama = $d[0];
                            $email = $d[1];
                            $username = $d[2];
                            $pass = $d[3];
                            $alamat = $d[4];
                            $no_telepon = $d[5];
                            $tipe_user = $d[6];
                        } elseif ($p == "tarif") {
                            $id_tarif = "";
                            $status = "";
                        } elseif ($p == "tarif_edit") {
                            $id_tarif = $_GET['id_tarif'];
                            $q = mysqli_query($koneksi, "SELECT tipe_user, tarif ,status FROM tarif WHERE id_tarif='$id_tarif'");
                            $d = mysqli_fetch_row($q);
                            $tipe_tarif = $d[0];
                            $tarif = $d[1];
                            $status = $d[2];
                        } elseif ($p == "input_meter") {
                            $id_tarif = "";
                        } elseif ($p == "input_meter_edit") {
                            $no = $_GET['no'];
                            $q = mysqli_query($koneksi, "SELECT id_pelanggan,meter_awal ,meter_akhir,pemakaian, tanggal,waktu FROM meter WHERE no='$no'");
                            $d = mysqli_fetch_row($q);
                            $id_pelanggan = $d[0];
                            $meter_awal = $d[1];
                            $meter_akhir = $d[2];
                            $pemakaian = $d[3];
                            $tgl = $d[4];
                            $waktu = $d[5];
                        }
                    }

                    // if (isset($_POST['tombol']) == "user_add"){
                    // $nik = $_POST['nik'];
                    // $nama = $_POST['nama'];
                    // $alamat = $_POST['alamat'];
                    // $tipe_user = $_POST['tipe_user'];
                    // $email = $_POST['email'];
                    // $no_telepon = $_POST['no_telepon'];
                    // $username = $_POST['username'];
                    // $pass = $_POST['password'];
                    
                    // //cek nik dan username yg dimasukkan tdk bolesh sama dg yg sudah ada ditabel user
                    // $qc = mysqli_query($koneksi, "SELECT nik FROM user WHERE nik = '$nik' OR username = '$username' ");F
                    // $jc = mysqli_num_rows($qc);
                    
                    // if (empty ($jc)){
                    // mysqli_query($koneksi, "INSERT INTO user (nik,nama,email,username,password,alamat,no_telepon,tipe_user) VALUES ('$nik',\"$nama\",'$email','$username','$pass','$alamat','$no_telepon','$tipe_user')");
                    // if (mysqli_affected_rows($koneksi) > 0){
                    //     // data berhasil masuk tabel
                    //     echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                    //     <button type=button class=btn-close data-bs-dismiss=alert></button>
                    //     <strong>login</strong> Data Berhasil Ditambahkan...
                    // </div>";
                    // } else {
                    //     // data gagal masuk tabel
                    //     echo "
                    //     <div class=\"alert alert-danger alert-dismissible fade show\">
                    //                         <button type=button class=btn-close data-bs-dismiss=alert></button>
                    //                         <strong>login</strong> Data Gagal Ditambahkan...
                    //                     </div>";
                    // } }else {//nik & username yg diinput ada ditabel user
                    //     echo "
                    //             <div class=\"alert alert-danger alert-dismissible fade show\">
                    //                 <button type=button class=btn-close pata-bs-dismiss=alert></button>
                    //                 <strong>NIK $nik atau Username $username</strong> sudah ada!
                    //             </div>";
                    // }
                    ?>
                    <div class="card mb-4" id="user_add">
                        <div class="card-header">
                            <i class="fa-solid fa-user-plus fa-fade"></i> User
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="user_form">
                                <div class="mb-3 mt-3">
                                    <label for="nik" class="form-label">NIK:</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Enter NIK" name="nik"
                                        value="<?php echo $nik ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">NAMA:</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Enter NAMA"
                                        name="nama" value="<?php echo $nama ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">EMAIL:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter EMAIL"
                                        name="email" value="<?php echo $email ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">USERNAME:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter USERNAME"
                                        name="username" value="<?php echo $username ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">PASSWORD:</label>
                                    <input type="password" class="form-control" id="pswd" placeholder="Enter PASSWORD"
                                        name="password" value="<?php echo $pass ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">ALAMAT:</label>
                                    <textarea type="text" class="form-control" rows="5" id="alamat"
                                        placeholder="Enter alamat" name="alamat"><?php echo $alamat ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">NO_TELEPON:</label>
                                    <input type="text" class="form-control" id="no_telepon"
                                        placeholder="Enter NO TELEPON" name="no_telepon"
                                        value="<?php echo $no_telepon ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_user" class="form-label">Tipe User</label>
                                    <select class="form-select" name="tipe_user" id="tipe_user">
                                        <option value="">Tipe User</option>
                                        <?php
                                        $tu = array("admin", "petugas", "bendahara", "warga");
                                        foreach ($tu as $tu2) {
                                            if ($tipe_user == $tu2)
                                                $sel = "SELECTED";
                                            else
                                                $sel = "";
                                            echo "<option value=$tu2 $sel>" . ucwords($tu2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tombol"
                                    value="user_add">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="tarif_add">
                        <div class="card-header">
                            <i class="fa-solid fa-user-plus fa-fade"></i> Tarif
                            Area Chart Example
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="tarif_form">
                                <div class="mb-3 mt-3">
                                    <label for="id_tarif" class="form-label">ID Tarif:</label>
                                    <input type="text" class="form-control" id="id_tarif"  placeholder="Enter ID Tarif"
                                        name="id_tarif" value="<?php echo $id_tarif ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_tarif" class="form-label">Tipe Tarif</label>
                                    <select class="form-select" name="tipe_tarif" id="tipe_tarif" required>
                                        <option value="">Tipe Tarif</option>
                                        <?php
                                        $tt = array("rumah", "kos");
                                        foreach ($tt as $tt2) {
                                            if ($tipe_tarif == $tt2)
                                                $sel = "SELECTED";
                                            else
                                                $sel = "";
                                            echo "<option value=$tt2 $sel>" . ucwords($tt2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tarif" class="form-label">Tarif:</label>
                                    <input type="number" class="form-control" id="tarif" placeholder="Enter Tarif"
                                        name="tarif" value="<?php echo $tarif ?>" required>
                                </div>
                                <?php
                                $st = array("AKTIF", "TDK AKTIF");
                                foreach ($st as $st2) {
                                    if ($status == $st2)
                                        $sel = "CHECKED";
                                    else
                                        $sel = "";
                                    echo "<div class=\"form-check form-check-inline \">
                                     <input type=radio class=form-check-input id=radio1 name=status value=\"$st2\" $sel> 
                                     <label class=form-check-label for=status>$st2</label>
                                 </div>";
                                }


                                ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" name="tombol"
                                        value="tarif_add">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="input_meter_add">
                        <div class="card-header">
                            <i class="fa-solid fa-water"></i> Catat Meter
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="input_meter_form">
                                <div class="mb-3">
                                    <label for="tipe_tarif" class="form-label">Nama Pelanggan</label>
                                    <select class="form-select" name="id_pelanggan" required>
                                        <option value="">Nama Pelanggan</option>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT nik,nama FROM user WHERE tipe_user ='warga' ORDER BY nama ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            if ($id_pelanggan == $d[0])
                                                $sel = "SELECTED";
                                            else
                                                $sel = "";
                                            echo "<option value=$d[0] $sel>" . ucwords($d[1]) . "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="meter_awal" class="form-label">Meter Awal (m<sup>3</sup>):</label>
                                    <input type="number" class="form-control" min="o" id="meter_awal"
                                        placeholder="Enter Meter Awal" name="meter_awal"
                                        value="<?php echo $meter_awal ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="meter_akhir" class="form-label">Meter Akhir (m<sup>3</sup>):</label>
                                    <input type="number" class="form-control" min="o" id="meter_akhir"
                                        placeholder="Enter Meter Akhir" name="meter_akhir"
                                        value="<?php echo $meter_akhir ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl" class="form-label">Tanggal:</label>
                                    <input type="date" class="form-control" id="tgl" placeholder="Enter Tanggal"
                                        name="tgl" value="<?php echo $tgl ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Waktu:</label>
                                    <input type="time" class="form-control" id="waktu" placeholder="Enter Waktu"
                                        name="waktu" value="<?php echo $waktu ?>" required>
                                </div>


                                <button type="submit" class="btn btn-primary" name="tombol"
                                    value="input_meter_add">Submit</button>


                            </form>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body"></div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <form method="post">
                                        <button type="submit" name="tombol" value="user_hapus" class="btn btn-danger"
                                            data-bs-dismiss="modal">IYA</button>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" id="user_list">
                        <div class="card-header">
                            Database Air Anda
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Tipe user</th>
                                        <th>Editing</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php
                                    $q = mysqli_query($koneksi, "SELECT nik,nama,email,username,alamat,no_telepon, tipe_user FROM user ORDER BY tipe_user ASC, nama ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $nik = $d[0];
                                        $nama = $d[1];
                                        $email = $d[2];
                                        $username = $d[3];
                                        $alamat = $d[4];
                                        $no_telepon = $d[5];
                                        $tipe_user = $d[6];

                                        echo "<tr>
                                        <td>$nik</td>
                                        <td>$nama</td>
                                        <td>$email</td>
                                        <td>$username</td>
                                        <td>$alamat</td>
                                        <td>$no_telepon</td>
                                        <td>$tipe_user</td>
                                        <td>
                                            <a href = 'index.php?p=user_edit&nik=$nik'><button type=button class=\"btn btn-sm btn-outline-primary\">Ubah</button></a>
                                            <button type=button class=\"btn btn-outline-danger btn-sm\" data-bs-toggle=modal data-bs-target=#myModal data-nik=$nik>Hapus</button> 
                                        </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4" id="tarif_list">
                        <div class="card-header">
                            Database Tarif
                        </div>
                        <div class="card-body">
                            <table id="tarif_table">
                                <thead>
                                    <tr>
                                        <th>ID Tarif</th>
                                        <th>Tipe Tarif</th>
                                        <th>Tarif</th>
                                        <th>Status</th>
                                        <th>Editing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = mysqli_query($koneksi, "SELECT id_tarif,tipe_user,tarif,status FROM tarif ORDER BY id_tarif ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $id_tarif = $d[0];
                                        $tipe_tarif = $d[1];
                                        $tarif = $d[2];
                                        $status = $d[3];

                                        echo "<tr>
                                        <td>$id_tarif</td>
                                        <td>$tipe_tarif</td>
                                        <td>$tarif</td>
                                        <td>$status</td>
                                        <td>
                                            <a href = 'index.php?p=tarif_edit&id_tarif=$id_tarif'><button type=button class=\"btn btn-sm btn-outline-primary\">Ubah</button></a>
                                            <button type=button class=\"btn btn-outline-danger btn-sm\" data-bs-toggle=modal data-bs-target=#myModal data-id_tarif=$id_tarif>Hapus</button> 
                                        </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4" id="input_meter_list">
                        <div class="card-header">
                            Data Meter
                        </div>
                        <div class="card-body">
                            <table id="input_meter_table">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Meter Awal (m<sup>3</sup>)</th>
                                        <th>Meter Akhir (m<sup>3</sup>)</th>
                                        <th>Pemakaian (m<sup>3</sup>) </th>
                                        <th>Tanggal dan Waktu</th>
                                        <th>Petugas Pencatat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $e = explode("=", $_SERVER['REQUEST_URI']);
                                    if ($e[1] == "input_meter" || $e[1] == "input_meter_edit&no") {
                                        $q = mysqli_query($koneksi, "SELECT * FROM meter ORDER BY tanggal DESC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            $no = $d[0];
                                            $id_pelanggan = ucwords($te2d->nik_to_nama($d[1]));
                                            $meter_awal = $d[2];
                                            $meter_akhir = $d[3];
                                            $pemakaian = $d[4];
                                            $tgl = $te2d->tgl_balik($d[5]);
                                            $waktu = $d[6];
                                            $id_pencatat = ucwords($te2d->nik_to_nama($d[7]));

                                            echo "<tr>
                                        <td>$id_pelanggan</td>
                                        <td>$meter_awal (m<sup>3</sup>)</td>
                                        <td>$meter_akhir (m<sup>3</sup>)</td>
                                        <td>$pemakaian (m<sup>3</sup>)</td>
                                        <td>$tgl $waktu</td>
                                        <td>$id_pencatat</td>
                                        <td>
                                            <a href = index.php?p=input_meter_edit&no=$no><button type=button class=\"btn btn-sm btn-outline-primary\">Ubah</button></a>
                                            <button type=button class=\"btn btn-outline-danger btn-sm\" data-bs-toggle=modal data-bs-target=#myModal data-no=$no>Hapus</button> 
                                        </td>
                                        </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/air.js"></script>
</body>

</html>