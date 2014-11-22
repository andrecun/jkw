<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/kliping/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/kliping.php";
}else{
     include "view/kliping.php";
}

?>
