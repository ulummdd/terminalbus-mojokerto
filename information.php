<?php
	
	include_once("config.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: admin-login.php");
	}

  	if(isset($_POST['submit'])){
		$judul_informasi = $_POST['judul_informasi'];
		$isi_informasi = $_POST['isi_informasi'];
		$waktu_dibuat = date('l, M Y - H:i');
		$pembuat = $_SESSION['nama'];
		$result = mysqli_query($connect, "INSERT INTO informasi(judul_informasi, isi_informasi, waktu_dibuat, pembuat) VALUES ('$judul_informasi', '$isi_informasi', '$waktu_dibuat', '$pembuat')");
		if($result){
			header("Location: information.php");
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
	<title>Informasi - Bus Mojokerto</title>
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
     					<li>
     						<a href="coupon-admin.php" style="color:#fff !important;">Kupon</a>
     					</li>
     					<li>
     						<a href="user-data.php" style="color:#fff !important;">User</a>
     					</li>
     					<li class="activated-admin">
     						<a href="information.php">Informasi</a>
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
  				<div class="col s8 dashboard-content">
  					<h4 style="color:#fff">Informasi</h4>
  					<h6 style="color:#999;">Buat pengumuman di halaman pengguna</h6>
  				</div>
  				<div class="col s4 right-align" style="margin-top:46px !important;padding-right:50px;">
  					<button data-target="modal01" class="btn modal-trigger add-coupon">Buat Pengumuman</button>
  				</div>
  				<div class="col s12">
  					<table class="coupon-table">
  						<tr>
  							<th>No.</th>
  							<th>Pembuat</th>
  							<th>Judul</th>
  							<th>Waktu dibuat</th>
  							<th class="center">Opsi</th>
  						</tr>
  					<?php

						$no = 1;
						while($data = mysqli_fetch_array($show)){
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$data['pembuat']."</td>";
								echo "<td>".$data['judul_informasi']."</td>";
								echo "<td>".$data['waktu_dibuat']."</td>";
								echo "<td class='center'>
										<a href='details-information.php?id=$data[id]' class='btn-details-information'>
											<i class='material-icons'>remove_red_eye</i>
										</a>
										<a href='edit-information.php?id=$data[id]' class='btn-edit-information'>
											<i class='material-icons'>edit</i>
										</a>
										<a href='delete-information.php?id=$data[id]' class='btn-delete-information'>
											<i class='material-icons'>delete</i>
										</a>
									</td>";
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
  		<div id="modal01" class="modal bottom-sheet" style="max-height:60% !important;">
    		<div class="modal-content">
      			<h5>Buat pengumuman</h5>
      			<p style="color:#555;">Tampilkan pengumuman di papan informasi halaman pengguna</p>
      			<div class="input-field" style="margin:30px 0px 20px 0px !important;">
          			<input id="title_information" name="judul_informasi" type="text" class="validate">
          			<label for="title_information">Judul</label>
        		</div>
      			<div class="input-field" style="margin:30px 0px 20px 0px !important;">
            		<textarea id="desc_information" name="isi_informasi" class="materialize-textarea" data-length="250"></textarea>
            		<label for="desc_information">Isi pengumuman</label>
          		</div>
    		</div>
    		<div class="modal-footer">
				<input type="submit" class="btn-buat" name="submit" value="Buat">
    		</div>
  		</div>
  	</div>
  	</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
    	$('textarea#desc_information').characterCounter();
  	});
</script>
</body>
</html>