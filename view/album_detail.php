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
                         
                         <?php
                         $alamat_web = "$url_rewrite" . "index.php/album";
                         require_once 'kalender_arsip.php';
                         $id_album = $clsPath->getByArray(4);
                         $tempid = str_replace(".html", "", $id_album);
                         $result = $DB->query("select album from gallery_album where id='$id_album'");
                         $hasil = $DB->fetch_array($result);
                         $album = $hasil['album'];

                         $result = $DB->query("select count(*) as jml from gallery_pics where id_album='$id_album'");
                         $hasil = $DB->fetch_array($result);
                         $jmlh = $hasil['jml'];
                         $title="$album ($jmlh foto)";
                         ?>
                         <p class="title">Album Foto (<?=$title?>)</p>
                         
                         <div class="contentBerita">
                                   <div id="links">
                              <?php
                              $sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
                                      . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
                                      . "  from gallery_pics where id_album='$tempid '  order by waktu desc ";
                           
                              $data = $DB->_fetch_array($sql, 1);
                              if (count($data) > 0)
                                   foreach ($data as $key => $value) {

                                        $waktu = $UTILITY->format_tanggal_time($value[waktu]);
                                        $id = $value['id'];
                                        $alamat = $url_rewrite . "imageGalleryD.php/$id.jpg";

                                        $judul = $value['album'];
                                        $deskripsi = $value['deskripsi'];
                                        $result = $DB->query("select count(*) as jml from gallery_pics where id_album='$id_album'");
                                        $hasil = $DB->fetch_array($result);
                                        $jmlh = $hasil['jml'];
                                        ?>
                                             <a href="<?php echo $alamat; ?>" title="<?=$deskripsi?>" data-gallery>
                                                  <img src="<?php echo $alamat; ?>" style="height: 50%; width: 32%;" class="presidenRI-gallery">
                                             </a>
                                    
                                        <?php
                                   } else
                                   echo "Tidak Ada Pemberitaan";
                              ?>
                                            </div>

                         </div>
                    </div>
                    <div class="col-md-4 contentRight">
                         <div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img class="img-responsive" src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

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

               <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
               <div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
                    <!-- The container for the modal slides -->
                    <div class="slides"></div>
                    <!-- Controls for the borderless lightbox -->
                    <h3 class="title"></h3>
                    <a class="prev"><span class="glyphicon glyphicon-chevron-left" style="font-size:22px; top:-5px;"></span></a>
                    <a class="next"><span class="glyphicon glyphicon-chevron-right" style="font-size:22px; top:-5px;"></span></a>
                    <a class="close">x</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
                    <div class="modal fade">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <button type="button" class="close" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                   </div>
                                   <div class="modal-body next"></div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left prev">
                                             <i class="glyphicon glyphicon-chevron-left"></i>
                                             Previous
                                        </button>
                                        <button type="button" class="btn btn-primary next">
                                             Next
                                             <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

<?php include('template/footer.php'); ?>
          </div>
     </div>
</body>
</html>
