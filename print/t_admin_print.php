<?php
$query_akhir = mysqli_query($connect,"SELECT * FROM tb_ranking WHERE level='$level' ORDER BY nilai_akhir ASC") or die(mysqli_error());
if(mysqli_num_rows($query_akhir) != 0){
?>
<div style="padding-bottom: 350px">
<hr style="border: 1px solid">
<label style="font-size: 30px">Program Studi : <?php echo $rows_level['nama_prodi']; ?></label>
<table class="table table-bordered">
<p align="left"><label style="font-size: 20px">Hasil Ranking</label></p>
        <?php
        $no = 1;
        echo "<tr>
        <th class='text-center'>No</th>
        <th colspan='2'>Standar</th>
        <th class='text-center'>Hasil Akhir</th>
        <th class='text-center'>Ranking</th>
        </tr>";
        while ($rows_akhir = mysqli_fetch_array($query_akhir)) {
            # code...
            $ambil_nil = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE id_penilaian = '$rows_akhir[1]'"));
            $ambil_alt = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$ambil_nil[1]'"));
            echo "<tr>
                <td class='text-center'>".$no++."</td>
                <td>".$ambil_alt[1]."</td>
                <td>".$ambil_alt[2]."</td>
                <td class='text-center'>".number_format($rows_akhir[2],2)."</td>
                <td class='text-center font-bold'>".($no-1)."</td>
            </tr>";
        }
        ?>
</table>
</div>
<?php
}
?>