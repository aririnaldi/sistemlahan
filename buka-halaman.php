<?php
@$page=$_GET['page'];
if (!isset($page))$page='';
switch ($page) {
    case ''				:
    case 'home'			: include "pages/welcome.php"; break;
    case 'uji'			: include "pages/uji.php"; break;
    case 'hasil-uji'	: include "pages/hasil.php"; break;

    // login admin
    case 'login'	: include "pages/login.php"; break;
}
?>
