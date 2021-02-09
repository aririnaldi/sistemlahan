
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h3 class="text-center font-bold col-teal">TAMBAH DATA ATURAN</h3>
            </div>
            <div class="header">
                <h5 class="font-bold col-teal">TAMBAH DATA</h5>
            </div>
            <div class="body">
                <form method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_tanaman">Nama Tanaman</label>
                            <div class="form-line">
                                <input type="text" id="nama_tanaman" class="form-control" name="nama_tanaman" placeholder="Masukan Nama Tanaman">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tekstur">Tekstur Tanah</label>
                            <div class="form-line">
                                <input type="text" id="tekstur" class="form-control" name="tekstur" placeholder="Masukan tekstur tanah">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ph_min">pH Minimum</label>
                            <div class="form-line">
                                <input type="text" id="ph_min" class="form-control" name="ph_min" placeholder="Masukan pH Minimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ph_max">pH Maksimum</label>
                            <div class="form-line">
                                <input type="text" id="ph_max" class="form-control" name="ph_max" placeholder="Masukan pH Maximum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="drainase">drainase</label>
                            <div class="form-line">
                                <input type="text" id="drainase" class="form-control" name="drainase" placeholder="Masukan Drainase">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="suhu_min">Suhu Minimum</label>
                            <div class="form-line">
                                <input type="number" id="suhu_min" class="form-control" name="suhu_min" placeholder="Masukan Suhu Minimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="suhu_max">Suhu Maksimum</label>
                            <div class="form-line">
                                <input type="number" id="suhu_max" class="form-control" name="suhu_max" placeholder="Masukan Suhu Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ketinggian_min">Ketinggian Minimum</label>
                            <div class="form-line">
                                <input type="number" id="ketinggian_min" class="form-control" name="ketinggian_min" placeholder="Masukan Ketinggian Minimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ketinggian_max">Ketinggian Maksimum</label>
                            <div class="form-line">
                                <input type="number" id="ketinggian_max" class="form-control" name="ketinggian_max" placeholder="Masukan Ketinggian Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lereng_min">Lereng Minimum</label>
                            <div class="form-line">
                                <input type="number" id="lereng_min" class="form-control" name="lereng_min" placeholder="Masukan Lereng Minimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lereng_max">Lereng Maksimum</label>
                            <div class="form-line">
                                <input type="number" id="lereng_max" class="form-control" name="lereng_max" placeholder="Masukan Lereng Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ch_min">Curah Hujan Minimum</label>
                            <div class="form-line">
                                <input type="number" id="ch_min" class="form-control" name="ch_min" placeholder="Masukan Curah Hujan Minimum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ch_max">Curah Hujan Maksimum</label>
                            <div class="form-line">
                                <input type="number" id="ch_max" class="form-control" name="ch_max" placeholder="Masukan Curah Hujan Maksimum">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="save_nama_tanaman" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" value="SAVE">
                    <a href="?page=alternatif" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['save_nama_tanaman'])){
        $kode=$_POST['kode'];
        $nama_tanaman = $_POST['nama_tanaman'];
        $tekstur = $_POST['tekstur'];
        $ph_min = $_POST['ph_min'];
        $ph_max = $_POST['ph_max'];
        $drainase = $_POST['drainase'];
        $suhu_min = $_POST['suhu_min'];
        $suhu_max = $_POST['suhu_max'];
        $ketinggian_min = $_POST['ketinggian_min'];
        $ketinggian_max = $_POST['ketinggian_max'];
        $lereng_min = $_POST['lereng_min'];
        $lereng_max = $_POST['lereng_max'];
        $ch_min = $_POST['ch_min'];
        $ch_max = $_POST['ch_max'];

        $input = mysqli_query($connect,"INSERT INTO tb_alternatif VALUES
		(
			'$kode',
            '$nama_tanaman',
            '$tekstur',
            '$ph_min',
            '$ph_max',
            '$drainase',
            '$suhu_min',
            '$suhu_max',
            '$ketinggian_min',
            '$ketinggian_max',
            '$lereng_min',
            '$lereng_max',
            '$ch_min',
            '$ch_max'
		)");

		if($input){
			echo "<script> alert('Tambah Alternatif Berhasil ...'); document.location='?page=alternatif' </script>";
		}else{
            echo "<script> alert('Tambah Alternatif Gagal ...'); </script>";
		}
    }
?>
