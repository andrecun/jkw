<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
#This code provided by:
#Andreas Hadiyono (andre.hadiyono@gmail.com)
#Gunadarma University

function cekTahunUU($DB,$tahun,$kategori){
     $result=$DB->query("select tahun from uu where tahun='$tahun' and kategori='$kategori' limit 1");
     $data=$DB->fetch_array($result);
     if(count($data)>0)
          return 1;
     else
          return 0;
     
}
function showDataUU($DB,$tahun_min,$tahun_max,$kategori,$alamat,$width){
     $range=$tahun_max-$tahun_min+1;
     $jarak_tabel=round($width/$range);
     $total_range=0;
     for($i=$tahun_min;$i<=$tahun_max;$i++){
          
          $hasil=cekTahunUU($DB, $i, $kategori);
          $alamat_uu="$alamat/$i/";
          if($hasil==1)
               echo "<td style='width:$jarak_tabel%; text-align:center'><a href='$alamat_uu'>$i</a></td>";
          else
               echo "<td style='width:$jarak_tabel% ; text-align:center'>&nbsp;</td>";
          $total_range+=$jarak_tabel;
          if($i==($tahun_max-1))
               $jarak_tabel=$width-$total_range;
     }
}
?>
