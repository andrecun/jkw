<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/agenda/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/agenda_detail.php";
}else{
     include "view/agenda_index.php";
}

?>
