<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// news /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_news = "";
if ($_POST['submit_add_kliping']) {
	//if ($judul_id=="") { $verify_news = "$bhs_kli_title_empty"; }
	//elseif ($isi_id=="") { $verify_news = "$bhs_kli_content_empty"; }
	//elseif ($sumber=="") { $verify_news= "Sumber kosong"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','kliping','$userku','$ip',now(),'add news','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into kliping (
								waktu,
								judul,
								sumber,
                                                                                                            isi_id,
								url,
								status
							) values (
								'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00',
								'".quotes($_POST[judul])."',
								'".quotes($_POST[sumber])."',
                                                                                                            '".  addslashes($_POST[isi_id])."',  
								'".quotes($_POST[url])."',
								'".($levelku==1?$_POST[status]:0)."')
							";
		$result = mysql_query($sql) or die(mysql_error());
		
		$url = ""; $sumber = ""; $judul_id = ""; $cuplikan_id = ""; $isi_id = ""; $judul_en = ""; $cuplikan_en = "";  $isi_en = "";
		$verify_news = "$bhs_kli_success_add_news"; 
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=kliping_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_kliping']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','kliping','$userku','$ip',now(),'edit kliping','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update kliping set 
							waktu='".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00', 
							sumber='".quotes($_POST[sumber])."', 
                                                                                               isi_id='".quotes($_POST[isi_id])."', 
							judul='".quotes($_POST[judul])."', 
							url='".quotes($_POST[url])."', 
							status='".($levelku==1?$_POST[status]:0)."' 
						where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_kliping = "$bhs_kli_success_edit_kliping";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=kliping_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
}
if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "kliping_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','kliping','$userku','$ip',now(),'publish kliping','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update kliping set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "kliping_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','kliping','$userku','$ip',now(),'pending kliping','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update kliping set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "kliping_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','kliping','$userku','$ip',now(),'delete kliping','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from kliping where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if ($_POST['submit_add_cat_kliping']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','kliping','$userku','$ip',now(),'add kliping category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into kliping_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_kliping']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','kliping','$userku','$ip',now(),'edit kliping category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update kliping_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_kliping") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','kliping','$userku','$ip',now(),'delete kliping category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from kliping_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>