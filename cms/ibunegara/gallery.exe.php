<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// gallery /////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST['submit_add_gallery']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add gallery album','$album')";
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
		$sql = "INSERT INTO `gallery_album` (
									`album` , 
									`waktu` , 
									`FotoR` , 
									`TypeR` , 
									`deskripsi` , 
									`status` ) 
					VALUES (
									 '$_POST[album]',
									 '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."',";
	if(strlen($FotoR)>0)
		$sql.= "					 $FotoR,
									 '".$_FILES[FotoR][type]."',";
		else $sql.= "'', '',";
		$sql.= "
									 '$_POST[deskripsi]',
									 '".($levelku==1?$_POST[status]:0)."');";
//		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=gallery_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
		
}

if ($_POST['submit_edit_gallery']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'mengubah gallery album','$album')";
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
		$sql = "UPDATE `gallery_album` SET
									`album` = '$_POST[album]', 
									`waktu` = '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."', ";
	if(strlen($FotoR)>0)
		$sql.= "					 `FotoR` = $FotoR,
									 `TypeR` = '".$_FILES[FotoR][type]."',";
		elseif($_POST[fotoR]==1)
		$sql.= "					 `FotoR` = '',
									 `TypeR` = '',";
		$sql.= "
									`deskripsi` ='$_POST[deskripsi]' , 
									`status` = '".($levelku==1?$_POST[status]:0)."' 
									where id='".$_POST['id']."'";
		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=gallery_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
		
}

if ( $_POST['submit_upload_gallery'] && (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) ) {
	if ($_GET[id]!=""){
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'upload gallery pic','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['FotoD']['tmp_name'])) {
		$fp = fopen($_FILES['FotoD']['tmp_name'], 'r');
		while (!feof($fp)) {
				$FotoD .= fgets($fp, 4096);
			}
		fclose($fp);
		$FotoD="0x".bin2hex($FotoD);
		}
		$sql = "INSERT INTO `gallery_pics` (
									`id_album` , 
									`waktu` , 
									`waktuLog` , 
									`FotoD` , 
									`TypeD` , 
									`deskripsi` , 
									`pengisi` , 
									`ringkasan` ) 
					VALUES (
									 '$_POST[id]',
									 '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]."',
									 NOW(),";
	if(strlen($FotoD)>0)
		$sql.= "					 $FotoD,
									 '".$_FILES[FotoD][type]."',";
		else $sql.= "'', '',";
		$sql.= "
									 '$_POST[deskripsi]',
									 '$_POST[penulis]',
									 '$_POST[ringkasan]');";
//		echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

	}
}
if($levelku==1) {
if (($_GET['action'] == "delete")&&($_GET['file'] == "gallery_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete gallery album','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from gallery_album where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = "delete from gallery_pics where id_album='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
if (($_POST['action'] == "hapus")&&($_GET['file'] == "gallery_detail")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'delete gallery album','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from gallery_pics where id='".$_POST['gambar']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "gallery_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'publish gallery','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update gallery_album set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "gallery_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending gallery','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update gallery_album set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}
?>