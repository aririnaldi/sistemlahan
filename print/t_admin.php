<?php
$query_akhir = mysqli_query($connect,"SELECT * FROM tb_ranking WHERE level='$level' ORDER BY nilai_akhir ASC") or die(mysqli_error());
if(mysqli_num_rows($query_akhir) != 0){
?>
<hr style="border: 1px solid">
<label style="font-size: 30px">Program Studi : <?php echo $rows_level['nama_prodi']; ?></label>
<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th style="vertical-align: middle; text-align: center" rowspan="2" width="10px">No</th>
            <th style="vertical-align: middle; text-align: center" rowspan="2" width="100px">STANDAR</th>
            <th colspan="4" class="text-center">KRITERIA</th>
        </tr>
        <tr>
        <?php
        $tampil_krit = mysqli_query($connect,"SELECT * FROM tb_kriteria WHERE level='$level'");
        while ($rows_krit = mysqli_fetch_array($tampil_krit)) {
            # code...
            echo "<th style='vertical-align: middle;text-align:center' width='150px'>".strtoupper($rows_krit['kriteria'])."</th>";
        }
        ?>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$level' ORDER BY id_alternatif ASC") or die(mysqli_error());
        $no = 1;
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
            $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
            $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
            # code...

            echo "<tr>
                <td align=\"center\">".$no++."</td>
                <td>".$cekkriteria['alternatif']."</td>
                <td style='vertical-align: middle; text-align:center'>".$kat1[3]."</td>
                <td style='vertical-align: middle; text-align:center'>".$kat2[3]."</td>
                <td style='vertical-align: middle; text-align:center'>".$kat3[3]."</td>
                <td style='vertical-align: middle; text-align:center'>".$rows[5]." </td></tr>";
        }
        ?>
    <tr>
    <td colspan="2" class="font-bold text-center">Bobot</td>
    <?php
    $query_bobot = mysqli_query($connect,"SELECT * FROM tb_kriteria WHERE level='$level'");
    while ($rows_bobot = mysqli_fetch_array($query_bobot)) {
        # code...
        echo "<td align='center'>".($rows_bobot[2]/100)."</td>";
    }
    ?>
    </tr>
    </tbody>
</table>
<br>
<table class="table table-bordered ">
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
<?php } ?>