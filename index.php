<?php 
require_once  "lib/application.php";
include('template/meta.php'); 
if($clsPath->isPathVarTo()) {
     if ($clsPath->isValidPath("^/berita/")) { 
          include"berita.php"; 
          exit;
     }else if($clsPath->isValidPath("^/topik/")) { 
          include"topik.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/kabinet/")) { 
          include "statik/kabinet.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/link/")) { 
          include "statik/link.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/profil/")) { 
          include "statik/profil.php"; 
          exit;
      }else if($clsPath->isValidPath("^/agenda/")) { 
          include "agenda.php"; 
          exit;
      }else if($clsPath->isValidPath("^/foto/")) { 
          include "foto.php"; 
          exit;
       }else if($clsPath->isValidPath("^/video/")) { 
          include "video.php"; 
          exit;
     }else if($clsPath->isValidPath("^/pidato/")) { 
          include "pidato.php"; 
          exit;
     }else if($clsPath->isValidPath("^/wawancara/")) { 
          include "wawancara.php"; 
          exit;
     }else if($clsPath->isValidPath("^/kliping/")) { 
          include "kliping.php"; 
          exit;
     }else if($clsPath->isValidPath("^/uu/")) { 
          include "uu.php"; 
          exit;
     }else if($clsPath->isValidPath("^/album/")) { 
          include "album.php"; 
          exit;
     }else if($clsPath->isValidPath("^/sudutistana/")) { 
          include "sudut.php"; 
          exit;
     }else if($clsPath->isValidPath("^/pernakpernik/")) { 
          include "./pernak-pernik.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/redaksi/")) { 
          include "statik/redaksi.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/syarat_kondisi/")) { 
          include "statik/syarat_kondisi.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/peta_situs/")) { 
          include "statik/peta_situs.php"; 
          exit;
     }else if($clsPath->isValidPath("^/statik/kontak/")) { 
          include "statik/kontak.php"; 
          exit;
     
     }else if($clsPath->isValidPath("^/statik/kotak-pesan/")) { 
          include "statik/kotak-pesan.php"; 
          exit;
     }
     
     
     
}
?>

<body>
    <div id="mainbody">
    <div class="container presidenRI-container">
        <?php include('template/header.php'); ?>

        <div class="row presidenRI-contentTop">
            <div class="col-md-8 contentTop-left">
                <?php include('view/index_galeri.php'); ?>
            </div>
            <div class="col-md-4 contentTop-right">
                <?php
                include "view/index_fokus.php";
                ?>
            </div>
        </div>


        <div class="row presidenRI-contentMid">
            <?php
                include "view/index_berita.php";
            ?>

            <div class="col-md-4 contentMid-right">
            
            <!-- START AGENDA -->    
               <?php include "view/index_agenda.php";?>
               
            <!-- START BERITA FOTO -->
                <?php
                    include "view/index_berita_foto.php";
                ?>

            <!-- START VIDEO STREAMING -->
                <?php include "view/index_video.php";?>

            <!-- START LINK RI -->
                <div class="presidenRI-box linkRI">
                    <div class="boxContent">
                        <div class="ibuNegara pull-left">
                            <img src="<?php echo $url_rewrite;?>assets/img/ibunegara.jpg" class="img-responsive">
                            <p>Ibu</p>
                            <p>Negara RI</p>
                        </div>

                        <div class="pull-left">
                            <img src="<?php echo $url_rewrite;?>assets/img/merahputih-2.png" style="height: 149px; margin-left:8px;">
                        </div>

                        <div class="istanaRI pull-right">
                            <img src="<?php echo $url_rewrite;?>assets/img/istananegara.jpg" class="img-responsive">
                            <p>Istana</p>
                            <p>Kepresidenan RI</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            
             <div class="presidenRI-box agenda">
                    <div class="boxHeader">
                          <a>Mutiara Kata</a>
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>

                     <div class="front-berita">
                              <p class="content text-justify">
                              <?php
                                $sql="select * from mutiara where status='1' order by waktu desc limit 1";
                                $result=$DB->query($sql);
                                $data=$DB->fetch_array($result);
                                $mutiara=$data['mutiara'];
                                $tempat=$data['tempat'];
                                $event=$data['event'];
                                echo "<i style='font-size: small'>$mutiara</i><br/><i>$event </i>"
                              ?>          
                              </p>
                    </div>
                </div>
            
            
            
            </div>
        </div>


        <?php include('template/javascript.php'); ?>
        <?php include('template/footer.php'); ?>
    </div>
    </div>
</body>
</html>
