<?php

if(isset($_POST['save_alternatif'])){
	$id = (int) $_POST ['id_alamat'];
	$alamat = $_POST['alamat'];
	$tekstur = $_POST['tekstur'];
	$ph = (float) $_POST['ph'];
	$drainase = $_POST['drainase'];
	$suhu = (float) $_POST['suhu'];
	$ketinggian = (float) $_POST['ketinggian'];
	$lereng = (float) $_POST['lereng'];
	$curah_hujan = (float) $_POST['curah_hujan'];

	$query = "
		UPDATE tb_lahan SET
			alamat = '{$alamat}',
			tekstur = '{$tekstur}',
			ph = {$ph},
			drainase = '{$drainase}',
			suhu = {$suhu},
			ketinggian = {$ketinggian},
			lereng = {$lereng},
			curah_hujan = {$curah_hujan}
		WHERE id_alamat = {$id}
	";
	$updatelahan = mysqli_query($connect, $query);

	if($updatelahan){
		echo "<script> alert('Update lahan ...'); document.location='?page=lahan' </script>";
	}else{
		echo "<script> alert('Update lahan gagal ...'); </script>";
	}
}else if(isset($_POST["hapus"])){
	$delete = mysqli_query($connect, "DELETE FROM tb_lahan WHERE id_alamat = " . (int) $_POST['id']);
	if($delete){
		echo "<script> alert('Hapus lahan berhasil ...'); document.location='?page=lahan' </script>";
	}else{
		echo "<script> alert('Hapus lahan gagal ...'); </script>";
	}
}

$id = (int) $_GET['id'];
$query = mysqli_query($connect,"SELECT * FROM tb_lahan WHERE id_alamat = '$id'");
$data = mysqli_fetch_assoc($query);

// $pusatdata->dd($data);

?>

<div class="row clearfix">
	<div class="col-lg-12">
		<div class="card">
			<div class="header">
				<h3 class="text-center col-teal">EDIT DATA LAHAN</h3>
			</div>

			<div class="header font-bold col-teal" >
				<h5 class="font-bold col-teal">EDIT DATA</h5>
			</div>

			<div class="body">
				<form method="POST">
					<?php include "form_lahan.php" ?>

					<input type="submit" name="save_alternatif" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" value="SAVE">
					<a href="?page=lahan" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
                </form>
			</div>
        </div>
	</div>
</div>
