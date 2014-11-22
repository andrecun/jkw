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

$SQL="select ContentTypeR,FotoRingkasan from fokus where id='".$tempid."'";

$result=$DB->query($SQL);
$row=$DB->fetch_array($result);


$gambar=($row[FotoRingkasan]);
header("Content-Type: ".$row[ContentTypeR]);
header("Content-Length: ".strlen($row[FotoRingkasan]));
echo $gambar;
}
?>