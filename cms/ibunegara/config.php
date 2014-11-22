<?php
$server		= "localhost";
$db_user	= "root";
$db_pass        = 'root123root';
$database	= "ibunegara";
$URL="http";
$connection = mysql_connect("$server", "$db_user", "$db_pass") or die(mysql_error());
$db = mysql_select_db("$database", $connection) or die(mysql_error());

$domain	= "http://www.presidensby.com/ibunegara";

$superuser = "ekodox";
?>
