<?php

	include_once("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
	$run = mysqli_fetch_array($user);
	$id_user = $run['id'];

	if(isset($_POST['submit'])){
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = md5($_POST['password']);
		$result = mysqli_query($connect, "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', password='$password' WHERE id='$_GET[id]'");
		$resultt = mysqli_query($connect, "UPDATE pesan SET pengirim='$fullname' WHERE pengirim='$run[fullname]'");
		if($result && $resultt){
			header("Location: profile.php");
		}
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
	<title>Edit profil - Bus Mojokerto</title>
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
  					<h4>Edit profil</h4>
  					<?php

  						$user = mysqli_query($connect, "SELECT * FROM users WHERE email = '$_SESSION[email]'");
						$run = mysqli_fetch_array($user);

  					?>
  					<h6>Atur preferensi informasi akunmu</h6>
  					<form action="" method="post">
        			<div class="row">
        				<div class="input-field col s2" style="margin:30px 0px 0px 0px !important;">
  							<input type="text" id="id_user" style="font-weight:bold;border-bottom:1px solid #333;" value="<?php echo $run['id']; ?>" disabled>
          					<label for="id_user"><b>ID</b></label>
        				</div>
        				<div class="input-field col s10" style="margin:30px 0px 0px 0px !important;">
  							<input type="text" id="fullname" name="fullname" style="border-bottom:1px solid #999;" value="<?php echo $run['fullname']; ?>" required>
          					<label for="fullname">Nama</label>
        				</div>
        				<div class="input-field col s6" style="margin:30px 0px 0px 0px !important;">
  							<input type="email" id="email" name="email" style="border-bottom:1px solid #999;" value="<?php echo $run['email']; ?>" required>
          					<label for="email">Email</label>
        				</div>
        				<div class="input-field col s6" style="margin:30px 0px 0px 0px !important;">
        					<span class="prefix nemdua">+62</span>
  							<input type="text" id="phone" name="phone" style="border-bottom:1px solid #999;" value="<?php echo $run['phone']; ?>" required>
          					<label for="phone">Nomor telepon</label>
        				</div>
        				<div class="input-field col s12" style="margin:30px 0px 20px 0px !important;">
  							<input type="password" id="password" name="password" style="width:94%;border-bottom:1px solid #999;" required>
          					<label for="password">Kata sandi</label>
          					<span class="prefix mata" onclick="showhide()"><i class="material-icons">remove_red_eye</i></span>
        				</div>
        				<input type="submit" name="submit" class="editlagi-user" value="Simpan data">
        			</div>
        			</form>
  				</div>
  			</div>
  		</div>
  	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	function showhide() {
  		var x = document.getElementById("password");
  		if (x.type === "password") {
    		x.type = "text";
  		}else{
    		x.type = "password";
  		}
	}
	
	$(document).ready(function(){
    	$('.sidenav').sidenav();
  	});
</script>
</body>
</html>