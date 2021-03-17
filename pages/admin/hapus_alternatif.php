<?php
$continue = false;
if (isset($_POST["id"])) {
    // save tekstur
    $hapus = mysqli_query($connect, "DELETE FROM tb_tanaman WHERE id = " . $_POST["id"]);

    if ($hapus) {
        $continue = true;
    }
}

if ($continue) {
    echo "<script> alert('Data berhasil dihapus'); document.location='?page=alternatif' </script>";
}else{
    echo "<script> alert('Data tidak tersedia'); document.location='?page=alternatif' </script>";
}

?>
