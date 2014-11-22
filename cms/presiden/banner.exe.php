<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// fotorilis //

if ($_POST['submit_upload_banner']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','banner','$userku','$ip',now(),'upload banner','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		
		//$set = "update fotorilis set status='0'";
		//$res = mysql_query($set) or die(mysql_error());

	if (is_uploaded_file($_FILES['banner']['tmp_name'])) {
		$fp = fopen($_FILES['banner']['tmp_name'], 'r');
		while (!feof($fp)) {
				$banner .= fgets($fp, 4096);
			}
		fclose($fp);
		$banner="0x".bin2hex($banner);
		}
	if ($_POST[status]==1)
	{
	$sql = "update banner set status='0'";
	$result = mysql_query($sql) or die(mysql_error());

	}
		$sql = "INSERT INTO `banner` ( `waktu` ,  
											`penulis` ,  
											`ContentTypeD` ,  
											`FotoDetil` ,  
											`deskripsi` ,  
											`Type150` ,  
											`Foto150` ,  
											`Type300` ,  
											`Foto300` ,  
											`judul` ,  
											`isi` , 
											`status` )
				VALUES ( '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."', 
											'$_POST[penulis]', ";
	if(isset($banner))
		$sql .= "
											'".$_FILES[banner][type]."', 
											$banner,";
			else $sql .= "'','',";
		$sql .= "
											'$_POST[deskripsi]', ";
	if(isset($Foto150))
		$sql .= "
											'".$_FILES[Foto150][type]."', 
											$Foto150, ";
			else $sql .=  "'','',";
	if(isset($Foto300))
		$sql .= "
											'".$_FILES[Foto300][type]."', 
											$Foto300, ";
			else $sql .= "'','',";
		$sql .= "
											'$_POST[judul]', 
											'$_POST[isi]', 
											'$_POST[status]'
											);";
//		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=banner_main';
		header("Location: $URL://$host$uri/$extra");
		exit;


}


if (($_GET['action'] == "delete")&&($_GET['file'] == "banner_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','banner','$userku','$ip',now(),'delete banner','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from banner where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "banner_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','banner','$userku','$ip',now(),'publish banner','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	$sql = "update banner set status='0'";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = "update banner set status='1' where id=$_GET[id]";
	$result = mysql_query($sql) or die(mysql_error());
}

?>