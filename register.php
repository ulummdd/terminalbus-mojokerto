<?php

include 'config.php';
error_reporting(0);
session_start();

if(isset($_SESSION['email'])){
	header("Location: login.php");
}

if(isset($_POST['submit'])){
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if($password == $cpassword){
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($connect, $sql);
		if(!$result->num_rows > 0){
			$sql = "INSERT INTO users (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$password')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo "<script>alert('Akun berhasil dibuat')</script>";
				$fullname = "";
				$email = "";
				$phone = "";
				$password = "";
				$cpassword = "";
			}else{
				echo "<script>alert('Terjadi kesalahan server, coba lagi nanti')</script>";
			}
		}else{
			echo "<script>alert('Email sudah terdaftar!')</script>";
		}
	}else{
		echo "<script>alert('Kata sandi tidak sama')</script>";
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
	<title>Register - Bus Mojokerto</title>
</head>
<body>
	<div class="row">
		<div class="col s7 login-banner">
			<img src="img/logo-bnw.png" class="login-logo">
			<b>Bus Mojokerto - 2022</b>
		</div>
		<div class="col s5 login-form">
			<div class="input-form-register">
				<form action="" method="POST">
					<h5 style="font-weight:bolder;margin-bottom:40px !important;">Buat akunmu</h5>
					<div class="input-field input-login">
          				<input id="fullname" type="text" name="fullname" value="<?php echo $fullname; ?>" class="validate" required>
          				<label for="fullname">Nama lengkap</label>
       				</div>
					<div class="input-field input-login">
          				<input id="email" type="email" name="email" value="<?php echo $email; ?>" class="validate" required>
          				<label for="email">Email</label>
       				</div>
       				<div class="input-field input-login">
       					<span class="prefix nemdua">+62</span>
          				<input id="telephone" type="tel" name="phone" onkeypress='validate(event)' value="<?php echo $phone; ?>" class="validate" required>
          				<label for="telephone">Nomor telepon</label>
       				</div>
       				<div class="input-field input-login" style="width:90%;">
          				<input id="password" type="password" name="password" class="validate" onkeyup="cekpw()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          				<label for="password">Kata sandi</label>
          				<span class="prefix mata" onclick="showhide()"><i class="material-icons">remove_red_eye</i></span>
          				<span class="helper-text" data-error="Kata sandi tidak terpenuhi" data-success="Kata sandi terpenuhi" style="margin-left:0px !important;width:100%;">Kata sandi harus lebih dari 8 karakter, dan hanya memiliki huruf (besar dan kecil) dan angka, tanpa simbol</span>
        			</div>
        			<div class="input-field input-login">
          				<input id="repassword" type="password" name="cpassword" class="validate" onkeyup="cekpw()" required>
          				<label for="repassword">Ulangi kata sandi</label>
          				<span class="helper-text" id="check-password"></span>
        			</div>
        			<a class="waves-effect btn submit-kelogin" href="login.php">Masuk</a>
        			<button class="waves-effect btn submit-register" name="submit">Daftar</button>
        		</form>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	function validate(evt) {
  		var theEvent = evt || window.event;
  		if (theEvent.type === 'paste') {
      		key = event.clipboardData.getData('text/plain');
  		}else{
      		var key = theEvent.keyCode || theEvent.which;
      		key = String.fromCharCode(key);
  		}
  		var regex = /[0-9]|\./;
  		if( !regex.test(key) ) {
    		theEvent.returnValue = false;
    		if(theEvent.preventDefault) theEvent.preventDefault();
  		}
	}
	function showhide() {
  		var x = document.getElementById("password");
  		var y = document.getElementById('repassword')
  		if (x.type === "password" && y.type == "password") {
    		x.type = "text";
    		y.type = "text";
  		}else{
    		x.type = "password";
    		y.type = "password";
  		}
	}
	var cekpw = function(){
  		if (document.getElementById('password').value ==
    		document.getElementById('repassword').value) {
    		document.getElementById('check-password').style.color = 'green';
    		document.getElementById('check-password').innerHTML = 'Kata sandi sama';
  		}else{
    		document.getElementById('check-password').style.color = 'red';
    		document.getElementById('check-password').innerHTML = 'Kata sandi tidak sama';
  		}
	}
</script>
</body>
</html>