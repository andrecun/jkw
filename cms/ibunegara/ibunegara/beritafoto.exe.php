<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// beritafoto //

if ($_POST['submit_add_beritafoto']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'upload beritafoto','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
	if (is_uploaded_file($_FILES['FotoR']['tmp_name'])) {
		$fp = fopen($_FILES['FotoR']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoR .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoR="0x".bin2hex($FotoR);
		}
	if (is_uploaded_file($_FILES['FotoD']['tmp_name'])) {
		$fp = fopen($_FILES['FotoD']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoD .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoD="0x".bin2hex($FotoD);
		}


		$sql = "INSERT INTO `beritafoto` (
										`waktu` ,
										`FotoD` , 
										`TypeD` , 
										`FotoR` , 
										`TypeR` ,
										`deskripsi` , 
										`judul` , 
										`Ringkasan` , 
										`isi` , 
										`status` ) 
							VALUES (
					'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."',";
	if(isset($FotoD))
		$sql.= "
										$FotoD,
										'".$_FILES['FotoD']['type']."', ";
		else $sql.= "'', '',";
	if(isset($FotoR))
		$sql.= " 
										$FotoR, 
										'".$_FILES['FotoR']['type']."', ";
		else $sql.= "'', '',";
		$sql.= "
										'$_POST[deskripsi]', 
										'$_POST[judul]', 
										'$_POST[Ringkasan]', 
										'$_POST[isi]', 
										'$_POST[status]'
									);";
//		echo $sql;									
		$result = mysql_query($sql) or die(mysql_error());
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=beritafoto_main';
		header("Location: $URL://$host$uri/$extra");
		exit;

}

if ($_POST[submit_edit_beritafoto]) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'change beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	//$set = "update beritafoto set status='0'";
	//$res = mysql_query($set) or die(mysql_error());
	

	if (is_uploaded_file($_FILES['FotoR']['tmp_name'])) {
		$fp = fopen($_FILES['FotoR']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoR .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoR="0x".bin2hex($FotoR);
		}
	if (is_uploaded_file($_FILES['FotoD']['tmp_name'])) {
		$fp = fopen($_FILES['FotoD']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoD .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoD="0x".bin2hex($FotoD);
		}		
	$sql = "UPDATE beritafoto SET
					`waktu` = '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."',";
		if(strlen($FotoD)>0)
			$sql.= "
					`FotoD` = $FotoD, 
					`TypeD` = '".$_FILES['FotoD'][type]."', ";
		if(strlen($FotoR)>0)
			$sql.= "
					`FotoR` = $FotoR, 
					`TypeR` = '".$_FILES['FotoR'][type]."',";
			$sql.= "
					`deskripsi` = '$_POST[deskripsi]', 
					`judul` = '$_POST[judul]', 
					`Ringkasan` = '$_POST[Ringkasan]', 
					`isi` = '$_POST[isi]', 
					`status` = '$_POST[status]'
					where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=beritafoto_main';
		header("Location: $URL://$host$uri/$extra");
		exit;


}

if (($_GET['action'] == "delete")&&($_GET['file'] == "beritafoto_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from beritafoto where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

?>