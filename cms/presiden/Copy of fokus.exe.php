<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// fokus /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_fokus = "";
if ($_POST['submit_add_fokus']) {
	//if ($kategori=="") { $verify_fokus= "$bhs_fks_category_empty"; }
	//elseif (($judul_id=="") && ($judul_en=="")) { $verify_fokus = "$bhs_fks_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_fokus = "$bhs_fks_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add fokus','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		if (is_uploaded_file($_FILES['GambarFokus']['tmp_name'])) {
		   echo "File ". $_FILES['GambarFokus']['name'] ." uploaded successfully.\n";
		   echo "Displaying contents\n";
		} else {
		   echo "Possible file upload attack: ";
		   echo "filename '". $_FILES['GambarFokus']['tmp_name'] . "'.";
		}
*/
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
//		echo $GambarFokus;
		$sql = "insert into fokus 
					(waktu,
					subjudul_id,
					subjudul_en,
					judul_id,
					judul_en,
					cuplikan_id,
					cuplikan_en, 
					english,";
	if(isset($FotoRingkasan))
		$sql.= " 
					NamaGambar, 
					ContentTypeR, 
					ContentTypeD, ";
	if(isset($FotoRingkasan))
		$sql.="FotoRingkasan, ";
	if(isset($FotoDetil))
		$sql.="FotoDetil, ";
		$sql.="deskripsi, 
					isi_id,
					isi_en,
					link,
					status) values (
					'$thn-$bln-$tgl $jam:$mnt:$dtk',
					'".addslashes($_POST[subjudul_id])."',
					'".addslashes($_POST[subjudul_en])."',
					'".addslashes($judul_id)."',
					'".addslashes($judul_en)."',
					'".addslashes($cuplikan_id)."',
					'".addslashes($cuplikan_en)."',
					$_POST[english],";
	if(isset($FotoRingkasan))
		$sql.= "
					'".$_FILES['FotoRingkasan']['name']."',
					'".$_FILES['FotoRingkasan']['type']."',
					'".$_FILES['FotoDetil']['type']."', ";
	if(isset($FotoRingkasan))
		$sql.= $FotoRingkasan.", ";
	if(isset($FotoDetil))
		$sql.= $FotoDetil." ,";
		$sql.= "'".$_POST['deskripsi']."',
					'".addslashes($isi_id)."',
					'".addslashes($isi_en)."',
					'".addslashes($link)."',
					'".addslashes($status)."')";
		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$judul_id = ""; $judul_en = ""; $cuplikan_id = ""; $cuplikan_en = ""; $isi_id = ""; $isi_en = ""; $link = ""; 
		$verify_fokus = "$bhs_fks_success_add_fokus";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=fokus_main';
		header("Location: http://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_fokus']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit fokus','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

//	echo $_FILES['FotoRingkasan']['tmp_name']."<br>";
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
		

		$sql = "update fokus set waktu='$thn-$bln-$tgl $jam:$mnt:$dtk', 
					subjudul_id ='".addslashes($_POST[subjudul_id])."',
					subjudul_en ='".addslashes($_POST[subjudul_en])."', 
					english= '".addslashes($_POST[english])."' , 
					judul_id='".addslashes($judul_id)."', 
					judul_en='".addslashes($judul_en)."', ";
		if(isset($_FILES['FotoRingkasan']['name']))
				$sql.= "NamaGambar ='".$_FILES['FotoRingkasan']['name']."', ";
		if((isset($FotoRingkasan)))
				$sql.="FotoRingkasan = $FotoRingkasan, 			
					ContentTypeR = '".$_FILES['FotoRingkasan'][type]."', ";
		if(isset($FotoDetil))
				$sql.="FotoDetil = $FotoDetil, 
					ContentTypeD ='".$_FILES['FotoDetil'][type]."',";
				$sql.= "deskripsi ='".$_POST[deskripsi]."', 
					isi_id='".addslashes($isi_id)."', 
					cuplikan_id='".addslashes($cuplikan_id)."',
					cuplikan_en='".addslashes($cuplikan_en)."',
					isi_en='".addslashes($isi_en)."', 
					status='".addslashes($status)."' 
					where id='".$_GET['id']."'";
//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		$FotoRingkasan='';
		$FotoDetil='';
		$verify_fokus = "$bhs_fks_success_edit_fokus";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=fokus_main';
		header("Location: http://$host$uri/$extra");
		exit;
	}

if ($_GET['mode'] == "submit_publish_fokus") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish fokus','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update fokus set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_pending_fokus") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending fokus','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update fokus set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "fokus_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete fokus','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from fokus where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

// fokus /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_fokus = "";
if ($_POST['submit_link_fokus']) {
	
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add fokus link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into fokus_link ( fokus_id, judul_link, url_link, ringkasan) values ( '".$_GET['id']."', '".$_POST['judul_link']."', '".$_POST['url_link']."', '".$_POST['ringkasan']."')";
		
		$objconn->dbQuery($sql);
		$judul_link = ""; $url_link = ""; $ringkasan = "";
		$verify_fokus_link = "Tambah Link Berhasil";
	//}
}

if ($_POST['edit_link_fokus']) {

		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit fokus link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		$cuplikan_id=nl2br($cuplikan_id);
		$cuplikan_id=addslashes($cuplikan_id);
		$cuplikan_en=str_replace("\r","<br>\r",$cuplikan_en);
		$isi_id=str_replace("\r","<br>\r",$isi_id);
		$isi_en=str_replace("\r","<br>\r",$isi_en);
*/
		$sql = "update fokus_link set judul_link='".$_POST['judul_link']."', url_link='".$_POST['url_link']."', ringkasan='".$_POST['ringkasan']."' where id='".$_POST['id_link']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_fokus_link = "<strong>Perubahan fokus Link Terkait berhasil</strong>";
}

if ($_POST['submit_add_cat_fokus']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add fokus category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into fokus_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_fokus']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit fokus category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update fokus_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_fokus") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete fokus category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from fokus_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>