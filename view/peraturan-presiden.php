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
                         <p class="title">Peraturan Perundangan (Peraturan Presiden)</p>
                         <?php
                         $alamat_web = "$url_rewrite" . "index.php/peraturan-presiden";
                         require_once 'kalender_arsip.php';
                         
                                   if($status!=0)
                         $sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                 . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
                                 . "  from uu where status='1' and kategori='2' and waktu like '$tgl_sistem%' order by waktu desc ";
                         else
                              $sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                 . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
                                 . "  from uu where status='1' and kategori='2' order by waktu desc ";
                         
                         $data = $DB->_fetch_array($sql, 1);
                         if(count($data)>0)
                         foreach ($data as $key => $value) {
                              $clsPath->addPathVarTo("peraturan-presiden", true);
                              $clsPath->addPathVarTo(sprintf("%4d", $value['thn']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['bln']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['tgl']));
                              $clsPath->addPathVarTo($value['id'] . ".html");
                              $alamat = $clsPath->getPathVarTo(true);

                              $waktu = $UTILITY->format_tanggal($value[waktu]);
                              $id= $value['id'];
                               $tentang= $value['tentang'];
                              $tempat= $value['tempat'];
                              $kategori=$value['kategori'];
                              $tahun=$value['tahun'];
                              $nomor=$value['nomor'];
                              $download="$url_rewrite"."DokumenUU.php/$id.pdf";
                              switch ($kategori) {
                                   case 1:
                                        $text_kategori="Peraturan Pemerintah";
                                        break;
                                    case 2:
                                        $text_kategori="Peraturan Presiden";
                                        break;
                                    case 3:
                                        $text_kategori="Keputusan Presiden";
                                        break;
                                    case 4:
                                        $text_kategori="Instruksi Presiden";
                    
                              }
                              $judul="$text_kategori Nomor $nomor tahun $tahun";

                              $penetapan="Ditetapkan  di $tempat tanggal $waktu";
                              ?>

                              <!-- START BERITA -->
                              <div class="contentBerita">
                                   <div class="beritaTitle">
                                        <div class="tagline pull-left">
                                              <!--<p class="title utama"><?=$text_kategori?></p>-->
                                             <p ><b><?=$judul?></b></p>

                                             <p ><b><?=$tentang?></b></p>
                                             <?php if($value[TypeD]!="")?>
                                             <p>[<a href="<?=$download?>" target="_blank">Download Pdf</a>]</p>
                                             <p><?=$penetapan?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                   </div>

                              </div>
                              <!-- END BERITA -->

                              <div class="separatorBerita"></div>
                              <?php
                         } 
                         else{
                         //gak ada berita
                         ?>
                               <!-- START BERITA -->
                              <div class="contentBerita">
                                   
                                   <p style="text-align: center">
                                                                      Tidak Ada Pemberitaan</p>
                              </div>
                              <!-- END BERITA -->

                              <div class="separatorBerita"></div>
                         <?php }?>
                              
                    </div>


                    <div class="col-md-4 contentRight">
                         <!--<div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

                              <div class="boxContent">
                                   <div id="tanggal">
                                        <?php
                                             prosess_tanggal($tgl, $alamat_web, $days, $status, 10, $DB);
                                        ?>
                                        
                                   </div>
                              </div>
                         </div>-->
                         
                            <?php include 'view/menu_uu.php';?>

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