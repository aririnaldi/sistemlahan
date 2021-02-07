<?php 
@$page=$_GET['page'];
if (!isset($page))$page=''; 
switch ($page) { 

case ''					: include "welcome.php"; break;
case 'aturan'			:include "aturan.php"; break;
case 'rekap'			:include "rekap.php"; break;

//Alternatif
case 'alternatif'			: include "alternatif.php"; break;
case 'tambah-alternatif'	: include "tambah_alternatif.php"; break;
case 'edit-alternatif'		: include "edit_alternatif.php"; break;

//Lahan
case 'lahan'				: include "lahan.php";break;
case 'tambah-lahan'			: include "tambah_lahan.php";break;
case 'edit-lahan'			: include "edit_lahan.php";break;

//hasil
case 'delete-hasil'			: include "delete-hasil.php";break;
case 'hasil'				: include "hasil.php"; break;

//Penilaian
case 'penilaian'		: include "penilaian.php"; break;
}
?> 