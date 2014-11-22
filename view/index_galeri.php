<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->


     <ol class="carousel-indicators">
          <?php
          $sql = "select * from beritafoto where status='1' order by waktu desc limit 0,5";
          $data = $DB->_fetch_array($sql, 1);
          $jml_data = count($data);
          for ($i = 0; $i < $jml_data; $i++) {
               ?>

               <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" class="active"></li>
               <!-- <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
     <?php
}
?>
     </ol>
 <div class="carousel-inner" role="listbox">
<?php

     $active=1;
foreach ($data as $key => $value) {
     $waktu = $UTILITY->format_tanggal_time($value[waktu]);
     $id = $value['id'];
     $deskripsi = $value['Ringkasan'];
     $alamat_img="$url_rewrite"."imageBeritafotoD.php/"."$id.jpg";
     if($active==1)
          $text_active="active";
     else
          $text_active="";
     $active++;
?>

     <!-- Wrapper for slides -->
    
          <div class="item <?=$text_active?>">
               <img src="<?php echo $alamat_img; ?>">
               <div class="carousel-caption">
                    <?=$deskripsi?>
               </div>
          </div>
   
  <?php }
?>
     </div>

     <!-- Controls -->
     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
     </a>
</div>