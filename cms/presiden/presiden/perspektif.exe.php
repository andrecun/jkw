<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// perspektif /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_perspektif = "";
if ($_POST['submit_add_perspektif']) {
	//if ($judul_id=="") { $verify_perspektif = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_perspektif = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','perspektif','$userku','$ip',now(),'add perspektif','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "INSERT INTO perspektif (waktu, 
											waktuLog, 
											judul, 
											penulis, 
											media, 
											ringkasan, 
											isi, 
											status) VALUES (
											'$_POST[thn]-$_POST[bln]-$_POST[tgl]', 
											NOW(), 
											'".addslashes($_POST[judul])."', 
											'".addslashes($_POST[penulis])."', 
											'".addslashes($_POST[media])."', 
											'".addslashes($_POST[ringkasan])."', 
											'".addslashes($_POST[isi])."', 
											'".($levelku==1?$_POST[status]:0)."');";
//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());


		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=perspektif_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
		
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_perspektif = "Tambah perspektif berhasil";
	//}
}

if ($_POST['submit_edit_perspektif']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','perspektif','$userku','$ip',now(),'edit perspektif','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update perspektif set waktu = '$_POST[thn]-$_POST[bln]-$_POST[tgl]', 
											judul = '".addslashes($_POST[judul])."', 
											penulis = '$_POST[penulis]', 
											media = '$_POST[media]', 
											ringkasan = '$_POST[ringkasan]', 
											isi ='".addslashes($_POST[isi])."', 
											status = '".($levelku==1?$_POST[status]:0)."' where id='".$_POST['id']."'";
//		echo $sql."<br>";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_perspektif = "$bhs_pdt_success_edit_perspektif";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=perspektif_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
}

if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "perspektif_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','perspektif','$userku','$ip',now(),'publish perspektif','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update perspektif set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "perspektif_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','perspektif','$userku','$ip',now(),'pending perspektif','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update perspektif set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "perspektif_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','perspektif','$userku','$ip',now(),'delete perspektif','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from perspektif where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_perspektif']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','perspektif','$userku','$ip',now(),'add perspektif category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into perspektif_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_perspektif']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','perspektif','$userku','$ip',now(),'edit perspektif category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update perspektif_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_perspektif") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','perspektif','$userku','$ip',now(),'delete perspektif category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from perspektif_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>