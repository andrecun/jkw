<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/video/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/video_detail.php";
}else{
     include "view/video_index.php";
}

?>
