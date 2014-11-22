<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/pernakpernik/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/pernak_detail.php";
}else{
     include "view/pernak_index.php";
}

?>
