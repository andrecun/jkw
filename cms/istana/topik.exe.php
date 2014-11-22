<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// topik /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_topik = "";
if ($_POST['submit_add_topik']) {
	//if ($kategori=="") { $verify_topik= "$bhs_tpk_category_empty"; }
	//elseif (($judul_id=="") && ($judul_en=="")) { $verify_topik = "$bhs_tpk_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_topik = "$bhs_tpk_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add topik','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into topik (waktu,judul_id,judul_en,keyword_id,keyword_en,cuplikan_id,cuplikan_en,isi_id,isi_en,status) values ('$thn-$bln-$tgl $jam:$mnt:$dtk','$judul_id','$judul_en','$keyword_id','$keyword_en','$cuplikan_id','$cuplikan_en','$isi_id','$isi_en','$status')";
		$result = mysql_query($sql) or die(mysql_error());
		
		$judul_id = ""; $keyword_id = ""; $cuplikan_id = ""; $isi_id = ""; $judul_en = ""; $keyword_en = ""; $cuplikan_en = ""; $isi_en = "";
		$verify_topik = "$bhs_tpk_success_add_topik";
	//}
}

if ($_POST['submit_edit_topik']) {
	if ($_POST['kategori']=="") { $verify_topik= "$bhs_tpk_category_empty"; }
	elseif (($_POST['judul_id']=="") && ($_POST['judul_en']=="")) { $verify_topik = "$bhs_tpk_title_empty"; }
	elseif (($_POST['isi_id']=="") && ($$_POST['isi_en']=="")) { $verify_topik = "$bhs_tpk_content_empty"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit topik','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update topik set waktu='$thn-$bln-$tgl $jam:$mnt:$dtk', sumber='$sumber', penulis='$userku', kategori='$kategori', judul_id='$judul_id', judul_en='$judul_en', isi_id='$isi_id', isi_en='$isi_en', status='$status' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_topik = "$bhs_tpk_success_edit_topik";
	}
}

if ($_GET['mode'] == "submit_publish_topik") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update topik set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_pending_topik") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update topik set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_del_topik") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete topik','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from topik where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_add_cat_topik']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add topik category','')";
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
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit topik category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update topik_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_topik") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete topik category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from topik_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>