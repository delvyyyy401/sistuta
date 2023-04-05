<?php
session_start();
include '../dbconnect.php';

	//Alert
	if(isset($_GET['m'])){
			if($_GET['m'] == "g"){
				echo '<script>
					alert("Username atau Password Anda salah");
					window.location.href="login.php";
				</script>';
			}else if($_GET['m'] == "l"){
				echo "Anda berhasil keluar dari sistem";
			}else if($_GET['m'] == "bl"){
				echo "Anda harus Login";
			}
	}


	if(isset($_POST['subm']))
	{
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));

 	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($conn,"select * from applicant_login where username='$username' and password='$password';");

	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);
 
	// cek apakah username dan password di temukan pada database
		if($cek > 0){
		 
			$data = mysqli_fetch_assoc($login);

				// buat session login dan username
				$_SESSION['id'] = $data['id'];
				$_SESSION['log'] = "Logged";
				echo '<script>
					alert("Login Berhasil!");
					window.location.href="index.php";
				</script>';
			//	header('location:index.php');
				 
		}
		else {
				  header("location:login.php?m=g");
		}
		
	}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/fonts_signup/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/css_signup/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/UKDW.png" <!-- Global site tag (gtag.js) -
        Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-144808195-1');
    </script>
    <!--===============================================================================================-->
</head>

<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../images/signin-image.jpg" alt="sing up image"></figure>
                        <div>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Belum punya akun?
                                <a href="../signup.php" class="term-service">Buat akun</a></label>
                        </div>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form validate-form">
                            <div class="form-group validate-input" data-validate="Username is required">
								<label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" required/>
                            </div>


                            <div class="form-group validate-input" data-validate="Password is required">
								<label for="pass"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>

                            <div>
                                <button class="form-submit" name="subm" type="submit">
                                    Sign in
                                </button>
                            </div>

                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
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