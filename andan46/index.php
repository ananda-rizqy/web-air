<?php
include "./assets/func.php";
$te2d = new klas_te2d;
$koneksi = $te2d->koneksi();

// //query ambil data dari tabel user
// $q = mysqli_query($koneksi, "SELECT nik,nama,email,username,password FROM user ORDER BY nama ASC,tipe_user");
//  while ($d = mysqli_fetch_row($q)) {
//     $nik = $d[0];
//     $user = $d[3];
//     $pass = $d[4];
//     $pass_enkripsi = password_hash($user, PASSWORD_DEFAULT);
//     echo "tipe: $tipe | user: $user | pass: $pass <BR>";
//     $tipe = $d[5];

// //mengubah password = username yg terenkripsi
// mysqli_query($koneksi, "UPDATE user SET password=\"$pass_enkripsi\" WHERE nik='$nik'");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login - SB Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
  <section class="vh-100" style="background: rgb(16,16,240); background: linear-gradient(90deg, rgba(16,16,240,1) 0%, rgba(68,241,242,1) 35%, rgba(0,31,255,1) 100%)">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="air_anda.jpg.png" alt="login form" class="img-fluid" style="margin-top:150px" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <?php
                  if (isset($_POST['tombol'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    // echo "username: $username | password: $password<BR>";


                    //verifikasi
                    //cek user tsb ada atau tdk di tabel user
                    $qc = mysqli_query($koneksi, "SELECT username, password FROM user WHERE username='$username'");
                    $dc = mysqli_fetch_row($qc);
                    if (!empty($dc[0]))
                      $user_cek = $dc[0];

                    //jika username yg diisi ada di tabel user
                    if (!empty($user_cek)) {

                      $pass_cek = $dc[1];
                      //cek password
                      if (password_verify($password, $pass_cek)) {

                        //daftarkan session
                        session_start();
                        $_SESSION['user'] = $username;
                        $_SESSION['pass'] = $password;

                        //redirect ke dashboard page
                        echo "<script>window.location.replace('./login/index.php')</script>";
                      } else
                        echo "
                                        <div class=\"alert alert-danger alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Login</strong> salah....
                                        </div>";
                    } else { //jika username yang diisikan tdk ada ditabel user
                      echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\">
                                    <button type=button class=btn-close data-bs-dismiss=\alert></button>
                                    <strong>Username</strong> tidak ditemukan....
                                </div>";
                    }
                  }
                  ?>

                  <form method="post" class="need-validation">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <img src="letter-a.png" alt="" style="height: 40px;">
                      <span class="h1 fw-bold mb-0" style="margin-left: 20px;">Welcome</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="username" id="form2Example17" class="form-control form-control-lg"
                        required />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg"
                        required />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" name="tombol" value="login"
                        type="submit">Login</button>
                    </div>

                    <a class="small text-muted" href="#!"></a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Mengalir Sampai Ujung<a href="#!"
                        style="color: #393f81;"></a></p>
                    <a href="#!" class="small text-muted"></a>
                    <a href="#!" class="small text-muted">Desain oleh Ananda & Dandy Politeknik Negeri Semarang</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>