<?php
session_start();
include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");

if($_GET['id']==null){
	header('location:index.php');
} else {
	$idjobnya = $_GET['id'];
	$jobname = mysqli_query($conn,"select * from applicant_job where id='$idjobnya'");
	$p=mysqli_fetch_array($jobname);
	$namajob = $p['jobname'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
    body {
        overflow-x: hidden
    }
    </style>
    <title>Daftar SI-StuTa</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->

    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/css_daftar/style.css">
    <link href="assets/css/theme.css" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-144808195-1');
    </script>


    <script type="text/javascript">
    function capitalize(textboxid, str) {
        // string with alteast one character
        if (str && str.length >= 1) {
            var firstChar = str.charAt(0);
            var remainingStr = str.slice(1);
            str = firstChar.toUpperCase() + remainingStr;
        }
        document.getElementById(textboxid).value = str;
    }
    </script>

</head>

<body class="form-v10">
    <!-- ======= Nav ======= -->
    <main class="main" id="top">

        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand d-flex align-items-center fw-bolder fs-2 fst-italic"
                    href="landing.php">
                    <div class="text-info">SI-</div>
                    <div class="text-warning">StuTa</div>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
                        <li class="nav-item px-2"><a class="nav-link fw-medium"">Halo, Delvy</a></li>
                </ul>
            </div>
            </div>
        </nav>
    </main><!-- End Nav -->
    <div>
        <div>
            <div class=" bg-holder" style="background-image:url(assets/img/illustrations/footer.png);background-position:left top;background-size:initial;margin-top:200px;"></div>
                <div class="container">
                    
                    <form method="POST" id="signup-form" class="signup-form" action="#">
                        <div>
                            <h3>Data Pribadi</h3>
                            <fieldset>
                                <h2>Data Pribadi</h2>
                                <p class="desc">Silahkan memasukkan informasi anda berdasarkan data yang diperlukan berikut</p>
                                <div class="fieldset-content">
                                    <div class="form-row">
                                        <label class="form-label">Nama</label>
                                        <div class="form-flex">
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name" />
                                                <span class="text-input">Depan</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" />
                                                <span class="text-input">Belakang</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pria" value="pria">
                                        <p class="form-check-label" for="pria">Pria</p>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wanita" value="wanita">
                                        <p class="form-check-label" for="wanita">Wanita</p>
                                    </div><br><br>

                                    <div class="form-date">
                                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                        <div class="form-date-group">
                                            <div class="form-date-item">
                                                <select id="birth_date" name="birth_date"></select>
                                                <span class="text-input">Tanggal</span>
                                            </div>
                                            <div class="form-date-item">
                                                <select id="birth_month" name="birth_month"></select>
                                                <span class="text-input">Bulan</span>
                                            </div>
                                            <div class="form-date-item">
                                                <select id="birth_year" name="birth_year"></select>
                                                <span class="text-input">Tahun</span>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" />
                                        <span class="text-input">Alamat domisili</span>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="kemampuan" class="form-label">Skill</label>
                                        <input type="text" name="kemampuan" id="kemampuan" />
                                        <span class="text-input">Keahlian khusus</span>
                                    </div><br>
                                    
                                    <!--<div class="form-group">
                                        <label for="deskripsi" class="form-label">Deskripsi Diri</label>
                                        <textarea name="deskripsi" rows="13" cols="55" id="deskripsi"  id="deskripsi"></textarea>

                                        <span class="text-input">Deskripsi singkat diri</span>
                                    </div>-->

                                </div>
                            </fieldset>

                            <h3>Berkas Identitas</h3>
                            <fieldset>
                                <h2>Berkas Identitas</h2>
                                <p class="desc">Silahkan upload berkas identitas mahasiswa anda *PDF max 5mb</p>
                                
                                <div class="fieldset-content">
                                    <div class="form-row">
                                        <div class="custom-file">
                                            <label>Kartu Tanda Mahasiswa</label>
                                            <input type="file" name="file" class="form-control-file border" accept="application/pdf"
                                                >
                                            <span class="text-input">KTM</span>
                                        </div><br><br>
                                        <div class="form-row">
                                            <div class="custom-file">
                                                <label>Curriculum Vitae</label>
                                                <input type="file" name="file" class="form-control-file border" accept="application/pdf"
                                                    >
                                            </div>
                                            <span class="text-input">CV</span>
                                        </div><br><br>
                                        <div class="form-row">
                                            <div class="custom-file">
                                                <label>Kartu Rencana Studi</label>
                                                <input type="file" name="file" class="form-control-file border" accept="application/pdf"
                                                    >
                                                <span class="text-input">KRS</span>
                                            </div>
                                        </div><br><br>
                                        <div class="form-row">
                                            <div class="custom-file">
                                                <label>Kartu Hasil Studi</label>
                                                <input type="file" name="file" class="form-control-file border" accept="application/pdf"
                                                    >
                                                <span class="text-input">KHS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h3>Kontak dan Media Sosial</h3>
                            <fieldset>
                                <h2>Kontak dan Media Sosial</h2>
                                <p class="desc">Silahkan mengisi data kontak media sosial yang dapat dihubungi</p>
                                <div class="fieldset-content">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" />
                                        <span class="text-input">Email aktif</span>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="nohp" class="form-label">No Kontak</label>
                                        <input type="text" name="nohp" id="nohp" />
                                        <span class="text-input">No WhatApp</span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
            <!-- JS -->
            <script src="vendor/vendor_apply/jquery/jquery.min.js"></script>
            <script src="vendor/vendor_apply/jquery-validation/dist/jquery.validate.min.js"></script>
            <script src="vendor/vendor_apply/jquery-validation/dist/additional-methods.min.js"></script>
            <script src="vendor/vendor_apply/jquery-steps/jquery.steps.min.js"></script>
            <script src="vendor/vendor_apply/minimalist-picker/dobpicker.js"></script>
            <script src="vendor/vendor_apply/nouislider/nouislider.min.js"></script>
            <script src="vendor/vendor_apply/wnumb/wNumb.js"></script>
            <script src="js/js_apply/main.js"></script>
</body>

</html>