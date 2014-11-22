<?php
setcookie("bhs",$_GET['bahasa'], time()+2592000);
echo "<meta http-equiv=refresh content='0;url=".$_SERVER['HTTP_REFERER']."' />";
?>