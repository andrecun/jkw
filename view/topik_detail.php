<?php 
require_once  "lib/application.php";
include('template/meta.php'); 

$id = $clsPath->getByArray(4);
$tempid = str_replace(".html","",$id);
  
            $alamat_web = "$url_rewrite" . "index.php/topik";
                         require_once 'kalender_arsip.php';
                         
$sql="select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from topik where status='1' and id='$tempid' order by waktu desc limit 7";
$result=$DB->query($sql);
$data=$DB->fetch_array($result);
$id=$data['id'];
$ringkasan=$data['deskripsi'];
$waktu=$UTILITY->format_tanggal($data[waktu]);
$judul=$data['judul_id'];
$alamat_img="$url_rewrite"."imageFokusD.php/"."$id.jpg";
     
?>

<body>
    <div id="mainbody">
    <div class="container presidenRI-container">
        <?php include('template/header.php'); ?>

        <div class="row presidenRI-contentDetail">
        	<div class="col-md-8 contentLeft">
        		<p class="title">Topik</p>
        		<div class="contentBerita">
        			<div class="beritaTitle">
	        			<div class="symbol col-md-1">
	        				<img src="<?php echo $url_rewrite;?>assets/img/judul.png">
	        			</div>
	        			<div class="tagline col-md-10">
		        			<p class="title"><?=$judul?></p>
		        			<p class="date"><?=$waktu?></p>
	        			</div>
        			</div>
                                      
                       	 <div class="row">
                                             <div class="col-md-12 text-justify">
        			<?=nl2br($data[isi_id])?>
                                                  </div>
                                        </div>
                                        
                                        
                                        <?php
                $sql = "select * from fokus_link where fokus_id='".$tempid."' order by id DESC limit 0,5";
                $data=$DB->_fetch_array($sql,1);
                if(count($data)>0)
                {                echo "<h3>Link Terkait:</h3>";
                  echo "<ul>";
                  foreach ($data as $key => $row) {
                    echo "<li><p><a href=\"".htmlspecialchars($row[url_link],ENT_QUOTES)."\"><b>".htmlspecialchars($row[judul_link],ENT_QUOTES)."</b></a><br />".htmlspecialchars($row[ringkasan],ENT_QUOTES)."</p></li>";   
                  }
                    
                  echo "</ul>";
                }
                ?>
        		</div>
        	</div>
        	<div class="col-md-4 contentRight">
        		<div class="presidenRI-box arsip">
                    <div class="boxHeader">
                        ARSIP
                    </div>
                    <img src="<?php echo $url_rewrite;?>assets/img/merahputih.png" class="img-responsive">

                    <div class="boxContent">
                         <div id="tanggal">
                              <?php
                               prosess_tanggal($tgl, $alamat_web, $days, $status, 2, $DB);
                              ?>
                              
                         </div>
			            <div class="clearfix"></div>
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