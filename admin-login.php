<?php

include 'config.php';
error_reporting(0);
session_start();

if(isset($_SESSION['id'])){
	header("Location: dashboard-admin.php");
}

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connect, $sql);
	if($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		header("Location: dashboard-admin.php");
	}else{
		echo "<script>alert('Email atau kata sandi anda salah, coba lagi')</script>";
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
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<title>Admin - Bus Mojokerto</title>
</head>
<body>
	<div class="row">
		<div class="col s7 admin-login-banner">
			<img src="img/logo.png" class="login-logo">
			<b>Bus Mojokerto - Admin</b>
		</div>
		<div class="col s5 login-form">
			<div class="input-form">
				<form action="" method="POST">
					<h5 style="font-weight:bolder;margin-bottom:40px !important;margin-top:190px !important;">Masuk dengan akunmu</h5>
					<div class="input-field input-login">
          				<input id="username" type="text" name="username" value="<?php echo $username; ?>" class="validate" required>
          				<label for="username">Username</label>
       				</div>
       				<div class="input-field input-login">
          				<input id="password" type="password" name="password" style="width:90%;" class="validate" required>
          				<label for="password">Kata sandi</label>
          				<span class="prefix mata" onclick="showhide()"><i class="material-icons">remove_red_eye</i></span>
        			</div>
        			<button class="waves-effect btn submit-login" name="submit">Masuk</button>
        		</form>
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
</script>
</body>
</html>