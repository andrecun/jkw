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
                         <p class="title">Berita Foto</p>
                         <?php
                         $alamat_web = "$url_rewrite" . "index.php/foto";
                         require_once 'kalender_arsip.php';
                         
                         $sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                 . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
                                 . "  from beritafoto where status='1' and waktu like '$tgl_sistem%' order by waktu desc limit 5";
                         
                         $data = $DB->_fetch_array($sql, 1);
                         if(count($data)>0)
                         foreach ($data as $key => $value) {
                              $clsPath->addPathVarTo("foto", true);
                              $clsPath->addPathVarTo(sprintf("%4d", $value['thn']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['bln']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['tgl']));
                              $clsPath->addPathVarTo($value['id'] . ".html");
                              $alamat = $clsPath->getPathVarTo(true);

                              $waktu = $UTILITY->format_tanggal_time($value[waktu]);
                              $id= $value['id'];
                              $judul = $value['judul'];
                              $cuplikan_id = $value['Ringkasan'];
                              ?>

                              <!-- START BERITA -->
                              <div class="contentBerita">
                                   <div class="beritaTitle">
                                        <div class="tagline pull-left" style="padding:0;">
                                             <a href="<?=$alamat?>"><p class="title utama"><?=$judul?></p></a>
                                             <p class="date"><?=$waktu?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                   </div>

                                   <p>
                                        <?php
                                        //if($value[ContentTypeR	!=""])
                                        ?>
                                      <!--  <img src="<?php echo$url_rewrite; ?>imageFokusD.php/<?=$id?>.jpg" class="imgBerita pull-left">
                                        -->
                                        <?=$cuplikan_id?>
                                   </p>
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
                         <div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

                              <div class="boxContent">
                                   <div id="tanggal">
                                        <?php
                                             prosess_tanggal($tgl, $alamat_web, $days, $status, 4, $DB);
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