<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// news /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_news = "";
if ($_POST['submit_add_aktual']) {
	//if ($judul_id=="") { $verify_news = "$bhs_kli_title_empty"; }
	//elseif ($isi_id=="") { $verify_news = "$bhs_kli_content_empty"; }
	//elseif ($sumber=="") { $verify_news= "Sumber kosong"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','aktual','$userku','$ip',now(),'add news','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into aktual (waktu,judul,sumber,url,status) values ('".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00','$_POST[judul]','$_POST[sumber]','$_POST[url]','".($levelku==1?$_POST[status]:0)."')";
		$result = mysql_query($sql) or die(mysql_error());
		
		$url = ""; $sumber = ""; $judul_id = ""; $cuplikan_id = ""; $isi_id = ""; $judul_en = ""; $cuplikan_en = "";  $isi_en = "";
		$verify_news = "$bhs_kli_success_add_news"; 
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=aktual_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_aktual']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','aktual','$userku','$ip',now(),'edit aktual','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update aktual set waktu='".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00', sumber='$_POST[sumber]', judul='$_POST[judul]', url='$_POST[url]', status='".($levelku==1?$_POST[status]:0)."' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_aktual = "$bhs_kli_success_edit_aktual";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=aktual_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
}
if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "aktual_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','aktual','$userku','$ip',now(),'publish aktual','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update aktual set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "aktual_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','aktual','$userku','$ip',now(),'pending aktual','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update aktual set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "aktual_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','aktual','$userku','$ip',now(),'delete aktual','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from aktual where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_aktual']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','aktual','$userku','$ip',now(),'add aktual category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into aktual_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_aktual']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','aktual','$userku','$ip',now(),'edit aktual category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update aktual_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_aktual") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','aktual','$userku','$ip',now(),'delete aktual category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from aktual_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>