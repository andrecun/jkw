<?php
session_start();
$referer = $_SERVER['HTTP_REFERER'];
echo "<meta http-equiv=refresh content='0;url=$referer'>";
?>