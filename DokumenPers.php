<?php
include("lib/config.php");
include("lib/DatabaseAccess.php");
include "pathvarto.php";
if($clsPath->isPathVarTo())
if($clsPath->isValidPath("^/([0-9])+(\.pdf)$"))
{
		$id = $clsPath->getByArray(0);
		$tempid = str_replace(".pdf","",$id);

$SQL="select Dokumen,ContentType from pers where id='".$tempid."'";
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

$gambar=($row[Dokumen]);
header("Content-Type: ".$row[ContentType]);
header("Content-Length: ".strlen($gambar));

echo $gambar;
}
?>