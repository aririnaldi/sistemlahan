<?php

if (isset($_POST["submit"])) {
    // echo "<pre>".  print_r($_POST, true) ."</pre>";
    // die();

    // mulai transaction
    mysqli_begin_transaction($connect);

    try {
        $continue = true;
        $insert = mysqli_query($connect, "
            INSERT INTO tb_tanaman (`nama`) VALUES ('". addslashes($_POST['nama_tanaman']) ."')
        ");

        if($insert){
            $tanaman_id = (int) mysqli_insert_id($connect);

            if (isset($_POST['tekstur'])) {
                foreach ($_POST['tekstur'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save tekstur
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_tekstur(`tanaman_id`, `nama`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". addslashes($item['nama']) ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_tekstur
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND nama = '". addslashes($item['nama']) ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['ph'])) {
                foreach ($_POST['ph'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save ph
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_ph(`tanaman_id`, `min_ph`, `maks_ph`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_ph
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND min_ph = '". (float) $item['min'] ."' AND maks_ph = '". (float) $item['maks'] ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['drainase'])) {
                foreach ($_POST['drainase'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save drainase
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_drainase(`tanaman_id`, `nama`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". addslashes($item['nama']) ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_drainase
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND nama = '". addslashes($item['nama']) ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['suhu'])) {
                foreach ($_POST['suhu'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save suhu
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_suhu(`tanaman_id`, `min_suhu`, `maks_suhu`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_suhu
                                WHERE
                                    tanaman_id = ". $tanaman_id ."
                                    AND min_suhu = ". (float) $item['min'] ."
                                    AND maks_suhu = ". (float) $item['maks'] ."
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['ketinggian'])) {
                foreach ($_POST['ketinggian'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save ketinggian
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_tinggi_lahan(`tanaman_id`, `min_tinggi`, `maks_tinggi`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_tinggi_lahan
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND min_tinggi = '". (float) $item['min'] ."' AND maks_tinggi = '". (float) $item['maks'] ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['lereng'])) {
                foreach ($_POST['lereng'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save lereng
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_lereng(`tanaman_id`, `min_lereng`, `maks_lereng`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_lereng
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND min_lereng = '". (float) $item['min'] ."' AND maks_lereng = '". (float) $item['maks'] ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

            if (isset($_POST['hujan'])) {
                foreach ($_POST['hujan'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

                    // save curah hujan
                    $tambah = mysqli_query($connect, "
                        INSERT INTO tb_bobot_curah_hujan(`tanaman_id`, `min_curah`, `maks_curah`, `bobot`)
                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
                            WHERE (
                                SELECT COUNT(*) FROM tb_bobot_curah_hujan
                                WHERE
                                    tanaman_id = '". $tanaman_id ."' AND min_curah = '". (float) $item['min'] ."' AND maks_curah = '". (float) $item['maks'] ."'
                            ) = 0
                    ");

                    if (! $tambah) {
                        $continue = false;
                    }
                }
            }

        }else{
            $continue = false;
        }

        if ($continue) {
            // transaction commit
            mysqli_commit($connect);

            echo "<script> alert('Tambah Alternatif Berhasil ...'); document.location='?page=alternatif' </script>";
        }else{
            // transaction rollback
            mysqli_rollback($connect);

            echo "<script> alert('Tambah Alternatif Gagal ...'); </script>";
        }
    } catch (Exception $e) {
        // transaction rollback
        mysqli_rollback($connect);

        echo "<script> alert('". $e->errorMessage() ."'); </script>";
    }
}

?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h3 class="text-center font-bold col-teal">TAMBAH DATA ALTERNATIF</h3>
            </div>
            <div class="header">
                <h5 class="font-bold col-teal">TAMBAH DATA</h5>
            </div>
            <div class="body">
                <form action="?page=tambah-alternatif" method="post">
                    <?php include "form_alternatif.php" ?>
                </form>
            </div>
        </div>
    </div>
</div>
