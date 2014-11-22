<?php 
require_once  "lib/application.php";
if($clsPath->isValidPath("^/uu/peraturan-pemerintah/")) { 
          include "view/peraturan-pemerintah.php"; 
          exit;
     }
     else if($clsPath->isValidPath("^/uu/peraturan-presiden/")) { 
          include "view/peraturan-presiden.php"; 
          exit;
     }else if($clsPath->isValidPath("^/uu/keputusan-presiden/")) { 
          include "view/keputusan-presiden.php"; 
          exit;
     }else if($clsPath->isValidPath("^/uu/instruksi-presiden/")) { 
          include "view/instruksi-presiden.php"; 
          exit;
     }

if ($clsPath->isValidPath("^/uu/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")){
     include "view/uu.php";
}else{
     include "view/uu.php";
}

?>
