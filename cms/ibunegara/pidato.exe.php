<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// pidato /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_pidato = "";
if ($_POST['submit_add_pidato']) {
	//if ($judul_id=="") { $verify_pidato = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_pidato = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add pidato','')";
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

	$sql = 'INSERT INTO pidato (tempat, 
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
								cuplikan_id,
								judul_en, 
								cuplikan_en,
								isi_id, 
								isi_en, 
								status, 
								bahasa
								) VALUES (\''.$_POST[tempat].'\', 
								 \''.$_POST[thn].'-'.$_POST[bln].'-'.$_POST[tgl].' 00:00:00\', ';
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
								 \''.addslashes($_POST[ringkasan_id]).'\', 
								 \''.addslashes($_POST[judul_en]).'\', 
								 \''.addslashes($_POST[ringkasan_en]).'\', 								 
								 \''.addslashes($_POST[isi_id]).'\', 
								 \''.addslashes($_POST[isi_en]).'\', 
								 \''.$_POST[status].'\',
								 \''.$_POST[english].'\');';
//		echo $sql."<br>";
		$result = mysql_query($sql) or die(mysql_error());
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_pidato = "Tambah pidato berhasil";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=pidato_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_pidato']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit pidato','')";
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


		$sql = "UPDATE pidato SET 
				tempat='".$_POST[tempat]."', 
				waktu='".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00', ";
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
				isi_id='".addslashes($_POST[isi_id])."',  
				isi_en='".addslashes($_POST[isi_en])."',  
				cuplikan_id='".addslashes($_POST[ringkasan_id])."',  
				cuplikan_en='".addslashes($_POST[ringkasan_en])."',  
				status='".$_POST[status]."',  
				bahasa='".$_POST[english]."'
				where id='".$_GET['id']."'";
//		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_pidato = "$bhs_pdt_success_edit_pidato";

}

if (($_GET['action'] == "status")&&($_GET['file'] == "pidato_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish pidato','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update pidato set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "pidato_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending pidato','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update pidato set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "pidato_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete pidato','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pidato where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_add_cat_pidato']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add pidato category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into pidato_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_pidato']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit pidato category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update pidato_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_pidato") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete pidato category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pidato_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>