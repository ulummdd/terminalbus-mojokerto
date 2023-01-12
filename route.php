<?php

	include_once("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<title>Rute - Bus Mojokerto</title>
</head>
<body>

  	<!--mobile-->
  	<ul class="sidenav" id="mobile-demo">
    	<li><a href="sass.html">Sass</a></li>
    	<li><a href="badges.html">Components</a></li>
    	<li><a href="collapsible.html">Javascript</a></li>
    	<li><a href="mobile.html">Mobile</a></li>
  	</ul>
  	<!--end-->

  	<div class="row">
  		<div class="col s3 sidebar">
  			<center>
  				<a href="dashboard.php" class="brand-logo">
     				<img src="img/logo.png">
     			</a>
     			<div class="menu-sidebar">
     				<ul>
     					<li>
     						<a href="dashboard.php">Dashboard</a>
     					</li>
     					<li>
     						<a href="schedule.php">Jadwal</a>
     					</li>
     					<li class="activated">
     						<a href="route.php">Rute</a>
     					</li>
     					<li>
     						<a href="coupon.php">Kupon</a>
     					</li>
     				</ul>
     			</div>
     			<div class="logout">
     				<a href="logout.php" class="btn-logout">Keluar</a>
     			</div>
     		</center>
  		</div>
  		<div class="col s9 navbar" style="padding:0px !important;">
  			<nav>
    			<div class="nav-wrapper">
    				<span class="align-left time">
    					<?php
    						date_default_timezone_set("Asia/Jakarta");
    						echo date('<b>' . "l</b>, M Y");
    					?>
    				</span>
      				<a href="#" data-target="mobile-demo" class="sidenav-trigger">
      					<i class="material-icons">menu</i>
      				</a>
      				<ul class="right hide-on-med-and-down" style="margin-right:17px;">
        				<li>
        					<a href="coupon.php" class="coupon">
        						<i class="material-icons kupon" style="color:#191919">confirmation_number</i>
        						<b>
        				<?php
  							$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
							$run = mysqli_fetch_array($user);
							$id_user = $run['id'];
							$jumlah_kupon = mysqli_query($connect, "SELECT count(*) AS jumlahkupon FROM kupon WHERE id_user = '$id_user'");
							$hasil_kupon = mysqli_fetch_array($jumlah_kupon);
							echo "{$hasil_kupon['jumlahkupon']}";
						?>							
								</b>
        					</a>
        				</li>
        				<li style="margin-bottom:24px;">
        					<a href="profile.php" style="margin-top:2px;">
        						<div>
        							<i class="material-icons" style="font-size:36px;color:#333;">person</i>
        						</div>
        					</a>
        				</li>
      				</ul>
    			</div>
  			</nav>
  			<div class="row dashboard">
  				<div class="col s12 dashboard-content">
  					<h4>Rute</h4>
  					<h6>Cek rute yang dilewati oleh Bus Mojokerto.</h6>
  					<div class="listjadwal">
  						<button data-target="modal1" class="btn modal-trigger btn-halte">Halte SMA Negeri 1 Mojokerto <marquee direction="right" style="width:20px;height:28px;">> > ></marquee> Halte Bus Jl. Ahmad Yani</button>
  						<button data-target="modal2" class="btn modal-trigger btn-halte">Halte Gajah Mada <marquee direction="right" style="width:20px;height:28px;">> > ></marquee> Halte Bhayangkara</button>
  						<button data-target="modal3" class="btn modal-trigger btn-halte">Terminal Kertajaya Mojokerto <marquee direction="right" style="width:20px;height:28px;">> > ></marquee> Halte Raya Ijen</button>
  						<button data-target="modal4" class="btn modal-trigger btn-halte">Halte Pahlawan <marquee direction="right" style="width:20px;height:28px;">> > ></marquee> Halte SMA Negeri 1 Sooko Mojokerto</button>
  					</div>
  					<div class="listmodal">
  						<div id="modal1" class="modal">
    						<div class="modal-content modal1kotak">
      							<h6 style="font-weight:bolder;color:#191919;">Halte SMA Negeri 1 Mojokerto <marquee direction="right" style="width:20px;height:14px;">> > ></marquee> Halte Bus Jl. Ahmad Yani</h6>
      							<p style="color:#555;">Berikut gambar rute Bus Mojokerto dari <b style="color:#191919;">Halte SMA Negeri 1 Mojokerto</b> sampai dengan <b style="color:#191919;">Halte Bus Jl. Ahmad Yani.</b></p>
      							<p style="font-size:12px;font-weight:bolder;">*Rute dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<img src="img/rute-sma-ahmadyani.png" class="img-rute materialboxed">
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal2" class="modal">
    						<div class="modal-content modal1kotak">
      							<h6 style="font-weight:bolder;color:#191919;">Halte Gajah Mada <marquee direction="right" style="width:20px;height:14px;">> > ></marquee> Halte Bhayangkara</h6>
      							<p style="color:#555;">Berikut gambar rute Bus Mojokerto dari <b style="color:#191919;">Halte Gajah Mada</b> sampai dengan <b style="color:#191919;">Halte Bhayangkara.</b></p>
      							<p style="font-size:12px;font-weight:bolder;">*Rute dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<img src="img/rute-bhayangkara-gajah.png" class="img-rute materialboxed">
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal3" class="modal">
    						<div class="modal-content modal1kotak">
      							<h6 style="font-weight:bolder;color:#191919;">Terminal Kertajaya Mojokerto <marquee direction="right" style="width:20px;height:14px;">> > ></marquee> Halte Raya Ijen</h6>
      							<p style="color:#555;">Berikut gambar rute Bus Mojokerto dari <b style="color:#191919;">Terminal Kertajaya Mojokerto</b> sampai dengan <b style="color:#191919;">Halte Raya Ijen.</b></p>
      							<p style="font-size:12px;font-weight:bolder;">*Rute dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<img src="img/rute-kertajaya-ijen.png" class="img-rute materialboxed">
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal4" class="modal">
    						<div class="modal-content modal1kotak">
      							<h6 style="font-weight:bolder;color:#191919;">Halte Pahlawan <marquee direction="right" style="width:20px;height:14px;">> > ></marquee> Halte SMA Negeri 1 Mojokerto</h6>
      							<p style="color:#555;">Berikut gambar rute Bus Mojokerto dari <b style="color:#191919;">Halte Pahlawan</b> sampai dengan <b style="color:#191919;">Halte SMA Negeri 1 Mojokerto.</b></p>
      							<p style="font-size:12px;font-weight:bolder;">*Rute dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<img src="img/rute-sma-pahlawan.png" class="img-rute materialboxed">
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.sidenav').sidenav();
    	$('.modal').modal();
    	$('.materialboxed').materialbox();
  	});
</script>
</body>
</html>