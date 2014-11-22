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
        		<p class="title">Susunan Tim Redaksi</p>
        		<div class="contentBerita">

        			
                       <div id="row" style="font-family: sans-serif">

                            <?php
                            $data="<p style='color: #D80B0B; font-size: 20px; font-weight: bold;'>Website Presiden RI – Ir. H. Joko Widodo</p>Situs Resmi Presiden Ir. H. Joko Widodo ini dikelola oleh <strong>Biro Pers, Media dan Informasi Sekretariat Presiden</strong>

<strong>Penanggung Jawab</strong>
Kepala Sekretariat Presiden

<strong>Penasihat</strong>
- Djarot Sri Sulistyo
- Yuli Harsono
- Thanon Aria Dewangga

<strong>Pemimpin Redaksi</strong>
Albiner Sitompul

<strong>Redaktur Pelaksana</strong>
Prasetya Jaka Giyanto

<strong>Editor</strong>
- Irianto
- Chandra Agung K
- Nana Sukriyana

<strong>Tim Redaksi</strong>
- Indra Permana
- Husnul Fachmi
- Bobby Lukman Suardy
- Hamdhani Whisnu P
- Dian Sumarwan

<strong>Tim Foto</strong>
Muchlis Said

<strong>Tim Video</strong>
Atjep Setijana

<strong>Tim Transkrip</strong>
Indriasari

<strong>Tim Kliping</strong>
Wisnu Aribowo

<strong>Konsultan Teknis</strong>
- I Made Wiryana
- Andreas Hadiyono
- Sutresna Wati
- Koko Bachrudin
- Wijatmoko U. Prayitno
- Evans Winanda Wirga
- Kartika Dwintaputri Siregar
- Didy Nurchahyo
- Firman Yuspriadi

<strong>Penanggung Jawab Teknologi Informasi</strong>
PT.Telkom (Koordinator: Rully Jauvan Sagala)";
                             
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
