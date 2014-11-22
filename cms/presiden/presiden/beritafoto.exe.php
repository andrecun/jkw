<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php

// beritafoto //

if ($_POST['submit_add_beritafoto']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','beritafoto','$userku','$ip',now(),'upload beritafoto','')";
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
										'".quotes($_POST[deskripsi])."', 
										'".quotes($_POST[judul])."', 
										'".quotes($_POST[Ringkasan])."', 
										'".quotes($_POST[isi])."', 
										'".($levelku==1?$_POST[status]:0)."'
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
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','beritafoto','$userku','$ip',now(),'change beritafoto','')";
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
			elseif($_POST[fotoD]==1)
				$sql.= "
						`FotoD` = '', 
						`TypeD` = '', ";
		if(strlen($FotoR)>0)
			$sql.= "
					`FotoR` = $FotoR, 
					`TypeR` = '".$_FILES['FotoR'][type]."',";
			elseif($_POST[fotoR]==1)
			$sql.= "
					`FotoR` = '', 
					`TypeR` = '',";
			$sql.= "
					`deskripsi` = '".quotes($_POST[deskripsi])."', 
					`judul` = '".quotes($_POST[judul])."', 
					`Ringkasan` = '".quotes($_POST[Ringkasan])."', 
					`isi` = '".quotes($_POST[isi])."', 
					`status` = '".($levelku==1?$_POST[status]:0)."'
					where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=beritafoto_main';
		header("Location: $URL://$host$uri/$extra");
		exit;


}
if($levelku==1) {
if (($_GET['action'] == "delete")&&($_GET['file'] == "beritafoto_main")&&($levelku==1)) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','beritafoto','$userku','$ip',now(),'delete beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	unlink("../../presiden/beritafoto/".$_GET['beritafoto']);
	
	$sql = "delete from beritafoto where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "beritafoto_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'publish beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update beritafoto set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_GET['action'] == "status")&&($_GET['file'] == "beritafoto_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','pers','$userku','$ip',now(),'pending beritafoto','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update beritafoto set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}
?>