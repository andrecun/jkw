<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
	$thn=$_POST['thn'];
	$bln=$_POST['bln'];
	$tgl=$_POST['tgl'];
	$jam=$_POST['jam'];
	$mnt=$_POST['mnt'];
	$tgl=$_POST['tgl'];
	$judul_id=$_POST['judul_id'];
	$judul_en=$_POST['judul_en'];
	$keyword_id=$_POST['keyword_id'];
	$keyword_en=$_POST['keyword_en'];
	$cuplikan_id=$_POST['cuplikan_id'];
	$cuplikan_en=$_POST['cuplikan_en'];
	$isi_id=$_POST['isi_id'];
	$isi_en=$_POST['isi_en'];
	$status=$_POST['status'];

// topik /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_topik = "";
if ($_POST['submit_add_topik']) {
	
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','topik','$userku','$ip',now(),'add topik','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into topik (
								waktu,
								judul_id,
								judul_en,
								keyword_id,
								keyword_en,
								cuplikan_id,
								cuplikan_en,
								isi_id,
								isi_en,
								status
							) values (
								'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00',
								'".quotes($judul_id)."',
								'".quotes($judul_en)."',
								'".quotes($keyword_id)."',
								'".quotes($keyword_en)."',
								'".quotes($cuplikan_id)."',
								'".quotes($cuplikan_en)."',
								'".quotes($isi_id)."',
								'".quotes($isi_en)."',
								'$status'
							)";
		$result = mysql_query($sql) or die(mysql_error());
		
		$judul_id = ""; $keyword_id = ""; $cuplikan_id = ""; $isi_id = ""; $judul_en = ""; $keyword_en = ""; $cuplikan_en = ""; $isi_en = "";
		$verify_topik = "$bhs_tpk_success_add_topik";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=topik_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_topik']) {

		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','topik','$userku','$ip',now(),'edit topik','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		$cuplikan_id=nl2br($cuplikan_id);
		$cuplikan_id=addslashes($cuplikan_id);
		$cuplikan_en=str_replace("\r","<br>\r",$cuplikan_en);
		$isi_id=str_replace("\r","<br>\r",$isi_id);
		$isi_en=str_replace("\r","<br>\r",$isi_en);
*/
		$sql = "update topik set 
						waktu='".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00', 
						penulis='$userku', 
						keyword_id='".quotes($keyword_id)."', 
						keyword_en='".quotes($keyword_en)."', 
						cuplikan_id='".quotes($cuplikan_id)."', 
						cuplikan_en='".quotes($cuplikan_en)."', 
						judul_id='".quotes($judul_id)."', 
						judul_en='".quotes($judul_en)."', 
						isi_id='".quotes($isi_id)."', 
						isi_en='".quotes($isi_en)."', 
						status='$status' 
					where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_topik = "$bhs_tpk_success_edit_topik";
}
if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "topik_main")&&($_GET['status'] ==0)) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','topik','$userku','$ip',now(),'publish topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	tweeter($_GET['id'], 2);
	$sql = "update topik set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_GET['action'] == "status")&&($_GET['file'] == "topik_main")&&($_GET['status'] ==1)) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','topik','$userku','$ip',now(),'pending topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update topik set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "topik_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','topik','$userku','$ip',now(),'delete topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from topik where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = "delete from topik_link where topik_id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_GET['file'] == "topik_detail")&&($_GET['d'] == "del")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','topik','$userku','$ip',now(),'delete topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from topik_link where id='".$_GET['id_link']."' AND topik_id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

// topik /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_topik = "";
if ($_POST['submit_link_topik']) {
	
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','topik','$userku','$ip',now(),'add topik link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into topik_link (
								topik_id, 
								judul_link, 
								url_link, 
								ringkasan
							) values (
								'".quotes($_GET['id'])."', 
								'".quotes($_POST['judul_link'])."', 
								'".quotes($_POST['url_link'])."', 
								'".quotes($_POST['ringkasan'])."'
							)";
		
		$objconn->dbQuery($sql);
		$judul_link = ""; $url_link = ""; $ringkasan = "";
		$verify_topik_link = "Tambah Link Berhasil";
	//}
}

if ($_POST['edit_link_topik']) {

		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','topik','$userku','$ip',now(),'edit topik link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		$cuplikan_id=nl2br($cuplikan_id);
		$cuplikan_id=addslashes($cuplikan_id);
		$cuplikan_en=str_replace("\r","<br>\r",$cuplikan_en);
		$isi_id=str_replace("\r","<br>\r",$isi_id);
		$isi_en=str_replace("\r","<br>\r",$isi_en);
*/
		$sql = "update topik_link set 
								judul_link='".quotes($_POST['judul_link'])."', 
								url_link='".quotes($_POST['url_link'])."', 
								ringkasan='".quotes($_POST['ringkasan'])."' 
							where id='".$_POST['id_link']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_topik_link = "<strong>Perubahan Topik Link Terkait berhasil</strong>";
}

if ($_POST['submit_add_cat_topik']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','topik','$userku','$ip',now(),'add topik category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into topik_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_topik']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','topik','$userku','$ip',now(),'edit topik category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update topik_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_topik") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','topik','$userku','$ip',now(),'delete topik category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from topik_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>