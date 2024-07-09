<?php
include "func.php";
$te2d = new klas_te2d;
$koneksi = $te2d->koneksi();

if (isset($_POST['p'])) {
    $p = $_POST['p'];
    if ($p == "summary") {
        $q = mysqli_query($koneksi, "SELECT SUM(pemakaian) as pemakaian FROM meter");
        $d = mysqli_fetch_array($q);
        $summary[] = array('total_vol' => $d['pemakaian']);

        $q = mysqli_query($koneksi, "SELECT COUNT(nik) as jml_pelanggan FROM user WHERE tipe_user = 'warga'");
        $d = mysqli_fetch_array($q);
        $summary[] = array('plg_jml' => $d['jml_pelanggan']);

        $q = mysqli_query($koneksi, "SELECT user.nik FROM user JOIN meter ON user.nik=meter.id_pelanggan GROUP BY user.nik");
        $j = mysqli_num_rows($q);
        $summary[] = array('plg_catat' => $j);

        echo json_encode($summary);
    }
}
?>