<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// pers /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_pers = "";
if ($_POST['submit_add_pers']) {
	//if ($kategori=="") { $verify_pers= "$bhs_prs_category_empty"; }
	//elseif (($judul_id=="") && ($judul_en=="")) { $verify_pers = "$bhs_prs_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_pers = "$bhs_prs_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','pers','$userku','$ip',now(),'add pers','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}

	$sql = "insert into pers( 
					penulis, 
					kategori, 
					tempat, 
					waktu, 
					waktu_log, 
					ContentType,
					Dokumen,
					judul_id, 
					judul_en, 
					isi_id, 
					isi_en, 
					status,
					english
					) values (
					'$_POST[penulis]', 
					'$_POST[kategori]', 
					'".quotes($_POST[tempat])."', 
					'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."', 
					NOW(),";
if(isset($Dokumen))
	$sql.= "
					'".$_FILES[Dokumen][type]."',
					$Dokumen,";
	else $sql.= " '','',";
	$sql.= "
					'".quotes($_POST[judul_id])."', 
					'".quotes($_POST[judul_en])."', 
					'".quotes($_POST[isi_id])."', 
					'".quotes($_POST[isi_en])."', 
					'$_POST[status]',
					'$_POST[english]')";

	$result = mysql_query($sql) or die(mysql_error());
		
		$verify_pers = "$bhs_prs_success_add_pers";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=pers_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_pers']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','pers','$userku','$ip',now(),'edit pers','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}

		$sql = "update pers set 
					kategori='$_POST[kategori]', 
					tempat='".quotes($_POST[tempat])."', 
					waktu='$_POST[thn]-$_POST[bln]-$_POST[tgl]', ";
		if(isset($Dokumen))
		$sql.= "
				ContentType='".$_FILES[Dokumen][type]."',
				Dokumen=".$Dokumen.", ";
				elseif($_POST[dokumen]==1)
					$sql.= "
							ContentType='',
							Dokumen= '', ";
				

		$sql.= "
					judul_id='".quotes($_POST[judul_id])."', 
					judul_en='".quotes($_POST[judul_en])."', 
					isi_id='".quotes($_POST[isi_id])."', 
					isi_en='".quotes($_POST[isi_en])."', 
					status='".($levelku==1?$_POST[status]:0)."',
					english='$_POST[english]'
					where id='".$_GET['id']."'";echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_pers = "$bhs_prs_success_edit_news";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=pers_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
}
if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "pers_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'publish pers','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update pers set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "pers_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'pending pers','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update pers set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "pers_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'delete pers','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pers where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_pers']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','pers','$userku','$ip',now(),'add pers category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into pers_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_pers']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','pers','$userku','$ip',now(),'edit pers category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update pers_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_pers") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'delete pers category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pers_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>