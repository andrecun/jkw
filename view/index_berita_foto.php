<div class="presidenRI-box beritaFoto">
                    <div class="boxHeader ">
                         <a href="<?=$url_rewrite?>index.php/foto/">BERITA FOTO</a>  
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>
     <?php
     $sql="select * from beritafoto where status='1' order by waktu desc limit 6,1";
     $result=$DB->query($sql);
     $data=$DB->fetch_array($result);
     $id=$data['id'];
     $ringkasan=$data['Ringkasan'];
     $alamat_img="$url_rewrite"."imageBeritafotoR.php/"."$id.jpg";
     ?>               

                    <div class="boxContent text-center">
                        <img src="<?php echo $alamat_img;?>">
                        <p class="text-justify"><?=$ringkasan?></p>
                    </div>
     
     <?php
     $clsPath->addPathVarTo("foto",true);
     ?>
     <div class="boxFooter text-right">
                        <a href="<?=$clsPath->getPathVarTo(true);?>/" class="arsip">Arsip >></a>
                    </div>
                </div>