<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// mutiara /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_mutiara = "";
if ($_POST['submit_add_mutiara']) {
	//if ($judul=="") { $verify_mutiara = "$bhs_pdt_title_empty"; }
	//elseif ($_POST[mutiara]=="") { $verify_mutiara = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add mutiara','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "INSERT INTO mutiara (waktu, 
											waktuLog, 
											tempat, 
											event, 
											mutiara, 
											status) VALUES (
											'$_POST[thn]-$_POST[bln]-$_POST[tgl]', 
											NOW(), 
											'$_POST[tempat]', 
											'$_POST[event]', 
											'".addslashes($_POST[mutiara])."', 
											'".($levelku==1?$_POST[status]:0)."');";
echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

		$_POST[tempat] = ""; $judul = ""; $subjudul = ""; $_POST[mutiara] = ""; $judul = ""; $subjudul = ""; $_POST[mutiara] = "";
		$verify_mutiara = "Tambah mutiara berhasil";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=mutiara_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_mutiara']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit mutiara','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update mutiara set waktu = '$_POST[thn]-$_POST[bln]-$_POST[tgl]', 
											tempat = '$_POST[tempat]', 
											event = '$_POST[event]', 
											mutiara = '".addslashes($_POST[mutiara])."', 
											status = '".($levelku==1?$_POST[status]:0)."' where id='".$_POST['id']."'";
//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_mutiara = "$bhs_pdt_success_edit_mutiara";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=mutiara_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	}

if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "mutiara_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish mutiara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update mutiara set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "mutiara_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending mutiara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update mutiara set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "mutiara_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete mutiara','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from mutiara where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_mutiara']) {
	if ($kategori=="") { }
	elseif ($kategori=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add mutiara category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into mutiara_cat (kategori,kategori) values ('$kategori','$kategori')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_mutiara']) {
	if ($kategori=="") { }
	elseif ($kategori=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit mutiara category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update mutiara_cat set kategori='$kategori',kategori='$kategori' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_mutiara") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete mutiara category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from mutiara_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>