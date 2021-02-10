<?php
@$page=$_GET['page'];
if (!isset($page))$page='';
switch ($page) {
    case ''					:
    case 'home'				: include "pages/admin/welcome.php"; break;
    case 'aturan'			: include "pages/admin/aturan.php"; break;
    case 'rekap'			: include "pages/admin/rekap.php"; break;

    //Alternatif
    case 'alternatif'			: include "pages/admin/alternatif.php"; break;
    case 'tambah-alternatif'	: include "pages/admin/tambah_alternatif.php"; break;
    case 'edit-alternatif'		: include "pages/admin/edit_alternatif.php"; break;
    case 'hapus-alternatif'		: include "pages/admin/hapus_alternatif.php"; break;

    //Lahan
    case 'lahan'				: include "pages/admin/lahan.php";break;
    case 'tambah-lahan'			: include "pages/admin/tambah_lahan.php";break;
    case 'edit-lahan'			: include "pages/admin/edit_lahan.php";break;

    //hasil
    case 'delete-hasil'			: include "pages/admin/delete-hasil.php";break;
    case 'hasil'				: include "pages/admin/hasil.php"; break;

    //Penilaian
    case 'penilaian'		: include "pages/admin/penilaian.php"; break;
}
?>
