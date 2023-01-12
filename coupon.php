<?php
	
	error_reporting(E_ERROR | E_PARSE);
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
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<title>Kupon - Bus Mojokerto</title>
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
     					<li>
     						<a href="route.php">Rute</a>
     					</li>
     					<li class="activated">
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
  					<h4>Kupon</h4>
  					<h6>Gunakan atau tukarkan kupon Bus Mojokerto.</h6>
  					<div class="row" style="margin-top:30px;">
  						<div class="col s3">
  							<center>
  							<button data-target="modal1" class="btn modal-trigger btn-kupon">
  								<i class="material-icons logokupon" style="color:#191919">confirmation_number</i>
  								<b>Gunakan kupon</b>
  							</button>
  							</center>
  						</div>
  						<div class="col s9">
  							<div class="notekupon">
  								<b>Catatan:</b> Untuk mendapatkan satu kupon Bus Mojokerto, anda harus memberikan sampah botol plastik <b>(Untuk ukuran normal sebanyak 5 buah, ukuran besar sebanyak 3 buah)</b> yang sesuai dengan ketentuan ke <b>pos penampungan sampah botol plastik Bus Mojokerto</b> yang terdapat di beberapa lokasi.
  								<p>Setelah menyetorkan sampah botol plastik, akun anda akan diisikan kupon oleh petugas yang sedang bertugas.</p>
  							</div>
  						</div>
  						<div class="col s12">
  							<button data-target="modal2" class="btn modal-trigger btn-pos">
  								<b>Lokasi pos</b>
  							</button>
  						</div>
  					</div>
  					<?php

  						$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
						$run = mysqli_fetch_array($user);
						$id_user = $run['id'];
						$total_kupon = mysqli_query($connect, "SELECT * FROM kupon WHERE id_user = '$id_user'");
						$runrun = mysqli_fetch_array($total_kupon);

  					?>
  					<div class="listmodal">
  						<div id="modal1" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5 style="font-weight:bolder;color:#191919;">Kode kupon</h5>
      							<p style="color:#555;">Tunjukkan kode kupon ini ke <i>helper</i> Bus Mojokerto.</p>
      							<?php
      								if($runrun['kode_kupon']>0){
      									echo "<h3>".$runrun['kode_kupon']."</h3>";
      								}else{
      									echo "<h5>Tidak memiliki kupon</h5>";
      								}
      							?></h3>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal2" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5 style="font-weight:bolder;color:#191919;">Lokasi pos</h5>
      							<p style="color:#555;">Beberapa lokasi pos pengumpulan sampah botol plastik untuk menukarkan kupon Bus Mojokerto.</p>
      							<img src="img/letak-pos.png" class="img-rute materialboxed">
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