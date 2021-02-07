<?php
@session_start();
include "koneksi.php";
	if(isset($_SESSION['username']) && isset($_SESSION['password']))
	{
	?>
		<script>document.location='home.php';//alert('Silahkan login terlebih dulu')</script>
	<?php
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
        <div class="logo">
            <a href="javascript:void(0);">Login Admin<b>...</b></a>
            <small>Penetuan Lokasi Lahan Tanaman Rimpang </small>
        </div>
        <div class="card">
            <div class="body">
                <form method="post">
                    <div class="msg"></div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 p-t-5">
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" style="text-align: center; font-size: 17px; font-weight: bold" name="submit" >
                            Masuk &nbsp; <i class="material-icons"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
	include "koneksi.php";
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $cekdata = mysqli_query($connect,"SELECT * FROM admin WHERE username='$user' AND password='$pass'");
            $fetch = mysqli_num_rows($cekdata);
            if($fetch==1)
            {
                $_SESSION['password'] = $user;
                $_SESSION['username'] = $pass;

                echo "<script>
                alert('Login Berhasil...');
                document.location='home.php';
                </script>";
            }
        else
        {
        echo "<script>
      alert('User ID atau Password Salah!');
      window.location = 'index.php';
      </script>
      ";
}
            }
        ?>

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
	<?php }?>
