<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// download /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_download = "";
if ($_POST['submit_add_download']) {
	//if (($judul_id=="") && ($judul_en=="")) { $verify_download = "$bhs_dwn_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_download = "$bhs_dwn_content_empty"; }
	//else {
		// begin log ************************************************************
		//$logsql = "insert into log (session,username,ip,logtime,act,object)
		//			values ('$session','$userku','$ip',now(),'add download','')";
		//$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into download (waktu,sumber,penulis,judul_id,judul_en,isi_id,isi_en,status) values ('$thn-$bln-$tgl $jam:$mnt:$dtk','$sumber','$userku','$judul_id','$judul_en','$isi_id','$isi_en','$status')";
		$result = mysql_query($sql) or die(mysql_error());
		
		//$judul = ""; $isi = "";
		//$verify_download = "$bhs_dwn_success_add_download";
	//}
}

if ($_POST['submit_edit_download']) {
	if (($judul_id=="") && ($judul_en=="")) { $verify_download = "$bhs_dwn_title_empty"; }
	elseif (($isi_id=="") && ($isi_en=="")) { $verify_download = "$bhs_dwn_content_empty"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object)
					values ('$session','$userku','$ip',now(),'edit download','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update download set waktu='$thn-$bln-$tgl $jam:$mnt:$dtk', sumber='$sumber', penulis='$userku', judul_id='$judul_id', judul_en='$judul_en', isi_id='$isi_id', isi_en='$isi_en', status='$status' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_download = "$bhs_dwn_success_edit_download";
	}
}

if ($_GET['mode'] == "submit_publish_download") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update download set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_pending_download") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update download set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_del_download") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from download where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_upload_download_file']) {
	if ($uploadfile=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'upload download file','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$uploadfile = uploadfile("../download/upload/","uploadfile",$pid);
		if($uploadfile == "0") { $uploadfile_name = ""; } else { $uploadfile_name = $uploadfile; }
		
		$sql = "insert into download_file (pid,file) values ('$pid','$uploadfile_name')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_download_file") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete download file','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	unlink("../download/upload/".$_GET['upload']);
		
	$sql = "delete from download_file where id='".$_GET['idfile']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

?>