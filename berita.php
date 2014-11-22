<?php 
require_once  "lib/application.php";
if ($clsPath->isValidPath("^/berita/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/berita_detail.php";
}else{
     include "view/berita_index.php";
}

?>
