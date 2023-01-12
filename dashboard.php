<?php

	include_once("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	$show = mysqli_query($connect, "SELECT * FROM informasi ORDER BY id DESC");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<title>Dashboard - Bus Mojokerto</title>
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
     					<li class="activated">
     						<a href="dashboard.php">Dashboard</a>
     					</li>
     					<li>
     						<a href="schedule.php">Jadwal</a>
     					</li>
     					<li>
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
  				<div class="col s8 dashboard-content">
  					<h4>Dashboard</h4>
  					<?php

  						$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
						$run = mysqli_fetch_array($user);

  					?>
  					<h6>Halo, <?php echo $run['fullname']; ?></h6>
  					<div class="row" style="margin-top:30px;">
  						<div class="col s7">
  							<div class="ongoing">
  								<b style="font-size:22px;">Akan sampai</b>
  								<div class="bus">
  									<b style="font-size:18px;">MB1</b>
  									<marquee direction="right" style="width:16px;height:16px;">> > ></marquee>
  									<span>Halte Pahlawan</span><br>
  									<b style="font-size:18px;">MB5</b>
  									<marquee direction="right" style="width:16px;height:16px;">> > ></marquee>
  									<span>Halte Gajah Mada</span><br>
  									<b style="font-size:18px;">MB6</b>
  									<marquee direction="right" style="width:16px;height:16px;">> > ></marquee>
  									<span>Halte Bhayangkara</span>
  								</div>
  								<a href="schedule.php" class="btn-ongoing">Lihat jadwal</a>
  							</div>
  						</div>
  						<div class="col s5">
  							<div class="tutor">
  								<b style="font-size:22px;">Tukar kupon</b>
  								<p>Tukarkan sampah botol plastik untuk mendapatkan kupon naik Bus Mojokerto.</p>
  								<a href="coupon.php" class="btn-tutor">Gunakan kupon</a>
  							</div>
  						</div>
  						<div class="col s12" style="margin-top:30px">
  							<div class="help">
  								<b style="font-size:22px;">Butuh bantuan?</b>
  								<p>Ajukan pertanyaan atau pertolongan apabila anda memiliki kesulitan dalam pengoperasian situs web ini untuk mendapatkan solusi.</p>
  								<a href="help.php" class="btn-help">Ajukan</a>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="col s4">
  					<div class="information">
  						<b>Informasi</b>
  					<?php

						while($data = mysqli_fetch_array($show)){
							echo "<p style='font-weight:bold;font-size:18px; margin-bottom:6px !important;'>".$data['judul_informasi']."</p>";
							echo "<span style='margin-top:10px;font-size:14px;color:#777;'>".$data['waktu_dibuat']."</span>";
							echo "<p style='font-size:14px;color:#555;'>".$data['isi_informasi']."</p>";
						}
			
					?>
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
  	});
</script>
</body>
</html>