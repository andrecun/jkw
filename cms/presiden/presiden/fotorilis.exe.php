<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// fotorilis //

if ($_POST['submit_upload_fotorilis']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','fotorilis','$userku','$ip',now(),'upload fotorilis','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		
		//$set = "update fotorilis set status='0'";
		//$res = mysql_query($set) or die(mysql_error());

	if (is_uploaded_file($_FILES['FotoDetil']['tmp_name'])) {
		$fp = fopen($_FILES['FotoDetil']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoDetil .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoDetil="0x".bin2hex($FotoDetil);
		}
	if (is_uploaded_file($_FILES['Foto150']['tmp_name'])) {
		$fp = fopen($_FILES['Foto150']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Foto150 .= fgets($fp, 4096);
			}
		fclose($fp);
		$Foto150="0x".bin2hex($Foto150);
		}
	if (is_uploaded_file($_FILES['Foto300']['tmp_name'])) {
		$fp = fopen($_FILES['Foto300']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Foto300 .= fgets($fp, 4096);
			}
		fclose($fp);
		$Foto300="0x".bin2hex($Foto300);
		}

		$sql = "INSERT INTO `fotorilis` ( `waktu` ,  
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
	if(isset($FotoDetil))
		$sql .= "
											'".$_FILES[FotoDetil][type]."', 
											$FotoDetil,";
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
		$extra = '?file=fotorilis_main';
		header("Location: $URL://$host$uri/$extra");
		exit;


}

if ($_POST['submit_edit_fotorilis']!='') {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','fotorilis','$userku','$ip',now(),'change fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************

	if (is_uploaded_file($_FILES['FotoDetil']['tmp_name'])) {
		$fp = fopen($_FILES['FotoDetil']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoDetil .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoDetil="0x".bin2hex($FotoDetil);
		}
	if (is_uploaded_file($_FILES['Foto150']['tmp_name'])) {
		$fp = fopen($_FILES['Foto150']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Foto150 .= fgets($fp, 4096);
			}
		fclose($fp);
		$Foto150="0x".bin2hex($Foto150);
		}
	if (is_uploaded_file($_FILES['Foto300']['tmp_name'])) {
		$fp = fopen($_FILES['Foto300']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Foto300 .= fgets($fp, 4096);
			}
		fclose($fp);
		$Foto300="0x".bin2hex($Foto300);
		}
	$sql = "update fotorilis set `waktu` = '$_POST[thn]-$_POST[bln]-$_POST[tgl]',  
									`deskripsi` = '$_POST[deskripsi]',  
									`judul` = '$_POST[judul]',  
									`isi` = '$_POST[isi]', ";
	if(isset($Foto150))
		$sql .= "
									`Type150` = '".$_FILES[Foto150][type]."',  
									`Foto150` = $Foto150,  ";
	if(isset($Foto300))
		$sql .= "									
									`Type300` = '".$_FILES[Foto300][type]."',  
									`Foto300` = $Foto300,  ";
	if(isset($FotoDetil))
		$sql .= "									
									`ContentTypeD` = '".$_FILES[FotoDetil][type]."',  
									`FotoDetil` = $FotoDetil,  ";
	$sql .= "
									`status` = '".($levelku==1?$_POST[status]:0)."'
									where id='".$_POST['id']."'";
/*	
*/
//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());
}
if($levelku==1) {
if (($_GET['action'] == "delete")&&($_GET['file'] == "fotorilis_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','fotorilis','$userku','$ip',now(),'delete fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from fotorilis where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "fotorilis_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'publish fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update fotorilis set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_GET['action'] == "status")&&($_GET['file'] == "fotorilis_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'pending fotorilis','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update fotorilis set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}
?>