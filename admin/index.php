<?php 
	session_start();
	date_default_timezone_set("Asia/Bangkok");
	$timezone = date_default_timezone_get();
	$date_now = date("Y-m-d");
	include '../dbconnect.php';
	// if(!isset($_SESSION['log'])){
	// 	echo '<script>
    //             alert("Anda belum login");
    //             window.location.href="login.php";
    //         </script>';
	// }
	
	if (isset($_POST["submit"])) {
		$jobname=mysqli_real_escape_string($conn,$_POST['jobname']);
		$req=mysqli_real_escape_string($conn,$_POST['requirement']);
		$close_date=$_POST['close_date'];
		
		$nama_file = $_FILES['img']['name'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
		$random = md5(uniqid($nama_file, true) . time());
		$ukuran_file = $_FILES['img']['size'];
		$tipe_file = $_FILES['img']['type'];
		$tmp_file = $_FILES['img']['tmp_name'];
		$path = "job/".$random.'.'.$ext;


		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		  if($ukuran_file <= 1000000){ 
			if(move_uploaded_file($tmp_file, $path)){ 
			
			  $query = "insert into applicant_job values('','$jobname','$req','$close_date','$path')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			  if($sql){ 
				
				echo '<script>
                alert("Berhasil");
                window.location.href="index.php";
            </script>';
					
			  }else{
				// Jika Gagal, Lakukan :
				echo '<script>
                alert("Data gagal disimpan");
                window.location.href="index.php";
            </script>';
			  }
			}else{
			  // Jika gambar gagal diupload, Lakukan :
			  echo '<script>
                alert("File gagal diupload");
                window.location.href="index.php";
            </script>';
			}
		  }else{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo '<script>
                alert("File harus dibawah 1mb");
                window.location.href="index.php";
            </script>';
		  }
		}else{
		  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		  echo '<script>
                alert("File harus JPG/PNG");
                window.location.href="index.php";
            </script>';
		}
	
	};
	
	
?>
<html>

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Application Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php">
						<div class="text-info">Sistem Informasi</div><div class="text-warning">StuTa</div></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="index.php"><i class="ti-dashboard"></i><span>Manage Job</span></a>
                            </li>
							<li>
                                <a href="applicant.php"><i class="ti-dashboard"></i><span>Manage Applicant</span></a>
                            </li>
							<li>
                                <a href="scheduling.php"><i class="ti-dashboard"></i><span>Scheduling</span></a>
                            </li>
                            <li>
                                <a href="logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <h2>Hi!</h2>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
		
			

            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Manage Job</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Job Baru</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Job Image</th>
												<th>Job Name</th>
												<th>Job Requirement</th>
												<th>Close Date</th>
												<th>Status</th>
												<th>Action</th>
												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$job=mysqli_query($conn,"SELECT * from applicant_job order by id ASC");
											$no=1;
											while($p=mysqli_fetch_array($job)){
													$date2 = $p['close_date'];
													$namajob = $p['jobname'];
													$idjob = $p['id'];
													$gamber = $p['img'];
													$status='';
													if($date2>$date_now){
														$status = 'Active';
													} else {
														$status = 'Inactive';
													}
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><img src="<?php echo $p['img'] ?>" width="100" height="100" \></td>
													<td><?php echo $namajob ?></td>
													<td><?php echo $p['requirement'] ?></td>
													<td><?php echo $date2;?></td>
													<td><?php echo $status;?></td>
													<td>
													<form method="post">
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														  Action
														</button>
														<div class="dropdown-menu">
														  <input name="id" type="hidden" value="<?php echo $idjob ?>">
														  <input type="button" class="dropdown-item" data-toggle="modal" data-target="#activejob<?php echo $idjob ?>" value="Edit" \>
														  <input type="submit" class="dropdown-item" name="hapus1" value="Delete" \>
														</div>
													</form>
													</td>
												</tr>

											<!-- modal input -->
														<div id="activejob<?php echo $idjob ?>" class="modal fade">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Edit Job</h4>
																	</div>
																	<div class="modal-body">
																		<form method="post">
																			<div class="form-group">
																				<label>Nama Posisi</label>
																				<input name="editjob" type="text" class="form-control" value="<?php echo $p['jobname'] ?>">
																			</div>
																			<div class="form-group">
																				<label>Kualifikasi</label>
																				<input name="editreq" type="text" class="form-control" value="<?php echo $p['requirement'] ?>">
																			</div>
																			<div class="form-group">
																				<label>Tanggal berakhir</label>
																				<input name="editdate" type="date" class="form-control" value="<?php echo $date2 ?>">
																				<input name="id" type="hidden" value="<?php echo $idjob ?>">
																			</div>

																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
																			<input type="submit" name="simpan2" class="btn btn-primary" value="Simpan">
																		</div>
																	</form>
																</div>
															</div>
														</div>

												
												<?php 
												
											}
											
											if(isset($_POST["hapus1"])){
													$id = $_POST['id'];
													$delgam = mysqli_query($conn,"select * from applicant_job where id='$id'");
													$gamb = mysqli_fetch_array($delgam)['img'];
													unlink($gamb);
													$hapusin = mysqli_query($conn,"delete from applicant_job where id='$id'");
													if($hapusin){
														
														echo '<script>
																alert("Berhasil menghapus data");
																window.location.href="index.php";
															</script>';
													} else {
														echo '<script>
																alert("Gagal menghapus data");
																window.location.href="index.php";
															</script>';
													}
												};
												
											if(isset($_POST["simpan2"])){
												$id = $_POST['id'];
												$editjob = $_POST['editjob'];
												$editreq = $_POST['editreq'];
												$editdate = $_POST['editdate'];
													$simpanin = mysqli_query($conn,"update applicant_job set jobname='$editjob', requirement='$editreq', close_date='$editdate' where id='$id'");
													if($simpanin){
														echo '<script>
																alert("Berhasil mengubah data");
																window.location.href="index.php";
															</script>';
													} else {
														echo '<script>
																alert("Gagal mengubah data");
																window.location.href="index.php";
															</script>';
													}
												};
											?>
										</tbody>
										</table>
                                    </div>
									<!--
									<a href="exportstkbhn.php" target="_blank" class="btn btn-info">Export Data</a>
									-->
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
					
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>By Richard's Lab</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Job Baru</h4>
						</div>
						<div class="modal-body">
							<form action="index.php" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Posisi</label>
									<input name="jobname" type="text" class="form-control" placeholder="Nama Posisi" required>
								</div>
								<div class="form-group">
									<label>Kualifikasi</label>
									<input name="requirement" type="text" class="form-control" placeholder="Kualifikasi">
								</div>
								<div class="form-group">
									<label>Tanggal berakhir</label>
									<input name="close_date" type="date" class="form-control">
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input name="img" type="file" class="form-control">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
	
</body>

</html>
