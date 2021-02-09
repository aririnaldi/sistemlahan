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
				<form method="post"><br>

					<div class="col-md-12">
						<div class="form-group">
                            <label for="alamat">Alamat</label>
							<div class="form-line">
								<input type="text" required id="alamat" class="form-control" name="alamat" placeholder="Masukan Alamat">
							</div>
                        </div>
                    </div>

					<div class="col-md-12">
                        <div class="form-group">
                            <label>Tekstur Tanah</label>
                                <select name="tekstur" class="form-control">
                                    <option value="Sangat Halus">Sangat Halus</option>
                                    <option value="Halus">Halus</option>
                                    <option value="Agak Halus">Agak Halus</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Agak Kasar">Agak Kasar</option>
                                    <option value="Kasar">Kasar</option>
                                </select>
                        </div>
                    </div>

                    <div class="col-md-12">
						<div class="form-group">
							<label for="ph">pH</label>
							<div class="form-line">
								<input type="text" id="ph" class="form-control" name="ph" placeholder="Masukan pH">
							</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="drainase">Drainase</label>
                            <select name="drainase" class="form-control">
                                <option value="Cepat">Cepat</option>
                                <option value="Agak Cepat">Agak Cepat</option>
                                <option value="Baik">Baik</option>
                                <option value="Agak Baik">Agak Baik</option>
                                <option value="Agak Terhambat">Agak Terhambat</option>
                                <option value="Terhambat">Terhambat</option>
                                <option value="Sangat Terhambat">Sangat Terhambat</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="suhu">Suhu</label>
                            <div class="form-line">
                                <input type="text" id="suhu" class="form-control" name="suhu" placeholder="Masukan Suhu">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="ketinggian">Ketinggian</label>
                            <div class="form-line">
                                <input type="number" id="ketinggian" class="form-control" name="ketinggian" placeholder="Masukan Ketinggian">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="lereng">Lereng</label>
                            <div class="form-line">
                                <input type="text" id="lereng" class="form-control" name="lereng" placeholder="Masukan Lereng">
                            </div>
                        </div>
                    </div>

					<div class="col-md-12">
						<div class="form-group">
                        <label for="curah_hujan">Curah Hujan</label>
                            <div class="form-line">
                                <input type="number" id="curah_hujan" class="form-control" name="curah_hujan" placeholder="Masukan Curah Hujan">
                            </div>
                        </div>
                    </div>

					<br><br>

					<input type="submit" name="save_alternatif" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" value="SAVE">
					<a href="?page=lahan" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['save_alternatif']))
	{
		$alamat=$_POST['alamat'];
		$tekstur = $_POST['tekstur'];
		$ph = $_POST['ph'];
		$drainase = $_POST['drainase'];
		$suhu = $_POST['suhu'];
		$ketinggian = $_POST['ketinggian'];
		$lereng = $_POST['lereng'];
		$curah_hujan = $_POST['curah_hujan'];

		$insert = mysqli_query($connect,"INSERT INTO tb_lahan VALUES('', '$alamat', '$tekstur', '$ph', '$drainase', '$suhu', '$ketinggian', '$lereng', '$curah_hujan')");
		if($insert)
		{
			echo "<script> alert('Tambah Lahan Berhasil ...'); document.location='?page=lahan' </script>";
		}
		else
		{
			echo "<script> alert('Tambah Lahan Gagal ...'); </script>";
		}
	}
?>
