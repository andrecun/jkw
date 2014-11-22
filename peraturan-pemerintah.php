<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/peraturan-pemerintah/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/peraturan-pemerintah.php";
}else{
     include "view/peraturan-pemerintah.php";
}

?>
