<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
function kx_sms($waktu)
{
list($day, $month, $year,$jam,$menit) = sscanf($waktu, "%d/%d/%d %d:%d");
if($jam<10)
	$jam="0$jam";
if($menit<10)
	$menit="0$menit";
if($month<10)
	$month="0$month";
if($day<10)
	$day="0$day";

$hasil="$year-$month-$day $jam:$menit:00";
//echo "$waktu $hasil<br>";
return $hasil;
}

// sms /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_sms = "";
if ($_POST['submit_add_sms']) {
	//if ($judul_id=="") { $verify_sms = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_sms = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','sms','$userku','$ip',now(),'add sms','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['grafik']['tmp_name'])) {
		$fp = fopen($_FILES['grafik']['tmp_name'], 'r');
		while (!feof($fp)) {
				$grafik .= fgets($fp, 4096);
			}
		fclose($fp);
		$grafik="0x".bin2hex($grafik);
		}
	if (is_uploaded_file($_FILES['dataSMS']['tmp_name'])) {
		$fp = fopen($_FILES['dataSMS']['tmp_name'], 'r');
		while (!feof($fp)) {
				$dataSMS .= fgets($fp, 4096);
			}
		fclose($fp);
		$dataSMS="0x".bin2hex($dataSMS);
		}

		$sql = 'INSERT INTO `sms` (`id`, 
										`tglAwal`, 
										`tglAkhir`, 
										`totalSMS`, 
										`Laporan`, 
										`image`, 
										`TypeIMG`, 
										`Data`, 
										`TypeData`, 
										`status`) VALUES (
										NULL, 
										\''.$_POST[thnawal].'-'.$_POST[blnawal].'-'.$_POST[tglawal].'\', 
										\''.$_POST[thnakhir].'-'.$_POST[blnakhir].'-'.$_POST[tglakhir].'\', 
										\''.$_POST[total].'\', 
										\''.$_POST[laporan].'\', ';
	if(isset($grafik))
		$sql.= "
										$grafik,
										'".$_FILES['grafik']['type']."', ";
		else $sql.= "'', '',";

	if(isset($dataSMS))
		$sql.= " 
										$dataSMS, 
										'".$_FILES['dataSMS']['type']."', ";
		else $sql.= "'', '',";
		$sql.= '
										\''.$_POST[status].'\');';
		$result = mysql_query($sql) or die(mysql_error());
		$sql= 'SELECT @last := LAST_INSERT_ID() as id;';
		$row = $objconn->dbQueryResult($sql);
	if (is_uploaded_file($_FILES['dataSMS']['tmp_name'])) {
		$dataExcell = new Spreadsheet_Excel_Reader();
		$dataExcell->setOutputEncoding('CP1251');
		$dataExcell->setRowColOffset(2);
		$dataExcell->read($_FILES['dataSMS']['tmp_name']);

		for ($i = 3; $i <= $dataExcell->sheets[0]['numRows']; $i++) {
			$k=0;
			for ($j = 2; $j <= 4; $j++) {
				$col[$k]=$dataExcell->sheets[0]['cells'][$i][$j];
				$k++;
			}
			$trans = get_html_translation_table(HTML_ENTITIES);
			$encoded = strtr($col[2], $trans);
			$sql = 'INSERT INTO `sms_data` (`sms_id`, 
										`waktu_sms`, 
										`pengirim`, 
										`isi`) VALUES (
										\''.$row[id].'\',
										\''.kx_sms($col[0]).'\', 
										\''.$col[1].'\', 
										\''.addslashes($encoded).'\');';
//echo kx_sms($col[0])."<br>";


			$result = mysql_query($sql) or die(mysql_error());
		}
	}			
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_sms = "Tambah Laporan sms berhasil";
	//}
}

if ($_POST['submit_edit_sms']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','sms','$userku','$ip',now(),'edit sms','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
	if (is_uploaded_file($_FILES['grafik']['tmp_name'])) {
		$fp = fopen($_FILES['grafik']['tmp_name'], 'r');
		while (!feof($fp)) {
				$grafik .= fgets($fp, 4096);
			}
		fclose($fp);
		$grafik="0x".bin2hex($grafik);
		}
	if (is_uploaded_file($_FILES['dataSMS']['tmp_name'])) {
		$fp = fopen($_FILES['dataSMS']['tmp_name'], 'r');
		while (!feof($fp)) {
				$dataSMS .= fgets($fp, 4096);
			}
		fclose($fp);
		$dataSMS="0x".bin2hex($dataSMS);
		}
		$sql = 'UPDATE `sms` SET
										`tglAwal`=\''.$_POST[thnawal].'-'.$_POST[blnawal].'-'.$_POST[tglawal].'\', 
										`tglAkhir`=\''.$_POST[thnakhir].'-'.$_POST[blnakhir].'-'.$_POST[tglakhir].'\', 
										`totalSMS`=\''.$_POST[total].'\', 
										`Laporan`=\''.$_POST[laporan].'\', ';
	if(isset($grafik))
			$sql.= '
										`image`= '.$grafik.', 
										`TypeIMG`=\''.$_FILES['grafik']['type'].'\',';
	if(isset($dataSMS))
			$sql.= '					 
										`Data`= '.$dataSMS.', 
										`TypeData`=\''.$_FILES['dataSMS']['type'].'\',';
			$sql.= '
										`status`=\''.$_POST[status].'\'
										where `id`= \''.$_GET[id].'\'';
	$result = mysql_query($sql) or die(mysql_error());

	if (is_uploaded_file($_FILES['dataSMS']['tmp_name'])) {
		$sql= 'DELETE FROM sms where sms_id=\'$_GET[id]\'';
		$row = $objconn->dbQueryResult($sql);
		$dataExcell = new Spreadsheet_Excel_Reader();
		$dataExcell->setOutputEncoding('CP1251');
		$dataExcell->setRowColOffset(2);
		$dataExcell->read($_FILES['dataSMS']['tmp_name']);

		for ($i = 3; $i <= $dataExcell->sheets[0]['numRows']; $i++) {
			$k=0;
			for ($j = 2; $j <= 4; $j++) {
				$col[$k]=$dataExcell->sheets[0]['cells'][$i][$j];
				$k++;
			}
			$trans = get_html_translation_table(HTML_ENTITIES);
			$encoded = strtr($col[2], $trans);
			$sql = 'INSERT INTO `sms_data` (`sms_id`, 
										`waktu_sms`, 
										`pengirim`, 
										`isi`) VALUES (
										\''.$_GET[id].'\',
										\''.kx_sms($col[0]).'\', 
										\''.$col[1].'\', 
										\''.addslashes($encoded).'\');';
//echo kx_sms($col[0])."<br>";


			$result = mysql_query($sql) or die(mysql_error());
		}
	}			
							
	$verify_sms = "$bhs_pdt_success_edit_sms";
}

if (($_GET['action'] == "status")&&($_GET['file'] == "sms_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','sms','$userku','$ip',now(),'publish sms','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update sms set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "sms_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','sms','$userku','$ip',now(),'pending sms','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update sms set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "sms_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','sms','$userku','$ip',now(),'delete sms','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from sms where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = "delete from sms_data where sms_id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_add_cat_sms']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','sms','$userku','$ip',now(),'add sms category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into sms_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_sms']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','sms','$userku','$ip',now(),'edit sms category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update sms_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_sms") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','sms','$userku','$ip',now(),'delete sms category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from sms_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>