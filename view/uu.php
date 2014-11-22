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
                         <p class="title">Peraturan Perundangan</p>
                         <table class="table table-striped table-hover">
                              <?php
                              $result=$DB->query("select tahun from uu order by tahun asc limit 1");
                              $data=$DB->fetch_array($result);
                              $tahun_min=$data['tahun'];
                              
                              $result=$DB->query("select tahun from uu order by tahun desc limit 1");
                              $data=$DB->fetch_array($result);
                              $tahun_max=$data['tahun'];
                              $kolom_span=$tahun_max-$tahun_min+1;
                              ?>
                              <thead>
                                   <tr>
                                        <td style="width: 20%;font-weight:bold;color:#fff;background-color:#808080;text-align: center">Lembara Negara</td>
                                        <td style="width: 80%;font-weight:bold;color:#fff;background-color:#808080;text-align: center" colspan="<?=$kolom_span?>">Tahun Disahkan</td>
                                   </tr>
                              </thead>
                              <tbody>
                                   <tr>
                                        <td>Peraturan Pemerintah</td>
                                        <?php
                                        showDataUU($DB, $tahun_min, $tahun_max, 1, "$url_rewrite"."index.php/uu/peraturan-pemerintah",80);
                                        ?>
                                   </tr>
                                   <tr>
                                        <td>Peraturan Presiden</td>
                                        <?php
                                        showDataUU($DB, $tahun_min, $tahun_max, 2, "$url_rewrite"."index.php/uu/peraturan-presiden",80);
                                        ?>
                                   </tr>
                                   <tr>
                                        <td>Keputusan Presiden</td>
                                        <?php
                                        showDataUU($DB, $tahun_min, $tahun_max, 3, "$url_rewrite"."index.php/uu/keputusan-presiden",80);
                                        ?>
                                   </tr>
                                   <tr>
                                        <td>Instruksi Presiden</td>
                                        <?php
                                        showDataUU($DB, $tahun_min, $tahun_max, 1, "$url_rewrite"."index.php/uu/instruksi-presiden",80);
                                        ?>
                                   </tr>
                              </tbody>
                                   
                              
                         </table>
                              <div class="separatorBerita"></div>
                         
                              
                    </div>


                    <div class="col-md-4 contentRight">
                         <!--
                         <div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

                              <div class="boxContent">
                                   <div id="tanggal">
                                        <?php
                                             prosess_tanggal($tgl, $alamat_web, $days, $status, 9, $DB);
                                        ?>
                                        
                                   </div>
                              </div>
                         </div>
                         -->
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