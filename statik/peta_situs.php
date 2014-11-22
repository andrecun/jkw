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
        		<p class="title">Peta Situs</p>
        		<div class="contentBerita">

        			
                       <div id="row" style="font-family: sans-serif">

                            <?php
                            $data="<strong>Website Presiden RI Dr. H. Susilo Bambang Yudhoyono</strong>

<a href='".$url_rewrite."'>Beranda</a>
<a href='".$url_rewrite."index.php/statik/profil/'>Profil</a>
<a href='".$url_rewrite."index.php/pidato/'>Pidato</a>
<a href='".$url_rewrite."index.php/wawancara/'>Wawancara</a>
<a href='".$url_rewrite."index.php/album/'>Album Foto</a>
<a href='".$url_rewrite."index.php/berita/'>Berita</a>
<a href='".$url_rewrite."index.php/topik/'>Topik Aktual</a>
<a href='".$url_rewrite."index.php/agenda/'>Agenda</a>
<a href='".$url_rewrite."index.php/foto/'>Berita Foto</a>
<a href='".$url_rewrite."index.php/video/'>Video Streaming</a>
<a href='".$url_rewrite."index.php/suditistana/'>Sudut Istana</a>
<a href='".$url_rewrite."index.php/pernakpernik/'>Pernak-Pernik</a>
<a href='".$url_rewrite."index.php/statik/kabinet/'>Kabinet Kerja</a>
<a href='".$url_rewrite."'>Link Indonesia</a>
<a href='".$url_rewrite."index.php/uu/'>Perundang-undangan</a>
<a href='".$url_rewrite."index.php/foto/'>Foto</a>
<a href='".$url_rewrite."index.php/kliping/'>Kliping</a>
<a href='".$url_rewrite."'>Layanan Masyarakat</a>
";
                             
                            ?>
                            <p style="text-align: justify"><?=  nl2br($data)?></p> 
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
                        <div id="datepicker"></div>
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
