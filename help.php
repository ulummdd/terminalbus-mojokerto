<?php
	
	include_once("config.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
	$run = mysqli_fetch_array($user);

	if(isset($_POST['submit'])){
		$pengirim = $run['fullname'];
		$isi_pesan = $_POST['isi_pesan'];
		$waktu_dikirim = date('l, M Y - H:i');

		$result = mysqli_query($connect, "INSERT INTO pesan(pengirim, isi_pesan, waktu_dikirim) VALUES ('$pengirim', '$isi_pesan', '$waktu_dikirim')");
		if($result){
			header("Location: help.php");
		}
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
	<title>Bantuan - Bus Mojokerto</title>
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
  			<form action="" method="post">
  			<div class="row dashboard">
  				<div class="col s12 dashboard-content">
  					<h4>Pusat bantuan</h4>
  					<h6>Tanya atau laporkan seputar penggunaan website Bus Mojokerto.</h6>
  					<div class="row" style="margin-top:30px;">
  						<div class="input-field col s8">
            				<textarea id="isi_pesan" name="isi_pesan" class="materialize-textarea" data-length="500" required></textarea>
            				<label for="isi_pesan">Uraian</label>
          				</div>
  						<div class="col s12">
  							<input type="submit" name="submit" class="btn-kirim" value="Kirim">
  						</div>
  					</div>
  				</div>
  			</div>
  			</form>
  		</div>
  	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.sidenav').sidenav();
    	$('textarea#isi_pesan').characterCounter();
  	});
</script>
</body>
</html>