<?php
	
	include_once("config.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: admin-login.php");
	}

  	$kode_random = substr(md5(microtime()),rand(0,26),5);
	if(isset($_POST['buatkupon'])){
		$id_user = $_POST['id_user'];
		$kode_kupon = $kode_random;
		$waktu_dibuat = date('l, M Y - H:i');
		$result = mysqli_query($connect, "INSERT INTO kupon(id_user, kode_kupon, waktu_dibuat) VALUES ('$id_user', '$kode_kupon', '$waktu_dibuat')");
		if($result){
			header("Location: coupon-admin.php");
		}
	}

	if(isset($_POST['pakaikupon'])){
		$kode_kupon = $_POST['kode_kupon'];
		$kupon = mysqli_query($connect, "SELECT * FROM kupon WHERE kode_kupon = '$kode_kupon'");
		$run = mysqli_fetch_array($kupon);
		$id_kupon = $run['id_kupon'];
		$hapus = mysqli_query($connect, "DELETE FROM kupon WHERE id_kupon = $id_kupon");
		if($hapus){
			header("Location: coupon-admin.php");
		}
	}

	$show = mysqli_query($connect, "SELECT * FROM kupon ORDER BY id_kupon DESC");

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
	<title>Kupon - Bus Mojokerto</title>
</head>
<body style="background-color:#191A19;">
  	<!--mobile-->
  	<ul class="sidenav" id="mobile-demo">
    	<li><a href="sass.html">Sass</a></li>
    	<li><a href="badges.html">Components</a></li>
    	<li><a href="collapsible.html">Javascript</a></li>
    	<li><a href="mobile.html">Mobile</a></li>
  	</ul>
  	<!--end-->

  	<div class="row">
  		<div class="col s3 sidebar-admin">
  			<center>
  				<a href="dashboard-admin.php" class="brand-logo">
     				<img src="img/logo.png">
     			</a>
     			<div class="menu-sidebar">
     				<ul>
     					<li>
     						<a href="dashboard-admin.php" style="color:#fff !important;">Dashboard</a>
     					</li>
     					<li class="activated-admin">
     						<a href="coupon-admin.php">Kupon</a>
     					</li>
     					<li>
     						<a href="user-data.php" style="color:#fff !important;">User</a>
     					</li>
     					<li>
     						<a href="information.php" style="color:#fff !important;">Informasi</a>
     					</li>
     					<li>
     						<a href="message.php" style="color:#fff !important;">Pesan</a>
     					</li>
     				</ul>
     			</div>
     			<div class="logout-admin">
     				<a href="logout-admin.php" class="btn-logout-admin">Keluar</a>
     			</div>
     		</center>
  		</div>
  		<div class="col s9 navbar" style="padding:0px !important;">
  			<nav class="nav-admin">
    			<div class="nav-wrapper">
    				<span class="align-left time-admin">
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
        					<a href="profile-admin.php" style="margin-top:2px;">
        						<div>
        							<i class="material-icons" style="font-size:36px;">person</i>
        						</div>
        					</a>
        				</li>
      				</ul>
    			</div>
  			</nav>
  			<div class="row dashboard">
  				<div class="col s7 dashboard-content">
  					<h4 style="color:#fff">Kupon</h4>
  					<h6 style="color:#999;">Buat dan gunakan kupon Bus Mojokerto</h6>
  				</div>
  				<div class="col s5 center-align" style="margin-top:46px !important;">
  					<button data-target="modal01" class="btn modal-trigger use-coupon">Gunakan kupon</button>
  					<button data-target="modal02" class="btn modal-trigger add-coupon">Buat kupon</button>
  				</div>
  				<div class="col s12">
  					<table class="coupon-table">
  						<tr>
  							<th>No.</th>
  							<th>Pemilik kupon</th>
  							<th>Kode kupon</th>
  							<th>Waktu dibuat</th>
  							<th>Opsi</th>
  						</tr>
  					<?php

						$no = 1;
						while($data = mysqli_fetch_array($show)){
							echo "<tr>";
								echo "<td>".$no++."</td>";
							$user = mysqli_query($connect, "SELECT * FROM users WHERE id = '$data[id_user]'");
							$run = mysqli_fetch_array($user);
							$nama_user = $run['fullname'];
								echo "<td>".$nama_user."</td>";
								echo "<td>".$data['kode_kupon']."</td>";
								echo "<td>".$data['waktu_dibuat']."</td>";
								echo "<td><a href='delete-coupon.php?id_kupon=$data[id_kupon]' class='delete-coupon'>Hapus</a></td>";
							echo "</tr>";
						}
			
					?>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>

  	<form action="" method="post">
  	<div class="modal-kupon">
  		<div id="modal01" class="modal bottom-sheet">
    		<div class="modal-content">
      			<h5>Gunakan kupon</h5>
      			<p style="color:#555;">Kupon naik Bus Mojokerto untuk pengguna</p>
      			<div class="input-field" style="margin:30px 0px 0px 0px !important;">
          			<input id="kode_kupon" type="text" name="kode_kupon" class="validate">
          			<label for="kode_kupon">Kode kupon</label>
        		</div>
    		</div>
    		<div class="modal-footer">
				<input type="submit" name="pakaikupon" class="btn-buat" value="Gunakan Kupon">
    		</div>
  		</div>
  	</div>
  	</form>

  	<form action="" method="post">
  	<div class="modal-kupon">
  		<div id="modal02" class="modal bottom-sheet">
    		<div class="modal-content">
      			<h5>Buat kupon</h5>
      			<p style="color:#555;">Kupon naik Bus Mojokerto untuk pengguna</p>
      			<div class="input-field" style="margin:30px 0px 0px 0px !important;">
          			<input id="id_user" type="number" name="id_user" class="validate">
          			<label for="id_user">ID pengguna</label>
        		</div>
    		</div>
    		<div class="modal-footer">
				<input type="submit" name="buatkupon" class="btn-buat" value="Buat Kupon">
    		</div>
  		</div>
  	</div>
  	</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>
</body>
</html>