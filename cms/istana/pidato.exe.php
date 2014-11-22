<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// news /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_news = "";
if ($_POST['submit_add_pidato']) {
	//if ($judul_id=="") { $verify_news = "$bhs_pdt_title_empty"; }
	//elseif ($isi_id=="") { $verify_news = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'add news','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into pidato (tempat,waktu,judul_id,judul_en,subjudul_id,subjudul_en,isi_id,isi_en,status) values ('$tempat','$thn-$bln-$tgl $jam:$mnt:$dtk','$judul_id','$judul_en','$subjudul_id','$subjudul_en','$isi_id','$isi_en','$status')";
		$result = mysql_query($sql) or die(mysql_error());
		
		$tempat = ""; $judul_id = ""; $subjudul_id = ""; $isi_id = ""; $judul_en = ""; $subjudul_en = ""; $isi_en = "";
		$verify_news = "Tambah pidato berhasil";
	//}
}

if ($_POST['submit_edit_news']) {
	if ($kategori=="") { $verify_news= "$bhs_pdt_category_empty"; }
	elseif (($judul_id=="") && ($judul_en=="")) { $verify_news = "$bhs_pdt_title_empty"; }
	elseif (($isi_id=="") && ($isi_en=="")) { $verify_news = "$bhs_pdt_content_empty"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit news','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update pidato set waktu='$thn-$bln-$tgl $jam:$mnt:$dtk', sumber='$sumber', penulis='$userku', kategori='$kategori', judul_id='$judul_id', judul_en='$judul_en', isi_id='$isi_id', isi_en='$isi_en', status='$status' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_news = "$bhs_pdt_success_edit_news";
	}
}
if($levelku == 1 ) {
if ($_GET['mode'] == "submit_publish_news") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish news','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update pidato set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_pending_news") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending news','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update pidato set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_del_news") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete news','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from pidato where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}
if ($_POST['submit_add_cat_news']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add news category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into news_cat (kategori_id,kategori_en) values ('$kategori_id','$kategori_en')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_news']) {
	if ($kategori_id=="") { }
	elseif ($kategori_en=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit news category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update news_cat set kategori_id='$kategori_id',kategori_en='$kategori_en' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_news") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete news category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from news_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}


?>