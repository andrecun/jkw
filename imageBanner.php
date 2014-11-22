<?php
include("lib/config.php");
include("lib/DatabaseAccess.php");
if( $_GET[id]=="")
$SQL="select ContentTypeD, FotoDetil from banner where status='1'";
else $SQL="select ContentTypeD, FotoDetil from banner where id=$_GET[id]";
$row=$objconn->dbQueryGetRow($SQL);

//echo stripslashes($row[FotoDetil]);
/*
echo "$SQL<br>\n";
echo $row[NamaGambar];
echo $row[ContentTypeR];
echo strlen(stripslashes($row[FotoRingkasan]));
echo "<br>";
echo $row[ContentTypeD];
echo strlen(stripslashes($row[FotoDetil]));
*/

$gambar=($row[FotoDetil]);
header("Content-Type: ".$row[ContentTypeD]);
header("Content-Length: ".strlen($gambar));

echo $gambar;

?>