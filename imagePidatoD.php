<?php
include("lib/config.php");
include("lib/DatabaseAccess.php");
include "pathvarto.php";
if($clsPath->isPathVarTo())
if($clsPath->isValidPath("^/([0-9])+(\.jpg)$"))
{
		$id = $clsPath->getByArray(0);
		$tempid = str_replace(".jpg","",$id);

$SQL="select NamaGambar,ContentTypeR,ContentTypeD,FotoRingkasan,FotoDetil from pidato where id='".$tempid."'";
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
}
?>