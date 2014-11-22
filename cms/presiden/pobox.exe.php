<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// pobox /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_pobox = "";
if ($_POST['submit_add_pobox']) {
	//if ($judul_id=="") { $verify_pobox = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_pobox = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','pobox','$userku','$ip',now(),'add pobox','')";
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

		$sql = "INSERT INTO `pobox` (
						`waktu` , 
						`tglAwal` , 
						`tglAkhir` , 
						`surat` , 
						`laporan` , 
						`grafik` , 
						`TypeGrafik` , 
						`status` ) 
				VALUES (
						NOW(), 
						'".$_POST[thnawal]."-".$_POST[blnawal]."-".$_POST[tglawal]."', 
						'".$_POST[thnakhir]."-".$_POST[blnakhir]."-".$_POST[tglakhir]."', 
						'0', 
						'".$_POST[laporan]."', ";
	if(isset($grafik))
		$sql.= "
										$grafik,
										'".$_FILES['grafik']['type']."', ";
		else $sql.= "'', '',";
			$sql.= "
						'$_POST[status]');";
		$result = mysql_query($sql) or die(mysql_error());
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_pobox = "Tambah pobox berhasil";
	//}
}

if ($_POST['submit_edit_pobox']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','pobox','$userku','$ip',now(),'edit pobox','')";
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

		$sql = "UPDATE `pobox` SET
						`tglAwal` = '".$_POST[thnawal].'-'.$_POST[blnawal].'-'.$_POST[tglawal]."', 
						`tglAkhir` = '".$_POST[thnakhir].'-'.$_POST[blnakhir].'-'.$_POST[tglakhir]."' , 
						`laporan` = '".$_POST[laporan]."' , ";
	if(isset($grafik))
			$sql.= '
										`grafik`= '.$grafik.', 
										`TypeGrafik`=\''.$_FILES['grafik']['type'].'\',';
			$sql.= "
						`status` = '".$_POST[status]."'
						where `id`= '".$_GET[id]."'
						;"; 

		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_pobox = "$bhs_pdt_success_edit_pobox";
}

if (($_GET['action'] == "status")&&($_GET['file'] == "pobox_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pobox','$userku','$ip',now(),'publish pobox','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update pobox set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "pobox_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pobox','$userku','$ip',now(),'pending pobox','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update pobox set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "pobox_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pobox','$userku','$ip',now(),'delete pobox','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pobox where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_add_cat_pobox']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','pobox','$userku','$ip',now(),'add pobox category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into pobox_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_pobox']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','pobox','$userku','$ip',now(),'edit pobox category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update pobox_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_pobox") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pobox','$userku','$ip',now(),'delete pobox category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pobox_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>