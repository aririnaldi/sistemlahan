<?php 
include "koneksi.php";
session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
	{
	?>
		<script>document.location='index.php'; alert('Silahkan login terlebih dulu')</script>
	<?php
	}
	else
	{
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>LAHAN TANAMAN OBAT RIMPANG</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <!--Font Awesome-->
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="plugins/material-design-iconic-font/css/material-design-iconic-font.css="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">
    <!-- Top Bar -->
  <nav class="navbar" >
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <img src="images/pertanian.png" align="left" style="height: 51px; width: 51px;">

                <a class="navbar-brand">&nbsp;&nbsp;APLIKASI PENENTU LOKASI LAHAN TANAMAN OBAT RIMPANG</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                    </ul>
            </div>
        </div>
		<?php include 'menu.php'; ?>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                   <!-- <a>&copy; 2017 Standar Akreditasi - Program Studi</a>-->
                </div>
            </div>
            <!-- #Footer -->
        </div>
    </nav>
    <div class="kiri">
		<?php include "buka-halaman.php"; ?>        
			<!-- Jquery Core Js -->
			<script src="plugins/jquery/jquery.min.js"></script>

			<!-- Bootstrap Core Js -->
			<script src="plugins/bootstrap/js/bootstrap.js"></script>

			<!-- Select Plugin Js 
			<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

			<!-- Slimscroll Plugin Js -->
			<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

			<!-- Waves Effect Plugin Js -->
			<script src="plugins/node-waves/waves.js"></script>

			<!-- Jquery CountTo Plugin Js -->
			<script src="plugins/jquery-countto/jquery.countTo.js"></script>

			<!-- Morris Plugin Js -->
			<script src="plugins/raphael/raphael.min.js"></script>
			<script src="plugins/morrisjs/morris.js"></script>

			<!-- ChartJs -->
			<script src="plugins/chartjs/Chart.bundle.js"></script>

			<!-- Flot Charts Plugin Js -->
			<script src="plugins/flot-charts/jquery.flot.js"></script>
			<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
			<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
			<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
			<script src="plugins/flot-charts/jquery.flot.time.js"></script>

			<!-- Sparkline Chart Plugin Js -->
			<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

			<!-- Custom Js -->
			<script src="js/admin.js"></script>
			<script src="js/pages/index.js"></script>

			<!-- Demo Js -->
			<script src="js/demo.js"></script>
	</div>
</body>
</html>
<?php
}
?>