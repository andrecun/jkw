<?php include('template/meta.php'); ?>

<body>
    <div id="mainbody">
    <div class="container presidenRI-container">
        <?php include('template/header.php'); ?>

        <div class="row presidenRI-contentDetail">
        	<div class="col-md-8 contentLeft">
        		<p class="title">Berita Utama</p>
        		<div class="contentBerita">
        			<div class="beritaTitle">
	        			<div class="symbol col-md-1">
	        				<img src="<?php echo $url_rewrite;?>assets/img/judul.png">
	        			</div>
	        			<div class="tagline col-md-10">
		        			<p class="title">SBY Kenalkan Istana pada Jokowi SBY Kenalkan Istana pada Jokowi</p>
		        			<p class="date">Minggu, 19 Oktober 2014</p>
	        			</div>
                        <div class="clearfix"></div>
        			</div>

        			<img src="<?php echo$url_rewrite;?>public_assets/berita-foto/2.jpg" class="img-responsive">
        			<div class="imgCaption text-center">
        				SBY Kenalkan Istana pada Jokowi, Minggu (19/10) sore.<br>
        				(foto: presidenri.go.id)
        			</div>

        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        		</div>
        	</div>
        	<div class="col-md-4 contentRight">
        		<div class="presidenRI-box arsip">
                    <div class="boxHeader">
                        ARSIP
                    </div>
                    <img src="<?php echo $url_rewrite;?>assets/img/merahputih.png" class="img-responsive">

                    <div class="boxContent">
                        <div id="datepicker"></div>
                    </div>
                </div>

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
        	</div>
        </div>


        <?php include('template/javascript.php'); ?>
        <?php include('template/footer.php'); ?>
    </div>
    </div>
</body>
</html>