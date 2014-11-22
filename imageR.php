<?php
include("lib/config.php");
include("lib/DatabaseAccess.php");
include "pathvarto.php";
if($clsPath->isPathVarTo())
if($clsPath->isValidPath("^/([0-9])+(\.jpg)$"))
{
		$id = $clsPath->getByArray(0);
		$tempid = str_replace(".jpg","",$id);

$SQL="select ContentTypeR,FotoRingkasan from fokus where id='".$tempid."'";
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

$gambar=($row[FotoRingkasan]);
header("Content-Type: ".$row[ContentTypeR]);
header("Content-Length: ".strlen($row[FotoRingkasan]));

echo $gambar;
}
?>