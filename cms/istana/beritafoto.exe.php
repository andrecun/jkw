<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// beritafoto //

if ($_POST['submit_upload_beritafoto']) {
	if ($uploadfile=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'upload beritafoto','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$uploadfile = uploadfile("../../presiden/beritafoto/","uploadfile","beritafoto");
		if($uploadfile == "0") { $uploadfile_name = ""; } else { $uploadfile_name = $uploadfile; }
		
		//$set = "update beritafoto set status='0'";
		//$res = mysql_query($set) or die(mysql_error());

		$sql = "insert into beritafoto (pic,waktu,cuplikan,isi,status) values ('$uploadfile_name','$_POST[thn]-$_POST[bln]-$_POST[tgl] $_POST[jam]:$_POST[mnt]:$_POST[dtk]','$_POST[cuplikan]','$_POST[isi]','1')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_change_beritafoto") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'change beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	//$set = "update beritafoto set status='0'";
	//$res = mysql_query($set) or die(mysql_error());
	
	$sql = "update beritafoto set status='1' where pic='".$_GET['beritafoto']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_GET['mode'] == "submit_del_beritafoto") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	unlink("../../presiden/beritafoto/".$_GET['beritafoto']);
	
	$sql = "delete from beritafoto where pic='".$_GET['beritafoto']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

?>