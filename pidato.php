<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/pidato/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/pidato_detail.php";
}else{
     include "view/pidato_index.php";
}

?>
