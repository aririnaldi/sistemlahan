<?php
@session_start();

include "koneksi.php";
if(isset($_POST['submit'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$cekdata = mysqli_query($connect,"SELECT * FROM admin WHERE username='$user' AND password='$pass'");
	$fetch = mysqli_num_rows($cekdata);
	if($fetch == 1){
		$_SESSION['password'] = $user;
		$_SESSION['username'] = $pass;

		echo "
			<script>
				alert('Login Berhasil...');
				document.location='home.php';
			</script>
		";
	}else{
		echo "
			<script>
		  		alert('User ID atau Password Salah!');
		  		window.location = 'index.php';
		  	</script>
	  	";
  	}
}


if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header('location:home.php');
}else{
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>LOGIN PENENTU LAHAN TANAMAN OBAT RIMPANG</title>
    <!-- Favicon-->


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
			<div class="header text-center">
				<h1>Login Admin</h1>
				<p>Penetuan Lokasi Lahan Tanaman Rimpang</p>
			</div>
            <div class="body">
                <form method="post">
                    <div class="msg"></div>
                    <div class="input-group">
                        <div class="form-line">
							<label for="username" class="control-label hide">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
							<label for="password" class="control-label hide">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-3 col-xs-6 p-t-15">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit" >Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>
</html>

<?php } ?>
