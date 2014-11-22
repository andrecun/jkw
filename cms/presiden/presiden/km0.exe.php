<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// km0 /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_km0 = "";
if ($_POST['submit_add_km0']) {
	//if ($judul_id=="") { $verify_km0 = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_km0 = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','km0','$userku','$ip',now(),'add km0','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "INSERT INTO km0 (waktu, 
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
		$extra = '?file=km0_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
		
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_km0 = "Tambah km0 berhasil";
	//}
}

if ($_POST['submit_edit_km0']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','km0','$userku','$ip',now(),'edit km0','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update km0 set waktu = '$_POST[thn]-$_POST[bln]-$_POST[tgl]', 
											judul = '".addslashes($_POST[judul])."', 
											penulis = '$_POST[penulis]', 
											media = '$_POST[media]', 
											ringkasan = '$_POST[ringkasan]', 
											isi ='".addslashes($_POST[isi])."', 
											status = '".($levelku==1?$_POST[status]:0)."' where id='".$_POST['id']."'";
//		echo $sql."<br>";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_km0 = "$bhs_pdt_success_edit_km0";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=km0_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
}

if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "km0_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','km0','$userku','$ip',now(),'publish km0','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update km0 set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "km0_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','km0','$userku','$ip',now(),'pending km0','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update km0 set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "km0_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','km0','$userku','$ip',now(),'delete km0','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from km0 where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_km0']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','km0','$userku','$ip',now(),'add km0 category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into km0_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_km0']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','km0','$userku','$ip',now(),'edit km0 category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update km0_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_km0") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','km0','$userku','$ip',now(),'delete km0 category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from km0_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>