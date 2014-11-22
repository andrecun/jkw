<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/topik/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/topik_detail.php";
}else{
     include "view/topik_index.php";
}

?>
