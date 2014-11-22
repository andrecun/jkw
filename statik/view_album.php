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

                    

                    <div id="links">
                        <a href="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" title="Judul Foto" data-gallery>
                            <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" style="height: 150px; width: 32%;" class="presidenRI-gallery">
                        </a>
                        <a href="<?php echo $url_rewrite;?>public_assets/berita-foto/2.jpg" title="Judul Foto" data-gallery>
                            <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/2.jpg" style="height: 150px; width: 32%;" class="presidenRI-gallery">
                        </a>
                        <a href="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" title="Judul Foto" data-gallery>
                            <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" style="height: 150px; width: 32%;" class="presidenRI-gallery">
                        </a>
                        <a href="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" title="Judul Foto" data-gallery>
                            <img src="<?php echo $url_rewrite;?>public_assets/berita-foto/1.jpg" style="height: 150px; width: 32%;" class="presidenRI-gallery">
                        </a>
                    </div>


                </div>
            </div>
             <?php
                include "view/right_menu.php";
                ?>
        </div>

        <?php include('template/javascript.php'); ?>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev"><span class="glyphicon glyphicon-chevron-left" style="font-size:22px; top:-5px;"></span></a>
    <a class="next"><span class="glyphicon glyphicon-chevron-right" style="font-size:22px; top:-5px;"></span></a>
    <a class="close">x</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php include('template/footer.php'); ?>
    </div>
    </div>
</body>
</html>
