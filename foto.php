<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/foto/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/foto_detail.php";
}else{
     include "view/foto_index.php";
}

?>
