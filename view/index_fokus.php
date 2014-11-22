<div class="presidenRI-box fokusAktual">
                    <div class="boxHeader ">
                         <a href="<?=$url_rewrite?>index.php/topik/">  TOPIK AKTUAL</a>
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>

                    <div class="boxContent">
                         <ul>
                    <?php
$sql="select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from topik  where status='1' order by waktu desc limit 3";
$data=$DB->_fetch_array($sql,1);
foreach ($data as $key => $value) {
     $clsPath->addPathVarTo("topik",true);
     $clsPath->addPathVarTo(sprintf("%4d",$value['thn']));
     $clsPath->addPathVarTo(sprintf("%02d",$value['bln']));
     $clsPath->addPathVarTo(sprintf("%02d",$value['tgl']));
     $clsPath->addPathVarTo($value['id'].".html");
     $alamat=$clsPath->getPathVarTo(true);
          
    $waktu=$UTILITY->format_tanggal_time_ind($value[waktu]);
    $judul=$value['id'];
    $judul=$value['judul_id'];
    $cuplikan_id=$value['cuplikan_id'];
?>
                        
                            <li>
                                <p class="date"><?=$waktu?></p>
                                <a class="title" href="<?=$alamat?>"><?=$judul?></a>
                            </li>
                         <!--   <li>
                                <p class="date">Kamis, 14 Oktober 2014</p>
                                <a class="title">Pengantar Menerima Panitia Seleksi Ketua KPK</a>
                            </li>-->
                         
                            <?php
}
                            ?>
                        </ul>
                    </div>
                    <div class="boxFooter">
                        <a href="#" class="arsip">Arsip >></a>
                    </div>
                </div>