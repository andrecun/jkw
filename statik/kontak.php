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
        		<p class="title">Kontak</p>
        		<div class="contentBerita">

        			
                       <div id="row" style="font-family: sans-serif">

                            <?php
                            $data="Alamat Kontak tim redaksi Website Presiden RI Ir. H. Joko Widodo

<strong>Biro Pers, Media dan Informasi, Sekretariat Presiden</strong>
Jl. Veteran No.16, Jakarta";
                             
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
