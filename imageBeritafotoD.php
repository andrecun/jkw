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

$SQL="select FotoD, TypeD from beritafoto where id='".$tempid."'";
$result=$DB->query($SQL);
$row=$DB->fetch_array($result);

$gambar=($row[FotoD]);
header("Content-Type: ".$row[TypeD]);
header("Content-Length: ".strlen($gambar));

echo $gambar;
}
?>