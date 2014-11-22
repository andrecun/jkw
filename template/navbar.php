<!-- NAVBAR -->

<div class="navbar navbar-default navbar-static-top api-navbar" role="navigation">
    <div class="container presidenRI-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=$url_rewrite?>">Beranda</a></li>
                <?php $clsPath->addPathVarTo("statik/profil",true); ?>
                <li><a href="<?php echo $clsPath->getPathVarTo(); ?>">Profil</a></li>
                
                 <?php $clsPath->addPathVarTo("pidato",true); ?>
                <li><a href="<?php echo $clsPath->getPathVarTo(); ?>">Pidato</a></li>
                
                
                  <?php $clsPath->addPathVarTo("wawancara",true); ?>
                <li><a href="<?php echo $clsPath->getPathVarTo(); ?>">Wawancara</a></li>
                     <?php $clsPath->addPathVarTo("album",true); ?>
                <li><a href="<?php echo $clsPath->getPathVarTo(); ?>">Album Foto</a></li>
                
                <!--
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                -->
            </ul>
            <form class="navbar-form navbar-right presidenRI-search" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div><!--/.nav-collapse -->
    </div>
</div>