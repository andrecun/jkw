<div class="col-md-8 contentMid-left">
    <div class="index_berita">
        <div class="presidenRI-title">
            <div class="doubleLine">
                <div class="tick"></div>
                <div class="thin"></div>
                <div class="title text-center"><span><a href="<?=$url_rewrite?>index.php/berita/">BERITA</a></span></div>
            </div>
        </div>

        <?php


        $sql="select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from fokus where status='1' order by waktu desc limit 5";
        $data=$DB->_fetch_array($sql,1);
        foreach ($data as $key => $value) {
        $clsPath->addPathVarTo("berita",true);
        $clsPath->addPathVarTo(sprintf("%4d",$value['thn']));
        $clsPath->addPathVarTo(sprintf("%02d",$value['bln']));
        $clsPath->addPathVarTo(sprintf("%02d",$value['tgl']));
        $clsPath->addPathVarTo($value['id'].".html");
        $alamat=$clsPath->getPathVarTo(true);

        $waktu=$UTILITY->format_tanggal_time($value[waktu]);
        $judul=$value['id'];
        $judul=$value['judul_id'];
        $cuplikan_id=$value['cuplikan_id'];
        ?>



    <!-- START ROW BERITA -->
        <div class="front-berita">
            <p class="date"><?=$waktu?> WIB</p>
            <a class="title" href="<?=$alamat?>" target="_blank"><?=$judul?></a>
            <p class="content text-justify"><?=$cuplikan_id?></p>
        </div>
        <!--<div class="front-berita">
            <p class="date">Senin, 20 Oktober 2014, 14:54:13 WIB</p>
            <a class="title">Upacara Pelepasan SBY dan Penyambutan Jokowi</a>
            <p class="content text-justify">Presiden ke-7 Joko Widodo dan Presiden ke-6 SBY bersama-sama menghadiri Upacara Penyambutan Kemiliteran Presiden ri dan Pelepasan Presiden RI ke-6 di Istana Merdeka, Senin (20/10) pukul 14.30. Jokowo didampingi Ibu Negara Iriana, sedangkan SBY bersama Ibu Ani.</p>
        </div>-->


    <?php
    }
    $clsPath->addPathVarTo("fokus",true);
    ?>

        <div style="padding:15px;">
            <a href="<?=$clsPath->getPathVarTo(true);?>/">Lihat berita selanjutnya >></a>
        </div>
    </div>
    <?php
            include "view/index_sudut_pernik.php";
        ?>
</div>