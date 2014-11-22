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
        		<p class="title">Album Foto</p>
        		<div class="contentBerita">

        			

                    <div class="row" style="margin: 0;">
                         <?php
                         $alamat_web = "$url_rewrite" . "index.php/album";
                         require_once 'kalender_arsip.php';
                         
                         $sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                 . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
                                 . "  from gallery_album where status='1' and waktu like '$tgl_sistem%' order by waktu desc limit 5";
                         
                         $data = $DB->_fetch_array($sql, 1);
                         if(count($data)>0)
                         foreach ($data as $key => $value) {
                              $clsPath->addPathVarTo("album", true);
                              $clsPath->addPathVarTo(sprintf("%4d", $value['thn']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['bln']));
                              $clsPath->addPathVarTo(sprintf("%02d", $value['tgl']));
                              $clsPath->addPathVarTo($value['id'] . ".html");
                              $alamat = $clsPath->getPathVarTo(true);

                              $waktu = $UTILITY->format_tanggal($value[waktu]);
                              $id= $value['id'];
                              $judul = $value['album'];
                              $deskripsi = $value['deskripsi'];
                              $result=$DB->query("select count(*) as jml from gallery_pics where id_album='$id'");
                              $hasil=$DB->fetch_array($result);
                              $jmlh=$hasil['jml'];
                              ?>
                         
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $alamat;?>">
                                 <?php
                                 if($value[TypeR]!="")
                                 ?>
                                <img src="<?php echo $url_rewrite;?>imageGalleryR.php/<?=$id?>.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $alamat;?>"><?=$judul?></a>
                                <p class="text-muted"><?=$waktu?><br/><?=$jmlh?> photos</p>
                            </div>
                            </div>
                        </div>
                              <?php
                         }
                         else {
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


        		</div>
        	</div>
        	<div class="col-md-4 contentRight">
        		<div class="presidenRI-box arsip">
                    <div class="boxHeader">
                        ARSIP
                    </div>
                    <img class="img-responsive" src="<?php echo $url_rewrite;?>assets/img/merahputih.png" class="img-responsive">

                    <div class="boxContent">
                          <div id="tanggal">
                                        <?php
                                             prosess_tanggal($tgl, $alamat_web, $days, $status, 13, $DB);
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
