<?php

$tanggal_status = 0;
$tanggal_pasti = "";
$bulan_pasti = "";
$tahun_pasti = "";
$link_pasti = "";

function prosess_tanggal($tanggal, $par, $days, $status, $kategori, $DB) {

     $temp = explode("/", $tanggal);
     $tahun = $temp[0];
     $int_tahun_naik = $tahun;
     $int_tahun_min = $tahun;
     $u_bulan = $temp[1];
     $bulan = $temp[1];
     $panjang = strlen($bulan);
     if ($panjang == 1) {
          $temp = $bulan;
          $bulan = "";
          $bulan = "0$temp";
     }
     $tgl = $temp[2];
     $int_bulan_min = abs($bulan) - 1;
     $int_bulan_naik = abs($bulan) + 1;
     if ($int_bulan_min == 0) {
          $int_bulan_min = 12;
          $int_tahun_min = abs($tahun) - 1;
          if (strlen($int_bulan_min) == 1)
               $int_bulan_min = "0" . $int_bulan_min;
     }
     if ($int_bulan_naik > 12) {
          $int_bulan_naik = 1;
          $int_tahun_naik = abs($tahun) + 1;
          if (strlen($int_bulan_naik) == 1)
               $int_bulan_naik = "0" . $int_bulan_naik;
     }
     if (strlen($int_bulan_naik) == 1)
          $int_bulan_naik = "0" . $int_bulan_naik;
     if (strlen($int_bulan_min) == 1)
          $int_bulan_min = "0" . $int_bulan_min;
     //$par_mundur="?$par=$int_tahun_min-$int_bulan_min";
     //$par_maju="?$par=$int_tahun_naik-$int_bulan_naik";
     $par_mundur = "$par/$int_tahun_min/$int_bulan_min";
     $par_maju = "$par/$int_tahun_naik/$int_bulan_naik";

     $link = array('&laquo;' => $par_mundur, '&raquo;' => $par_maju);

     $time = time();
     $today = date('j', $time);
     $y = date('Y', $time);
     $m = date('m', $time);
     $temp = "$y-$m";
     $pem = "$tahun-$bulan";

     if ($status == 0 or $temp == $pem) {
          $days = array($today => array(NULL, 1 => 'today', '<span>' . $today . '</span>'));
          $link = array('&laquo;' => $par_mundur);
          $tes = 2;
     } else {
          $days = NULL;
     }
     switch ($kategori) {
          case 1: //fokus//berita
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from fokus where waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 2://topik
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from topik where waktu like '$tahun-$bulan%' and status='1'";
               break;
         case 3://agenda
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from km0 where waktu like '$tahun-$bulan%' and status='1'";
               break;
         case 4://beritafoto
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from beritafoto where waktu like '$tahun-$bulan%' and status='1'";
               break;
         case 5://video
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from video where waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 6://kliping
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from kliping where waktu like '$tahun-$bulan%' and status='1'";
               break; 
          case 7://pidato
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from pidato where waktu like '$tahun-$bulan%' and status='1'";
               break; 
          case 8://wawancara
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from wawancara where waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 9://uu
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from uu where waktu like '$tahun-$bulan%' and status='1'";
               echo $msg;
               break;
          case 9://peraturan pemerintah
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from uu where kategori='1' and waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 10://peraturan presiden
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from uu where kategori='2' and waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 11://keputsan presiden
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from uu where kategori='3' and waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 12://instruksi presiden
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from uu where kategori='4' and waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 13://album
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from gallery_album where waktu like '$tahun-$bulan%' and status='1'";
               break;
          case 14://sudut istana
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from serbaserbi where waktu like '$tahun-$bulan%' and status='1'";
               break;
           case 15://pernakpernik
               $msg = "select DISTINCT DATE_FORMAT(waktu, '%d')as hari from istana.pernakpernik where waktu like '$tahun-$bulan%' and status='1'";
               break;
          
          default:
               break;
     }

     $hari = array();
     //$qry = mysql_query($msg);
     $data = $DB->_fetch_object($msg,1);
     if(count($data)>0)
     foreach ($data as $key => $row) {


          $temp_hari = $row->hari;
          $c = $temp_hari[0];
          if ($c == "0")
               $temp_hari = $temp_hari[1];
          $url = "$par/$tahun/$bulan/$row->hari";
          if ($temp_hari == $today)
               $array2 = array(0 => $url, 1 => 'linked-day', 2 => '<span style="color: red; font-weight: bold; text-decoration: underline;">' . $temp_hari . '</span>');
          else
               $array2 = array(0 => $url, 1 => 'linked-day', 2 => '<span>' . $temp_hari . '</span>');
          $days[$temp_hari] = $array2;
     }
     
     if ($int_tahun_min < 2014) {
          if ($tes == 2)
               $link = NULL;
          else
               $link = array('&raquo;' => $par_maju);
     }
     echo generate_calendar($tahun, $bulan, $days, 3, NULL, NULL, $link);
}

?>
