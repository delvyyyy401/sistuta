<?php
    session_start();
    include 'dbconnect.php';
    $alert = '';

    if(isset($_SESSION['role'])){
        header("location:index.php");
    }

    if(isset($_POST['btn-daftar']))
    {
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //cek apakah email sudah pernah digunakan
    $lihat1 = mysqli_query($conn,"select * from applicant_login where email='$email'");
    $lihat2 = mysqli_num_rows($lihat1);
    
    if($lihat2 < 1){
        //email belum pernah digunakan
        $insert = mysqli_query($conn,"insert into applicant_login (username, nama, email, password) values ('$username','$nama','$email','$password')");
            
            //eksekusi query
            if($insert){
                echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
                <meta http-equiv='refresh' content='2; url= admin/signin.php'/>  ";
            } else {
                //daftar gagal
                echo "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
                <meta http-equiv='refresh' content='2'>";
            }

        }
    else
        {
        //jika email sudah pernah digunakan
        $alert = '<strong><font color="red">Email telah terdaftar, silahkan menggunakan email yang';
        echo $alert;
        echo '<meta http-equiv="refresh" content="2">';
        }
    
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/UKDW.png"

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/fonts_signup/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/css_signup/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label><i class="zmdi zmdi-pin-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="username" autofocus placeholder="Username"/ required>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-email"></i></label>
                                <input type="email" class="form-control" name="email"placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="form-control" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" class="agree-term" />
                                <label class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div>
                                <button class="form-submit" type="submit" name="btn-daftar">
                                    Sign Up
                                </button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <div>
                            <label for="agree-term" class="label-agree-term "><span><span></span></span>Sudah punya akun? <a href="admin/login.php" class="term-service">Masuk</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>