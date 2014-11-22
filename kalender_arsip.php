<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
#This code provided by:
#Andreas Hadiyono (andre.hadiyono@gmail.com)
#Gunadarma University

date_default_timezone_set("Asia/Jakarta");
$time = time();
$today = date('j', $time);
$year = date('Y', $time);
$month = date('n', $time);

if($clsPath->getByArray(0)=="uu"){
$tahun_link=$clsPath->getByArray(2);
$bln_link=$clsPath->getByArray(3);
$hari_link=$clsPath->getByArray(4);
}
else{
$tahun_link=$clsPath->getByArray(1);
$bln_link=$clsPath->getByArray(2);
$hari_link=$clsPath->getByArray(3);
     
}
if($tahun_link!=""&&is_numeric($tahun_link)==1)
     $tgl=$tahun_link;
if($bln_link!=""&&is_numeric($bln_link)==1)
     $tgl="$tahun_link/".$bln_link;
if($hari_link!=""&&is_numeric($hari_link)==1)
     $tgl="$tahun_link/$bln_link/".$hari_link;


if ($tgl == "") {
     $tgl = "$year/$month";
     $status = 0;
} else {
     if ($cek == $tgl) {
          $status = 0;
     } else
          $status = 1;
}
$tgl_sistem=  str_replace("/", "-", $tgl);
?>
