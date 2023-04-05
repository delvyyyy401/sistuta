<?php
    require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SI-StuTa</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/UKDW.png" <meta content=""
        name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="css/css_mainview/vendor/aos/aos.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="css/css_mainview/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/css_mainview/style.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet" />

    <!-- PopUp Modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <!--/.bg-holder-->
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-2 text-center">
                    <h1>Selamat datang!</h1>
                    <h2>Sekarang kamu bisa daftar lowongan volunteer yang tersedia berikut!</h2>
                </div>
            </div>
            <div class="row">
                <div class="row icon-boxes">
                    <?php
                        $sql = mysqli_query($conn,"SELECT * FROM applicant_job where close_date>=NOW() ORDER BY id ASC");
                            while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                    ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-10 mb-lg-0" data-aos="zoom-out"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div align="center" style="padding:2%">
                                <div class="text-center">
                                    <img src="assets/img/illustrations/biro3.png" height="100" alt="" />
                                </div>
                            </div>
                            <br>
                            <h4 class="title">
                                <input type="hidden" name="id" value="<?=$id;?>">    
                                <a href="#" data-backdrop="false" data-toggle="modal" data-target="#view<?=$id;?>"><?php echo $row["jobname"]; ?></a>
                            </h4>
                            <p class="description"><?php echo $row["requirement"]; ?>
                        </div>
                    </div>


                    <!-- View Modal -->
                    <div class="modal fade" id="view<?=$id;?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Volunteer <?php echo $row["jobname"]; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p><?php echo $row["requirement"]; ?></p>
                                    <br>
                                    <input type="hidden" name="id" value="<?=$id;?>">
                                    <a href="apply.php?id=<?=$id;?>" class="btn btn-primary">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } //end of while
                    ?>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
    <div class="bg-holder" style="background-image:url(assets/img/illustrations/footer.png);background-position:left top;background-size:initial;margin-top:200px;"></div>
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Cerita Para Volunteer</h2>
                <p>Menjadi volunteer memberikan banyak manfaat dan keuntungan buat kamu lho! Yuk dengerin apa kata para
                    Volunter Student Staff UKDW berikut.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Sejak menjadi volunteer di UKDW, saya mendapat banyak pengalaman kerja yang sangat berharga 
                                dimana hal ini akan berguna untuk mempersiapkan skill kerja di masa yang akan datang. Ga sia-sia
                                deh pokoknya!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="images/img_mainview/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="">
                            <h3>Dean Damianus</h3>
                            <h4>Volunteer Admisi &amp; Promosi</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Sejak menjadi volunteer di UKDW, saya mendapat banyak pengalaman kerja yang sangat berharga 
                                dimana hal ini akan berguna untuk mempersiapkan skill kerja di masa yang akan datang. Ga sia-sia
                                deh pokoknya!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="images/img_mainview/testimonials/testimonials-2.jpg" class="testimonial-img"
                                alt="">
                            <h3>Delvy T. Sandatoding</h3>
                            <h4>Volunteer Admisi &amp; Promosi</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Sejak menjadi volunteer di UKDW, saya mendapat banyak pengalaman kerja yang sangat berharga 
                                dimana hal ini akan berguna untuk mempersiapkan skill kerja di masa yang akan datang. Ga sia-sia
                                deh pokoknya!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="images/img_mainview/testimonials/testimonials-3.jpg" class="testimonial-img"
                                alt="">
                            <h3>Maria Valencien</h3>
                            <h4>Volunteer Biro 3</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Sejak menjadi volunteer di UKDW, saya mendapat banyak pengalaman kerja yang sangat berharga 
                                dimana hal ini akan berguna untuk mempersiapkan skill kerja di masa yang akan datang. Ga sia-sia
                                deh pokoknya!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="images/img_mainview/testimonials/testimonials-4.jpg" class="testimonial-img"
                                alt="">
                            <h3>Natasha Angelica</h3>
                            <h4>Volunteer Centrino</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Sejak menjadi volunteer di UKDW, saya mendapat banyak pengalaman kerja yang sangat berharga 
                                dimana hal ini akan berguna untuk mempersiapkan skill kerja di masa yang akan datang. Ga sia-sia
                                deh pokoknya!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="images/img_mainview/testimonials/testimonials-5.jpg" class="testimonial-img"
                                alt="">
                            <h3>Fachrol Rossi</h3>
                            <h4>Volunteer PPLK</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="css/css_mainview/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="css/css_mainview/vendor/aos/aos.js"></script>
    <script src="css/css_mainview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="css/css_mainview/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="css/css_mainview/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="css/css_mainview/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="css/css_mainview/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="css/css_mainview/js/main.js"></script>

</body>

</html>