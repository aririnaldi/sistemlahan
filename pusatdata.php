<?php

class pusatdata{

    function pilihanTekstur(){
        return ["Sangat Halus", "Halus", "Agak Halus", "Sedang", "Agak Kasar", "Kasar"];
    }

    function pilihanDrainase(){
        return ["Cepat", "Agak Cepat", "Baik", "Agak Baik", "Agak Terhambat", "Terhambat", "Sangat Terhambat"];
    }

    function getCalculate($connect, $data){
        $temp_hasil_lengkap = [];
        $temp_hasil_angka = [];
        $temp_hasil_akhir = [];
        $rank = [];
        $max_net_flow = 0;
        $sql = mysqli_query($connect, "SELECT * FROM tb_tanaman");
        while ($item = mysqli_fetch_assoc($sql)) {
            $tanaman_id = (int) $item['id'];
            $query = "
                SELECT
                    t.id, t.nama, COALESCE(bt.bobot, 0) AS bobot_tekstur,
                    COALESCE(bp.bobot, 0) AS bobot_ph,
                    COALESCE(bs.bobot, 0) AS bobot_suhu,
                    COALESCE(bd.bobot, 0) AS bobot_drainase,
                    COALESCE(bl.bobot, 0) AS bobot_lereng,
                    COALESCE(btl.bobot, 0) AS bobot_tinggi_lahan,
                    COALESCE(bch.bobot, 0) AS bobot_curah_hujan
                FROM tb_tanaman AS t
                    LEFT JOIN (
                        SELECT MIN(bt.id), bt.tanaman_id, bt.nama, bt.bobot
                        FROM tb_bobot_tekstur AS bt
                            INNER JOIN tb_tanaman AS t ON t.id = bt.tanaman_id AND t.id = {$tanaman_id}
                        WHERE bt.nama = '". $data['tekstur'] ."'
                        GROUP BY bt.tanaman_id, bt.nama, bt.bobot
                    ) AS bt ON bt.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(bs.id), bs.tanaman_id, bs.min_suhu, bs.maks_suhu, bs.bobot
                        FROM tb_bobot_suhu AS bs
                            INNER JOIN tb_tanaman AS t ON t.id = bs.tanaman_id AND t.id = {$tanaman_id}
                        WHERE ". $data['suhu'] ." BETWEEN bs.min_suhu AND bs.maks_suhu
                        GROUP BY bs.tanaman_id, bs.min_suhu, bs.maks_suhu, bs.bobot
                    ) AS bs ON bs.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(bp.id), bp.tanaman_id, bp.min_ph, bp.maks_ph, bp.bobot
                        FROM tb_bobot_ph AS bp
                            INNER JOIN tb_tanaman AS t ON t.id = bp.tanaman_id AND t.id = {$tanaman_id}
                        WHERE ". $data['ph'] ." BETWEEN bp.min_ph AND bp.maks_ph
                        GROUP BY bp.tanaman_id, bp.min_ph, bp.maks_ph, bp.bobot
                    ) AS bp ON bp.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(bd.id), bd.tanaman_id, bd.nama, bd.bobot
                        FROM tb_bobot_drainase AS bd
                            INNER JOIN tb_tanaman AS t ON t.id = bd.tanaman_id AND t.id = {$tanaman_id}
                        WHERE bd.nama = '". $data['drainase'] ."'
                        GROUP BY bd.tanaman_id, bd.nama, bd.bobot
                    ) AS bd ON bd.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(btl.id), btl.tanaman_id, btl.min_tinggi, btl.maks_tinggi, btl.bobot
                        FROM tb_bobot_tinggi_lahan AS btl
                            INNER JOIN tb_tanaman AS t ON t.id = btl.tanaman_id AND t.id = {$tanaman_id}
                        WHERE ". $data['ketinggian'] ." BETWEEN btl.min_tinggi AND btl.maks_tinggi
                        GROUP BY btl.tanaman_id, btl.min_tinggi, btl.maks_tinggi, btl.bobot
                    ) AS btl ON btl.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(bl.id), bl.tanaman_id, bl.min_lereng, bl.maks_lereng, bl.bobot
                        FROM tb_bobot_lereng AS bl
                            INNER JOIN tb_tanaman AS t ON t.id = bl.tanaman_id AND t.id = {$tanaman_id}
                        WHERE ". $data['lereng'] ." BETWEEN bl.min_lereng AND bl.maks_lereng
                        GROUP BY bl.tanaman_id, bl.min_lereng, bl.maks_lereng, bl.bobot
                    ) AS bl ON bl.tanaman_id = t.id
                    LEFT JOIN (
                        SELECT MIN(bch.id), bch.tanaman_id, bch.min_curah, bch.maks_curah, bch.bobot
                        FROM tb_bobot_curah_hujan AS bch
                            INNER JOIN tb_tanaman AS t ON t.id = bch.tanaman_id AND t.id = {$tanaman_id}
                        WHERE ". $data['curah_hujan'] ." BETWEEN bch.min_curah AND bch.maks_curah
                        GROUP BY bch.tanaman_id, bch.min_curah, bch.maks_curah, bch.bobot
                    ) AS bch ON bch.tanaman_id = t.id
                WHERE t.id = {$tanaman_id}
            ";

            $temp_query = mysqli_query($connect, $query);
            $temp_hasil = mysqli_fetch_assoc($temp_query);
            $temp_hasil_lengkap[] = $temp_hasil;
            $temp_hasil_angka[] = [
                $temp_hasil['bobot_tekstur'],
                $temp_hasil['bobot_ph'],
                $temp_hasil['bobot_suhu'],
                $temp_hasil['bobot_drainase'],
                $temp_hasil['bobot_lereng'],
                $temp_hasil['bobot_tinggi_lahan'],
                $temp_hasil['bobot_curah_hujan'],
            ];
        }

        $temp_hasil_akhir = [];
        if (! empty($temp_hasil_angka)) {
            $temp_calculate = [];
            foreach ($temp_hasil_angka as $key => $item) {
                // echo "<pre>". print_r($item, true) ."</pre>";
                // die();

                // calculate leaving
                $temp_flow = [];
                foreach ($item as $l_1 => $v_1) {
                    $temp_ = [];
                    foreach ($item as $l_2 => $v_2) {
                        if ($l_1 != $l_2) {
                            $temp_[] = ($v_1 - $v_2) < 0 ? 0 : $v_1 - $v_2;
                            // $temp_[] = $l_1 . " - " . $l_2;
                        }
                    }

                    $temp_flow[$l_1] = array_sum($temp_);
                    // $temp_flow[$l_1] = $temp_;
                }

                $temp_calculate[] = $temp_flow;

                // echo "<pre>". print_r($temp_calculate, true) ."</pre>";
                // die();
            }

            foreach ($temp_calculate as $key => $item) {
                $temp_hasil_akhir[$key]['id'] = $temp_hasil_lengkap[$key]['id'];
                $temp_hasil_akhir[$key]['tanaman'] = $temp_hasil_lengkap[$key]['nama'];
                $temp_hasil_akhir[$key]['leaving'] = round(array_sum($item) / (count($item) - 1), 2);
                $temp_hasil_akhir[$key]['entering'] = round(array_sum(array_column($temp_calculate, $key)) / (count($item) - 1), 2);
                $temp_hasil_akhir[$key]['net'] = $temp_hasil_akhir[$key]['leaving'] - $temp_hasil_akhir[$key]['entering'];
            }
        }

        return $temp_hasil_akhir;
    }

    public function getRankCalculation($data){
        $rank = [];
        $max_net_flow = 0;

        foreach ($data as $key => $item) {
            if ((float) $item['net'] >= $max_net_flow) {
                if ((float) $item['net'] > $max_net_flow) {
                    $rank = [];
                }

                $max_net_flow = (float) $item['net'];
                $rank[] = $item;
            }
        }

        return $rank;
    }

    public function dd($data){
        echo "<pre>". print_r($data, true) ."</pre>";
        die();
    }

}


 ?>
