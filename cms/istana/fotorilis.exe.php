<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// fotorilis //

if ($_POST['submit_upload_fotorilis']) {
	if ($uploadfile=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'upload fotorilis','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$uploadfile = uploadfile("../../presiden/fotorilis/","uploadfile","fotorilis");
		if($uploadfile == "0") { $uploadfile_name = ""; } else { $uploadfile_name = $uploadfile; }
		
		//$set = "update fotorilis set status='0'";
		//$res = mysql_query($set) or die(mysql_error());

		$sql = "insert into fotorilis (pic,waktu,cuplikan,isi,status) values ('$uploadfile_name','$_POST[thn]-$_POST[bln]-$_POST[tgl] $_POST[jam]:$_POST[mnt]:$_POST[dtk]','$_POST[cuplikan]','$_POST[isi]','1')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_change_fotorilis") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'change fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	//$set = "update fotorilis set status='0'";
	//$res = mysql_query($set) or die(mysql_error());
	
	$sql = "update fotorilis set status='1' where pic='".$_GET['fotorilis']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_del_fotorilis") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	unlink("../../presiden/fotorilis/".$_GET['fotorilis']);
	
	$sql = "delete from fotorilis where pic='".$_GET['fotorilis']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

?>