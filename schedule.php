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
	<title>Jadwal - Bus Mojokerto</title>
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
     					<li class="activated">
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
  				<div class="col s12 dashboard-content">
  					<h4>Jadwal</h4>
  					<h6>Cek jadwal setiap halte untuk mengetahui kedatangan bus.</h6>
  					<div class="listjadwal">
  						<button data-target="modal1" class="btn modal-trigger btn-halte">Halte SMA Negeri 1 Mojokerto</button>
  						<button data-target="modal2" class="btn modal-trigger btn-halte">Halte Bus Jl. Ahmad Yani</button>
  						<button data-target="modal3" class="btn modal-trigger btn-halte">Halte Gajah Mada</button>
  						<button data-target="modal4" class="btn modal-trigger btn-halte">Halte Bhayangkara</button>
  						<button data-target="modal5" class="btn modal-trigger btn-halte">Terminal Kertajaya Mojokerto</button>
  						<button data-target="modal6" class="btn modal-trigger btn-halte">Halte Raya Ijen</button>
  						<button data-target="modal7" class="btn modal-trigger btn-halte">Halte Pahlawan</button>
  					</div>
  					<div class="listmodal">
  						<div id="modal1" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte SMA Negeri 1 Mojokerto</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal2" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte Bus Jl. Ahmad Yani</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal3" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte Gajah Mada</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal4" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte Bhayangkara</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal5" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Terminal Kertajaya Mojokerto</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal6" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte Raya Ijen</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
   	 						</div>
    						<div class="modal-footer">
      							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    						</div>
  						</div>
  						<div id="modal7" class="modal">
    						<div class="modal-content modal1kotak">
      							<h5>Halte Pahlawan</h5>
      							<p style="color:#555;">Berikut jadwal datang Bus Mojokerto di halte ini.</p>
      							<p style="font-size:12px;font-weight:bolder;">*Jadwal dapat berubah sewaktu-waktu tergantung kondisi</p>
      							<table border="1" class="centered">
      								<tr>
      									<td>06:00</td>
      									<td>06:30</td>
      									<td>07:00</td>
      									<td>07:30</td>
      									<td>08:00</td>
      									<td>08:30</td>
      								</tr>
      								<tr>
      									<td>09:00</td>
      									<td>09:30</td>
      									<td>10:00</td>
      									<td>10:30</td>
      									<td>11:00</td>
      									<td>11:30</td>
      								</tr>
      								<tr>
      									<td>12:00</td>
      									<td>12:30</td>
      									<td>13:00</td>
      									<td>13:30</td>
      									<td>14:00</td>
      									<td>14:30</td>
      								</tr>
      								<tr>
      									<td>15:00</td>
      									<td>15:30</td>
      									<td>16:00</td>
      									<td>16:30</td>
      									<td>17:00</td>
      									<td>17:30</td>
      								</tr>
      								<tr>
      									<td>18:00</td>
      									<td>18:30</td>
      									<td>19:00</td>
      									<td>19:30</td>
      									<td>20:00</td>
      									<td>20:30</td>
      								</tr>
      							</table>
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
  	});
</script>
</body>
</html>