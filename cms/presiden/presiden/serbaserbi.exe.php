<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// serbaserbi /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_serbaserbi = "";
if ($_POST['submit_add_serbaserbi']) {
	//if ($kategori=="") { $verify_serbaserbi= "$bhs_ss_category_empty"; }
	//elseif (($judul_id=="") && ($judul_en=="")) { $verify_serbaserbi = "$bhs_ss_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_serbaserbi = "$bhs_ss_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','serbaserbi','$userku','$ip',now(),'add serbaserbi','')";
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
		$sql = "insert into serbaserbi 
					(waktu,
					penulis,
					subjudul_id,
					subjudul_en,
					judul_id,
					judul_en,
					cuplikan_id,
					cuplikan_en, 
					english,";
	if(isset($FotoRingkasan))
		$sql.="ContentTypeR, FotoRingkasan, ";
	if(isset($FotoDetil))
		$sql.="ContentTypeD, FotoDetil, ";
		$sql.="deskripsi, 
					isi_id,
					isi_en,
					status) values (
					'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." ".$_POST[jam].":".$_POST[mnt].":".$_POST[dtk]."',
					'".$_POST[penulis]."',
					'".addslashes($_POST[subjudul_id])."',
					'".addslashes($_POST[subjudul_en])."',
					'".addslashes($_POST[judul_id])."',
					'".addslashes($_POST[judul_en])."',
					'".addslashes($_POST[cuplikan_id])."',
					'".addslashes($_POST[cuplikan_en])."',
					$_POST[english],";
	if(isset($FotoRingkasan))
		$sql.= "'".$_FILES['FotoRingkasan']['type']."', ".$FotoRingkasan.", ";
	if(isset($FotoDetil))
		$sql.= "'".$_FILES['FotoDetil']['type']."', ".$FotoDetil." ,";
		$sql.= "'".$_POST['deskripsi']."',
					'".addslashes($_POST[isi_id])."',
					'".addslashes($_POST[isi_en])."',
					'".$_POST[status]."')";
		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$judul_id = ""; $judul_en = ""; $cuplikan_id = ""; $cuplikan_en = ""; $isi_id = ""; $isi_en = ""; $link = ""; 
		$verify_serbaserbi = "$bhs_ss_success_add_serbaserbi";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=serbaserbi_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_serbaserbi']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','serbaserbi','$userku','$ip',now(),'edit serbaserbi','')";
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
		

		$sql = "update serbaserbi set waktu='".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." ".$_POST[jam].":".$_POST[mnt].":".$_POST[dtk]."', 
					subjudul_id ='".addslashes($_POST[subjudul_id])."',
					subjudul_en ='".addslashes($_POST[subjudul_en])."', 
					english= '".addslashes($_POST[english])."' , 
					judul_id='".addslashes($_POST[judul_id])."', 
					judul_en='".addslashes($_POST[judul_en])."', ";
		if((isset($FotoRingkasan)))
				$sql.="FotoRingkasan = $FotoRingkasan, 			
					ContentTypeR = '".$_FILES['FotoRingkasan'][type]."', ";
				elseif($_POST[fotoR]==1)
					$sql.="FotoRingkasan = '', 			
						ContentTypeR = '', ";
				
		if(isset($FotoDetil))
				$sql.="FotoDetil = $FotoDetil, 
					ContentTypeD ='".$_FILES['FotoDetil'][type]."',";
				elseif($_POST[fotoD]==1)
					$sql.="FotoDetil = '', 
						ContentTypeD ='',";
				$sql.= "deskripsi ='".$_POST[deskripsi]."', 
					isi_id='".addslashes($_POST[isi_id])."', 
					cuplikan_id='".addslashes($_POST[cuplikan_id])."',
					cuplikan_en='".addslashes($_POST[cuplikan_en])."',
					isi_en='".addslashes($_POST[isi_en])."', 
					status='".($levelku==1?$_POST[status]:0)."' 
					where id='".$_GET['id']."'";
//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		$FotoRingkasan='';
		$FotoDetil='';
		$verify_serbaserbi = "$bhs_ss_success_edit_serbaserbi";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=serbaserbi_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	}

if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "serbaserbi_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','serbaserbi','$userku','$ip',now(),'publish serbaserbi','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update serbaserbi set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "serbaserbi_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','serbaserbi','$userku','$ip',now(),'pending serbaserbi','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update serbaserbi set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "serbaserbi_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','serbaserbi','$userku','$ip',now(),'delete serbaserbi','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from serbaserbi where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_GET['file'] == "serbaserbi_detail")&&($_GET['d'] == "del")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','serbaserbi','$userku','$ip',now(),'delete serbaserbi','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from serbaserbi_link where id='".$_GET['id_link']."' AND serbaserbi_id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}
// serbaserbi /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_serbaserbi = "";
if ($_POST['submit_link_serbaserbi']) {
	
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','serbaserbi','$userku','$ip',now(),'add serbaserbi link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into serbaserbi_link ( serbaserbi_id, judul_link, url_link, ringkasan) values ( '".$_GET['id']."', '".$_POST['judul_link']."', '".$_POST['url_link']."', '".$_POST['ringkasan']."')";
		
		$objconn->dbQuery($sql);
		$judul_link = ""; $url_link = ""; $ringkasan = "";
		$verify_serbaserbi_link = "Tambah Link Berhasil";
	//}
}

if ($_POST['edit_link_serbaserbi']) {

		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','serbaserbi','$userku','$ip',now(),'edit serbaserbi link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		$cuplikan_id=nl2br($cuplikan_id);
		$cuplikan_id=addslashes($cuplikan_id);
		$cuplikan_en=str_replace("\r","<br>\r",$cuplikan_en);
		$isi_id=str_replace("\r","<br>\r",$isi_id);
		$isi_en=str_replace("\r","<br>\r",$isi_en);
*/
		$sql = "update serbaserbi_link set judul_link='".$_POST['judul_link']."', url_link='".$_POST['url_link']."', ringkasan='".$_POST['ringkasan']."' where id='".$_POST['id_link']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_serbaserbi_link = "<strong>Perubahan serbaserbi Link Terkait berhasil</strong>";
}

if ($_POST['submit_add_cat_serbaserbi']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','serbaserbi','$userku','$ip',now(),'add serbaserbi category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into serbaserbi_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_serbaserbi']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','serbaserbi','$userku','$ip',now(),'edit serbaserbi category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update serbaserbi_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_serbaserbi") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','serbaserbi','$userku','$ip',now(),'delete serbaserbi category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from serbaserbi_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>