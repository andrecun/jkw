<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/album/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/album_detail.php";
}else{
     include "view/album_index.php";
}

?>
