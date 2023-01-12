<?php
	
	include_once("config.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: admin-login.php");
	}

	$id = $_GET['id'];
	$show = mysqli_query($connect, "SELECT * FROM pesan WHERE id=$id");

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
  					<h4 style="color:#fff">Detail pesan</h4>
  					<h6 style="color:#999;">Pesan dari 
  						<?php 
  							while($data = mysqli_fetch_array($show)){
  								echo $data['pengirim'];
  						?>
  					</h6>
  				</div>
  				<div class="col s4 right-align" style="margin-top:28px !important;padding-right:50px;">
  				</div>
  				<div class="col s12">
        			<div class="input-field" style="margin:30px 0px 0px 0px !important;width:500px !important;">
  						<input type="text" id="judul_informasi" style="color:white;border-bottom:1px solid #999;" value="<?php echo $data['waktu_dikirim']; ?>" disabled>
          				<label for="judul_informasi" style="color:white;">Waktu dibuat</label>
        			</div>
        			<div class="input-field" style="margin:30px 0px 20px 0px !important;width:500px !important;">
            			<textarea id="desc_information" style="color:white;border-bottom:1px solid #999;"  class="materialize-textarea" data-length="250" disabled><?php echo $data['isi_pesan']; ?></textarea>
            			<label for="desc_information" style="color:white;">Isi pesan</label>
          			</div>
  				</div>
  						<?php
							}
  						?>
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