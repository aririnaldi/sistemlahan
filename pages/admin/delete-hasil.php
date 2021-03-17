<?php
include "koneksi.php";
$hapus = $_POST['hapus'];

$id = $_GET['id_hasil'];

if(isset($hapus))
	{
		$delete = mysqli_query($connect,"DELETE FROM tb_hasil WHERE id_hasil='$id'")
		or die(mysqli_error());
		
		if($delete)
		{
			echo "<script> alert('Data Berhasil dihapus'); document.location='?page=rekap' </script>";
		}
		else
		{
			echo "<script> alert('Hapus Gagal ...'); </script>";
		}
	}
?>