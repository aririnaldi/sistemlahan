<?php
	if(isset($_POST['save_alternatif'])){
		$alamat = $_POST['alamat'];
		$tekstur = $_POST['tekstur'];
		$ph = (float) $_POST['ph'];
		$drainase = $_POST['drainase'];
		$suhu = (float) $_POST['suhu'];
		$ketinggian = (float) $_POST['ketinggian'];
		$lereng = (float) $_POST['lereng'];
		$curah_hujan = (float) $_POST['curah_hujan'];

		$insert = mysqli_query($connect, "
			INSERT INTO tb_lahan(alamat, tekstur, ph, drainase, suhu, ketinggian, lereng, curah_hujan)
				VALUES
				('$alamat', '$tekstur', '$ph', '$drainase', '$suhu', '$ketinggian', '$lereng', '$curah_hujan')
		");

		if($insert){
			echo "<script> alert('Tambah lahan berhasil ...'); document.location='?page=lahan' </script>";
		}else{
			echo "<script> alert('Tambah lahan gagal ...'); </script>";
		}
	}
?>


<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
                <h3 class="text-center font-bold col-teal">TAMBAH DATA LAHAN</h3>
            </div>
            <div class="header">
                <h5 class="font-bold col-teal">TAMBAH DATA</h5>
            </div>
			<div class="body">
				<form method="post" action="?page=tambah-lahan">
					<?php include "form_lahan.php" ?>

					<input type="submit" name="save_alternatif" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" value="SAVE">
					<a href="?page=lahan" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
				</form>
			</div>
		</div>
	</div>
</div>
