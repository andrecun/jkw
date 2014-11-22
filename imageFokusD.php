<?php
include "lib/config.php";
include "lib/mysql_db.php";
include "lib/utilityCode.php";
include "lib/pathvarto.php";

$DB=new mysql_db();
$UTILITY=new utilityCode();

if($clsPath->isPathVarTo())
if($clsPath->isValidPath("^/([0-9])+(\.jpg)$"))
{
		$id = $clsPath->getByArray(0);
		$tempid = str_replace(".jpg","",$id);

$SQL="select ContentTypeD,FotoDetil from fokus where id='".$tempid."'";
$result=$DB->query($SQL);
$row=$DB->fetch_array($result);

$gambar=($row[FotoDetil]);
header("Content-Type: ".$row[ContentTypeD]);
header("Content-Length: ".strlen($gambar));

echo $gambar;
}
?>