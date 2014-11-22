<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// wawancara /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_wawancara = "";
if ($_POST['submit_add_wawancara']) {
	//if ($judul_id=="") { $verify_wawancara = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_wawancara = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','audio','$userku','$ip',now(),'add wawancara','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['FotoRingkasan']['tmp_name'])) {
		$fp = fopen($_FILES['FotoRingkasan']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoRingkasan .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoRingkasan="0x".bin2hex($FotoRingkasan);
		}
	if (is_uploaded_file($_FILES['FotoDetil']['tmp_name'])) {
		$fp = fopen($_FILES['FotoDetil']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoDetil .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoDetil="0x".bin2hex($FotoDetil);
		}
	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}

	$sql = 'INSERT INTO wawancara (tempat, 
								waktu, 
								NamaGambar, 
								ContentTypeR, 
								ContentTypeD, 
								FotoRingkasan, 
								FotoDetil, 
								deskripsi, 
								ContentTypeDokumen, 
								Dokumen, 
								TemaSiaran, 
								waktuLog, 
								alamatWMA, 
								alamatMP3, 
								alamatOGG, 
								judul_id, 
								judul_en, 
								cuplikan_id, 
								cuplikan_en, 
								isi_id, 
								isi_en, 
								status, 
								bahasa
								) VALUES (\''.$_POST[tempat].'\', 
								 \''.$thn.'-'.$bln.'-'.$tgl.' 00:00:00\', ';
	if($_FILES[FotoRingkasan][name]!='')
			$sql.= '
								 \''.$_FILES[FotoRingkasan][name].'\', 
								 \''.$_FILES[FotoRingkasan][type].'\', 
								 \''.$_FILES[FotoDetil][type].'\',';
			elseif($_FILES[FotoDetil][name]!='')
			$sql.= '
								 \''.$_FILES[FotoDetil][name].'\', 
								 \''.$_FILES[FotoRingkasan][type].'\', 
								 \''.$_FILES[FotoDetil][type].'\',';
			else $sql.= '\'\', \'\', \'\', ';
								 
	if(isset($FotoRingkasan))
		$sql.= "$FotoRingkasan, ";
		else $sql.= '\'\', ';
	if(isset($FotoDetil))
		$sql.= "$FotoDetil, ";
		else $sql.= '\'\', ';
							$sql.= '\''.$_POST[deskripsi].'\',
								 \''.$_FILES[Dokumen][type].'\', ';
	if(isset($Dokumen))
		$sql.= "$Dokumen, ";
		else $sql.= "'', ";
							$sql.= '\''.$_POST[TemaSiaran].'\', 
								 \'NOW()\', 
								 \''.$_POST[alamatWMA].'\', 
								 \''.$_POST[alamatMP3].'\', 
								 \''.$_POST[alamatOGG].'\', 
								 \''.addslashes($_POST[judul_id]).'\', 
								 \''.addslashes($_POST[judul_en]).'\', 
								 \''.addslashes($_POST[ringkasan_id]).'\', 
								 \''.addslashes($_POST[ringkasan_en]).'\', 
								 \''.addslashes($_POST[isi_id]).'\', 
								 \''.addslashes($_POST[isi_en]).'\', 
								 \''.$_POST[status].'\',
								 \''.$_POST[english].'\');';
//		echo $sql."<br>";
		$result = mysql_query($sql) or die(mysql_error());
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_wawancara = "Tambah wawancara berhasil";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=wawancara_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_wawancara']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','audio','$userku','$ip',now(),'edit wawancara','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['FotoRingkasan']['tmp_name'])) {
		$fp = fopen($_FILES['FotoRingkasan']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoRingkasan .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoRingkasan="0x".bin2hex($FotoRingkasan);
		}
	if (is_uploaded_file($_FILES['FotoDetil']['tmp_name'])) {
		$fp = fopen($_FILES['FotoDetil']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoDetil .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoDetil="0x".bin2hex($FotoDetil);
		}
	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}


		$sql = "UPDATE wawancara SET 
				tempat='".$_POST[tempat]."', 
				waktu='$thn-$bln-$tgl 00:00:00', ";
		if(isset($FotoDetil)) {
			$sql.="NamaGambar='".$_FILES[FotoDetil][name]."',  
				ContentTypeD='".$_FILES[FotoDetil][type]."',  
				FotoDetil=".$FotoDetil.",  ";
			}
		if(isset($FotoRingkasan)) {
			$sql.="ContentTypeR='".$_FILES[FotoRingkasan][type]."',  
				FotoRingkasan=".$FotoRingkasan.",  ";
			}	
			$sql.="
				deskripsi='".$_POST[deskripsi]."',  ";
		if(isset($Dokumen)) {
			$sql.="
				ContentTypeDokumen='".$_FILES[Dokumen][type]."',
				Dokumen=".$Dokumen.", ";
				}
			$sql.="
				TemaSiaran='".$_POST[TemaSiaran]."',  
				alamatWMA='".$_POST[alamatWMA]."',  
				alamatMP3='".$_POST[alamatMP3]."',  
				alamatOGG='".$_POST[alamatOGG]."',  
				judul_id='".addslashes($_POST[judul_id])."',  
				judul_en='".addslashes($_POST[judul_en])."',  
				cuplikan_id='".addslashes($_POST[ringkasan_id])."',  
				cuplikan_en='".addslashes($_POST[ringkasan_en])."',  
				isi_id='".addslashes($_POST[isi_id])."',  
				isi_en='".addslashes($_POST[isi_en])."',  
				status='".$_POST[status]."',  
				bahasa='".$_POST[english]."'
				where id='".$_GET['id']."'";
//		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_wawancara = "$bhs_pdt_success_edit_wawancara";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=wawancara_main';
		header("Location: $URL://$host$uri/$extra");
		exit;

}

if (($_GET['action'] == "status")&&($_GET['file'] == "wawancara_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','audio','$userku','$ip',now(),'publish wawancara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update wawancara set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "wawancara_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','audio','$userku','$ip',now(),'pending wawancara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update wawancara set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "wawancara_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','audio','$userku','$ip',now(),'delete wawancara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from wawancara where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_add_cat_wawancara']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','audio','$userku','$ip',now(),'add wawancara category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into wawancara_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_wawancara']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','audio','$userku','$ip',now(),'edit wawancara category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update wawancara_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_wawancara") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','audio','$userku','$ip',now(),'delete wawancara category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from wawancara_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>