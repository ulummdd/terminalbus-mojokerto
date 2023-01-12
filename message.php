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
		$pembuat = $_SESSION['id'];
		$result = mysqli_query($connect, "INSERT INTO informasi(judul_informasi, isi_informasi, waktu_dibuat, pembuat) VALUES ('$judul_informasi', '$isi_informasi', '$waktu_dibuat', '$pembuat')");
		if($result){
			header("Location: information.php");
		}
	}

	$show = mysqli_query($connect, "SELECT * FROM pesan ORDER BY id DESC");

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
	<title>Pesan - Bus Mojokerto</title>
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
     					<li>
     						<a href="information.php" style="color:#fff !important;">Informasi</a>
     					</li>
     					<li class="activated-admin">
     						<a href="message.php">Pesan</a>
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
  					<h4 style="color:#fff">Pesan</h4>
  					<h6 style="color:#999;">Pesan dan keluhan dari pengguna</h6>
  				<?php

  				function truncate($text, $chars = 25) {
    				if (strlen($text) <= $chars) {
        				return $text;
    				}

    				$text = $text." ";
    				$text = substr($text,0,$chars);
    				$text = substr($text,0,strrpos($text,' '));
    				$text = $text."...";
    				return $text;
				}

  				?>
  				</div>
  				<div class="col s4 right-align" style="margin-top:28px !important;padding-right:50px;">
  				</div>
  				<div class="col s12">
  					<table class="coupon-table">
  						<tr>
  							<th>No.</th>
  							<th>Pengirim</th>
  							<th>Kilasan pesan</th>
  							<th>Waktu dikirim</th>
  							<th class="center">Opsi</th>
  						</tr>
  					<?php

						$no = 1;
						while($data = mysqli_fetch_array($show)){
							$isi_pesan = truncate($data['isi_pesan'], 25);
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$data['pengirim']."</td>";
								echo "<td>".$isi_pesan."</td>";
								echo "<td>".$data['waktu_dikirim']."</td>";
								echo "<td class='center'>
										<a href='details-message.php?id=$data[id]' class='btn-details-information'>
											<i class='material-icons'>remove_red_eye</i>
										</a>
										<a href='delete-message.php?id=$data[id]' class='btn-delete-information'>
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