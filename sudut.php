<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/sudutistana/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){

     include "view/sudut_detail.php";
}else{
     include "view/sudut_index.php";
}

?>
