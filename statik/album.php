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
        		<p class="title">Kabinet Kerja</p>
        		<div class="contentBerita">

        			

                    <div class="row" style="margin: 0;">
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">
                                <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">Nama Album</a>
                                <p class="text-muted">100 photos</p>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">
                                <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">Nama Album</a>
                                <p class="text-muted">100 photos</p>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">
                                <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">Nama Album</a>
                                <p class="text-muted">100 photos</p>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">
                                <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">Nama Album</a>
                                <p class="text-muted">100 photos</p>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <div class="presidenRI-album">
                            <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">
                                <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg">
                            </a>
                            <div class="caption_album">
                                <a href="<?php echo $url_rewrite;?>index.php/statik/view_album/">Nama Album</a>
                                <p class="text-muted">100 photos</p>
                            </div>
                            </div>
                        </div>
                    </div>


        		</div>
        	</div>
        	 <?php
                include "view/right_menu.php";
                ?>
        </div>


        <?php include('template/javascript.php'); ?>
        <?php include('template/footer.php'); ?>
    </div>
    </div>
</body>
</html>
