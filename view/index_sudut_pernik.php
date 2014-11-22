<div class="row sudut_pernik">
	<div class="merahputih">
	<div class="sudut pull-left">
           <h3><a href="<?=$url_rewrite?>index.php/sudutistana/">Sudut Istana</a></h3>
           
           <?php
      $sql="select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from serbaserbi where status='1' order by waktu desc limit 1";
     $result=$DB->query($sql);
     $data=$DB->fetch_array($result);

       $clsPath->addPathVarTo("sudutistana",true);
        $clsPath->addPathVarTo(sprintf("%4d",$data['thn']));
        $clsPath->addPathVarTo(sprintf("%02d",$data['bln']));
        $clsPath->addPathVarTo(sprintf("%02d",$data['tgl']));
        $clsPath->addPathVarTo($data['id'].".html");
        $alamat=$clsPath->getPathVarTo(true);
     
     $id=$data['id'];
     $judul=$data['judul_id'];
      $cuplikan_id=$data['cuplikan_id'];
     $alamat_img="$url_rewrite"."imageSerbaSerbiD.php/"."$id.jpg";
     $waktu=$UTILITY->format_tanggal($data[waktu]);
     ?>              
           
           
     
           
		<img src="<?php echo $alamat_img;?>" class="img-responsive" style="padding-left:0; width: 66.7%;">
		<p class="date"><?=$waktu?></p>
		<a href="<?=$alamat?>" class="title"><?=$judul?></a>
		<p class="text-justify"><?=$cuplikan_id?></p>
		<div style="margin-top: 10px;">
                 <?php
                   $clsPath->addPathVarTo("sudutistana",true);
                 ?>
			<a href="<?=$clsPath->getPathVarTo(true);?>/">Lihat Arsip >></a>
		</div>
	</div>
	<div class="pull-left merahputih"> </div>
	<div class="pernik pull-right">
           <h3><a href="<?=$url_rewrite?>index.php/pernakpernik/">Pernak-pernik</a></h3>
            
              <?php
      $sql="select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from istana.pernakpernik where status='1' order by waktu desc limit 1";
     $result=$DB->query($sql);
     $data=$DB->fetch_array($result);

       $clsPath->addPathVarTo("pernakpernik",true);
        $clsPath->addPathVarTo(sprintf("%4d",$data['thn']));
        $clsPath->addPathVarTo(sprintf("%02d",$data['bln']));
        $clsPath->addPathVarTo(sprintf("%02d",$data['tgl']));
        $clsPath->addPathVarTo($data['id'].".html");
        $alamat=$clsPath->getPathVarTo(true);
     
     $id=$data['id'];
     $judul=$data['judul_id'];
      $cuplikan_id=$data['cuplikan_id'];
     $alamat_img="$url_rewrite"."istana/imageD.php/"."$id.jpg";
     $waktu=$UTILITY->format_tanggal($data[waktu]);
     ?>              
		<img src="<?php echo $alamat_img;?>" class="img-responsive" style="padding-left:0; width: 66.7%;">
		<p class="date"><?=$waktu?></p>
		<a href="<?=$alamat?>" class="title"><?=$judul?></a>
		<p class="text-justify"><?=$cuplikan_id?></p>
		<div style="margin-top: 10px;">
                     <?php
                   $clsPath->addPathVarTo("pernakpernik",true);
                 ?>
			<a href="<?=$clsPath->getPathVarTo(true);?>/">Lihat Arsip >></a>
		</div>
	</div>
	<div class="clearfix"></div>
	</div>
</div>