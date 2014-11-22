<?php
require_once "lib/application.php";
include('template/meta.php');
?>

<body>
     <div id="mainbody">
          <div class="container presidenRI-container">
               <?php include('template/header.php'); ?>

               <div class="row presidenRI-contentDetail">
                    <div class="col-md-8 contentLeft">
                         <p class="title">Agenda</p>
                         <?php
                         $alamat_web = "$url_rewrite" . "index.php/agenda";
                         require_once 'kalender_arsip.php';

                         $sql = "select *,DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                 . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i') as jam"
                                 . "  from km0 where status='1' and waktu like '$tgl_sistem%' order by waktu asc limit 5";

                         $data = $DB->_fetch_array($sql, 1);
                         $tgl_skrg = "";
                         ?>
                         <!-- START BERITA -->
                         <div class="contentBerita" >
                              <?php
                              $title=1;
                              $tgl_cek=0;
                              $start=0;
                              $no=1;
                              if (count($data) > 0) {
                                   foreach ($data as $key => $value) {
                                        $clsPath->addPathVarTo("agenda", true);
                                        $clsPath->addPathVarTo(sprintf("%4d", $value['thn']));
                                        $clsPath->addPathVarTo(sprintf("%02d", $value['bln']));
                                        $clsPath->addPathVarTo(sprintf("%02d", $value['tgl']));
                                        $clsPath->addPathVarTo($value['id'] . ".html");
                                        $alamat = $clsPath->getPathVarTo(true);

                                        $waktu = $UTILITY->format_tanggal_time_ind($value[waktu]);
                                        $hari = $UTILITY->text_hari($value[hari]);
                                        $id = $value['id'];
                                        $judul = $value['judul_id'];
                                        $cuplikan_id = $value['cuplikan_id'];
                                        $tgl_cetak = "$hari, $waktu";
                                        $jam = $value[jam];
                                        $isi=$value[isi];
                                        $header="<p><center><h3>$tgl_cetak<h3></center></p>
                                                            <table class=\"table table-bordered table-hover\">
                                                       <thead><tr><td>No</td>
                                                       <td>Jam</td>
                                                       <td>Deskripsi Kegiatan/Tempat</td></tr></thead><tbody>";
                                  
                                        $footer="</tbody></table><br/>";
                                        //cek kesamaan
                                        if($start==0)
                                             $title=1;
                                        elseif($tgl_cek!=$tgl_cetak ){
                                             $title=1;
                                        }
                                        //akhir cek kesamaan
                                        //echo "-->$title dan $start <br/>";
                                        //print tabel                                        
                                        if ($title==1&&$start==0)
                                        {    //print judul pertama kali
                                                  echo $header;
                                                  $title=0;
                                                  $tgl_cek=$tgl_cetak;
                                                  $no=1;
                                        }elseif($title==1){
                                             //print judul untuk periode berikutnya
                                             echo $footer;
                                             echo $header;
                                             $title=0;
                                             $no=1;
                                        }
                                              $body="<tr> <td>$no</td>
                                                       <td>$jam WIB</td>
                                                       <td>$isi</td></tr>";
                                        echo $body;     
                                        
                                        $no++;
                                        $start++;
                                        ?>

                                        <?php }
                                        echo "$footer";
                                   ?>
                              </div>
                              <!-- END BERITA -->
                              <?php
                         } else {
                              //gak ada berita
                              ?>
                         
                                   <p style="text-align: center">
                                        Tidak ada pemberitaan</p>
                              </div>
                              <!-- END BERITA -->

                              <div class="separatorBerita"></div>
                         <?php } ?>

                    </div>


                    <div class="col-md-4 contentRight">
                         <div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

                              <div class="boxContent">
                                   <div id="tanggal">
                                        <?php
                                        prosess_tanggal($tgl, $alamat_web, $days, $status, 3, $DB);
                                        ?>

                                   </div>
                              </div>
                         </div>

                          <?php
                        include "view/right_menu.php";
                        ?>
                    </div>
               </div>


               <?php include('template/javascript.php'); ?>
               <?php include('template/footer.php'); ?>
          </div>
     </div>
</body>
</html>