<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/wawancara/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/wawancara_detail.php";
}else{
     include "view/wawancara_index.php";
}

?>
