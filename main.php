<?php
require 'dbconnect.php';
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SI-StuTa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/UKDW.png" <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/images/img_mainview/favicon.png" rel="icon">
    <link href="assets/images/img_mainview/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="css/css_mainview/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    body {
        background-color: #dea81c
    }

    .jumbotron {
        background-color: #2b2b2b;
        color: #ecdcc4;
        text-align: center
    }

    .row {
        margin-top: 5%
    }

    .container {
        margin-bottom: 7%
    }

    a {
        color: #ecdcc4;
        text-decoration: none
    }
    </style>
</head>

<body>

    <div class="wraper">

        <!-- header end -->

        <div class="jumbotron jumbotron-fluid">
            <h1>Richard's Lab</h1>
            <p>Start Your Career!</p>
            <a href="admin" class="btn btn-info">Login as admin</a>
        </div>

        <!-- blog area start -->
        <div class="blog-area pb-70" style="margin-top:5%">
            <div class="container-fluid">
                <div class="section-title text-center mb-50">
                    <h3>Available Jobs</h3>
                </div>

                <!-- ======= Hero Section ======= -->
                <section id="hero" class="d-flex align-items-center">
                    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                        <div class="row icon-boxes">
                            <!-- Template Main CSS File -->

                            <div class="row">
                                <?php
                                  $sql = mysqli_query($conn,"SELECT * FROM applicant_job where close_date>=NOW() ORDER BY id ASC");
                                  while ($row = mysqli_fetch_array($sql)) {
                                        $id = $row['id'];
                                ?>

                                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                                  <div class="icon-box">
                                    <div align="center" style="padding:2%">
                                      <img class="card-img-top" src="admin/<?php echo $row['img'] ?>" alt="Job"style="width:200px">
                                    </div>
                                    <h4 class="title"><a href="#" data-toggle="modal" data-target="#view<?=$id;?>"><?php echo $row["jobname"]; ?></a></h4>
                                    <p class="description"><?php echo $row["requirement"]; ?>
                                  </div>
                                </div>

                                <!-- View Modal -->
                                <div class="modal fade" id="view<?=$id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo $row["jobname"]; ?></h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <h3><?php echo $row["requirement"]; ?></h3>
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
                </section><!-- End Hero -->




            </div>
        </div>
        <!-- blog area end -->

    </div>

</body>

</html>