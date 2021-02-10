<?php

$tanaman_id = (int) $_GET['id'];
if (isset($_POST["submit"])) {
    // mulai transaction
    mysqli_begin_transaction($connect);

    try {
		// echo "<pre>". print_r($_POST, true)."</pre>";
		// die();

        $continue = true;
        $update = mysqli_query($connect, "
            UPDATE tb_tanaman SET nama = '". addslashes($_POST['nama_tanaman']) ."' WHERE id = {$tanaman_id}
        ");

        if($update){
            if (isset($_POST['tekstur'])) {
				$array_id = array_column($_POST['tekstur'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_tekstur WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

				if ($continue) {
					foreach ($_POST['tekstur'] as $key => $item) {
	                    if ($continue == false) {
	                        break;
	                    }

						if (isset($item['id'])) {
							// save tekstur
		                    $update = mysqli_query($connect, "
		                        UPDATE tb_bobot_tekstur SET nama = '". $item['nama'] ."', bobot = ". (float) $item['bobot'] ." WHERE id = ". $item['id'] ."
		                    ");

		                    if (! $update) {
		                        $continue = false;
		                    }
						}else{
							// save tekstur
		                    $tambah = mysqli_query($connect, "
		                        INSERT INTO tb_bobot_tekstur(`tanaman_id`, `nama`, `bobot`)
		                            SELECT DISTINCT '{$tanaman_id}', '". addslashes($item['nama']) ."', '". (float) $item['bobot'] ."'
		                            WHERE (
		                                SELECT COUNT(*) FROM tb_bobot_tekstur
		                                WHERE
		                                    tanaman_id = ". $tanaman_id ."
											AND nama = '". addslashes($item['nama']) ."'
		                            ) = 0
		                    ");

		                    if (! $tambah) {
		                        $continue = false;
		                    }
						}
	                }
				}
            }

            if (isset($_POST['ph'])) {
				$array_id = array_column($_POST['ph'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_ph WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

				if ($continue) {
					foreach ($_POST['ph'] as $key => $item) {
	                    if ($continue == false) {
	                        break;
	                    }

						if (isset($item['id'])) {
							// update ph
		                    $update = mysqli_query($connect, "
		                        UPDATE tb_bobot_ph SET min_ph = ". (float) $item['min'] .", maks_ph = ". (float) $item['maks'] .", bobot = ". (float) $item['bobot'] ." WHERE id = ". $item['id'] ."
		                    ");

		                    if (! $update) {
		                        $continue = false;
		                    }
						}else{
							// save ph
		                    $tambah = mysqli_query($connect, "
		                        INSERT INTO tb_bobot_ph(`tanaman_id`, `min_ph`, `maks_ph`, `bobot`)
		                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
		                            WHERE (
		                                SELECT COUNT(*) FROM tb_bobot_ph
		                                WHERE
		                                    tanaman_id = ". $tanaman_id ."
											AND min_ph = ". (float) $item['min'] ."
											AND maks_ph = ". (float) $item['maks'] ."
		                            ) = 0
		                    ");

		                    if (! $tambah) {
		                        $continue = false;
		                    }
						}
	                }
				}
            }

            if (isset($_POST['drainase'])) {
				$array_id = array_column($_POST['drainase'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_drainase WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

                foreach ($_POST['drainase'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

					if (isset($item['id'])) {
						// update drainase
	                    $update = mysqli_query($connect, "
	                        UPDATE tb_bobot_drainase SET nama = '". addslashes($item['nama']) ."', bobot = ". (float) $item['bobot'] ." WHERE id = ". $item['id'] ."
	                    ");

	                    if (! $update) {
	                        $continue = false;
	                    }

					}else{
						// save drainase
	                    $tambah = mysqli_query($connect, "
	                        INSERT INTO tb_bobot_drainase(`tanaman_id`, `nama`, `bobot`)
	                            SELECT DISTINCT '{$tanaman_id}', '". addslashes($item['nama']) ."', '". (float) $item['bobot'] ."'
	                            WHERE (
	                                SELECT COUNT(*) FROM tb_bobot_drainase
	                                WHERE
	                                    tanaman_id = ". $tanaman_id ."
										AND nama = '". addslashes($item['nama']) ."'
	                            ) = 0
	                    ");

	                    if (! $tambah) {
	                        $continue = false;
	                    }
					}
                }
            }


            if (isset($_POST['suhu'])) {
				$array_id = array_column($_POST['suhu'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_suhu WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

                foreach ($_POST['suhu'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

					if (isset($item['id'])) {
						// update suhu
	                    $update = mysqli_query($connect, "
	                        UPDATE tb_bobot_suhu SET min_suhu = ". (float) $item['min'] .", maks_suhu = ". (float) $item['maks'] .", bobot = ". (float) $item['bobot'] ." WHERE id = ". (float) $item['id'] ."
	                    ");

	                    if (! $update) {
	                        $continue = false;
	                    }
					}else{
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
            }

            if (isset($_POST['ketinggian'])) {
				$array_id = array_column($_POST['ketinggian'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_tinggi_lahan WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

                foreach ($_POST['ketinggian'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

					if (isset($item['id'])) {
						// update ketinggian
	                    $update = mysqli_query($connect, "
	                        UPDATE tb_bobot_tinggi_lahan SET min_tinggi = ". (float) $item['min'] .", maks_tinggi = ". (float) $item['maks'] .", bobot = ". (float) $item['bobot'] ." WHERE id = ". (float) $item['id'] ."
	                    ");

	                    if (! $update) {
	                        $continue = false;
	                    }
					}else{
						// save ketinggian
	                    $tambah = mysqli_query($connect, "
	                        INSERT INTO tb_bobot_tinggi_lahan(`tanaman_id`, `min_tinggi`, `maks_tinggi`, `bobot`)
	                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
	                            WHERE (
	                                SELECT COUNT(*) FROM tb_bobot_tinggi_lahan
	                                WHERE
	                                    tanaman_id = ". $tanaman_id ."
										AND min_tinggi = ". (float) $item['min'] ."
										AND maks_tinggi = ". (float) $item['maks'] ."
	                            ) = 0
	                    ");

	                    if (! $tambah) {
	                        $continue = false;
	                    }
					}
                }
            }

            if (isset($_POST['lereng'])) {
				$array_id = array_column($_POST['lereng'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_lereng WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

                foreach ($_POST['lereng'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

					if (isset($item['id'])) {
						// update lereng
	                    $update = mysqli_query($connect, "
	                        UPDATE tb_bobot_lereng SET min_lereng = ". (float) $item['min'] .", maks_lereng = ". (float) $item['maks'] .", bobot = ". (float) $item['bobot'] ." WHERE id = ". (float) $item['id'] ."
	                    ");

	                    if (! $update) {
	                        $continue = false;
	                    }
					}else{
						// save lereng
	                    $tambah = mysqli_query($connect, "
	                        INSERT INTO tb_bobot_lereng(`tanaman_id`, `min_lereng`, `maks_lereng`, `bobot`)
	                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
	                            WHERE (
	                                SELECT COUNT(*) FROM tb_bobot_lereng
	                                WHERE
	                                    tanaman_id = ". $tanaman_id ."
										AND min_lereng = ". (float) $item['min'] ."
										AND maks_lereng = ". (float) $item['maks'] ."
	                            ) = 0
	                    ");

	                    if (! $tambah) {
	                        $continue = false;
	                    }
					}
                }
            }

            if (isset($_POST['hujan'])) {
				$array_id = array_column($_POST['hujan'], 'id');
				if (! empty($array_id)) {
					// delete tekstur
					$delete = mysqli_query($connect, "
						DELETE FROM tb_bobot_curah_hujan WHERE id NOT IN (". implode($array_id, ',') .")
					");

					if (! $delete) {
						$continue = false;
					}
				}

                foreach ($_POST['hujan'] as $key => $item) {
                    if ($continue == false) {
                        break;
                    }

					if (isset($item['id'])) {
						// update curah hujan
	                    $update = mysqli_query($connect, "
	                        UPDATE tb_bobot_curah_hujan SET min_curah = ". (float) $item['min'] .", maks_curah = ". (float) $item['maks'] .", bobot = ". (float) $item['bobot'] ." WHERE id = ". (float) $item['id'] ."
	                    ");

	                    if (! $update) {
	                        $continue = false;
	                    }
					}else{
						// save curah hujan
	                    $tambah = mysqli_query($connect, "
	                        INSERT INTO tb_bobot_curah_hujan(`tanaman_id`, `min_curah`, `maks_curah`, `bobot`)
	                            SELECT DISTINCT '{$tanaman_id}', '". (float) $item['min'] ."', '". (float) $item['maks'] ."', '". (float) $item['bobot'] ."'
	                            WHERE (
	                                SELECT COUNT(*) FROM tb_bobot_curah_hujan
	                                WHERE
	                                    tanaman_id = ". $tanaman_id ."
										AND min_curah = ". (float) $item['min'] ."
										AND maks_curah = ". (float) $item['maks'] ."
	                            ) = 0
	                    ");

	                    if (! $tambah) {
	                        $continue = false;
	                    }
					}
                }
            }

        }else{
            $continue = false;
        }

        if ($continue) {
            // transaction commit
            mysqli_commit($connect);

            echo "<script> alert('Edit data alternatif berhasil ...'); document.location='?page=alternatif' </script>";
        }else{
            // transaction rollback
            mysqli_rollback($connect);

            echo "<script> alert('Edit data alternatif gagal ...'); </script>";
        }
    } catch (Exception $e) {
        // transaction rollback
        mysqli_rollback($connect);

        echo "<script> alert('". $e->errorMessage() ."'); </script>";
    }
}

$tanaman = [];
$query = mysqli_query($connect, "SELECT * FROM tb_tanaman WHERE id = {$tanaman_id}");
while ($item = mysqli_fetch_assoc($query)) {
	$tanaman = $item;
}

// ambil data tekstur
$array_tekstur = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_tekstur WHERE tanaman_id = {$tanaman_id}");
while ($tekstur = mysqli_fetch_assoc($query)) {
	$array_tekstur[] = $tekstur;
}

// ambil data ph
$array_ph = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_ph WHERE tanaman_id = {$tanaman_id}");
while ($ph = mysqli_fetch_assoc($query)) {
	$array_ph[] = $ph;
}

// ambil data drainase
$array_drainase = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_drainase WHERE tanaman_id = {$tanaman_id}");
while ($drainase = mysqli_fetch_assoc($query)) {
	$array_drainase[] = $drainase;
}

// ambil data drainase
$array_suhu = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_suhu WHERE tanaman_id = {$tanaman_id}");
while ($suhu = mysqli_fetch_assoc($query)) {
	$array_suhu[] = $suhu;
}

// ambil data ketinggian
$array_ketinggian = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_tinggi_lahan WHERE tanaman_id = {$tanaman_id}");
while ($tinggi = mysqli_fetch_assoc($query)) {
	$array_ketinggian[] = $tinggi;
}

// ambil data lereng
$array_lereng = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_lereng WHERE tanaman_id = {$tanaman_id}");
while ($lereng = mysqli_fetch_assoc($query)) {
	$array_lereng[] = $lereng;
}

// ambil data lereng
$array_hujan = [];
$query = mysqli_query($connect, "SELECT * FROM tb_bobot_curah_hujan WHERE tanaman_id = {$tanaman_id}");
while ($hujan = mysqli_fetch_assoc($query)) {
	$array_hujan[] = $hujan;
}

// echo "<pre>". print_r($array_drainase, true)."</pre>";
// die();

?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h3 class="text-center font-bold col-teal">Edit DATA ALTERNATIF</h3>
            </div>
            <div class="header">
                <h5 class="font-bold col-teal">EDIT DATA</h5>
            </div>
            <div class="body">
                <form action="?page=edit-alternatif&id=<?= $tanaman_id ?>" method="post">
                    <?php include "form_alternatif.php" ?>
                </form>
            </div>
        </div>
    </div>
</div>
