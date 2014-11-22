<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// download /////////////////////////////////////////////////////////////////////////////////////////////////


$verify_download = "";
if ($_POST['submit_add_uu']) {
	//if (($judul_id=="") && ($judul_en=="")) { $verify_download = "$bhs_dwn_title_empty"; }
	//elseif (($isi_id=="") && ($isi_en=="")) { $verify_download = "$bhs_dwn_content_empty"; }
	//else {
		// begin log ************************************************************
		//$logsql = "insert into log (session,module,username,ip,logtime,act,object)
		//			values ('$session','uu','$userku','$ip',now(),'add download','')";
		//$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}

		$sql = 'INSERT INTO uu (kategori,
									  penulis,
									  nomor,
									  tahun,
									  tentang,
									  ringkasan,									  
									  tempat,
									  waktu,
									  Dokumen,
									  TypeD,
									  status) VALUES (
										\''.$_POST[kategori].'\',
										\''.$_POST[penulis].'\',
										\''.$_POST[nomor].'\',
										\''.$_POST[tahun].'\',
										\''.$_POST[tentang].'\',
										\''.$_POST[ringkasan].'\',										
										\''.$_POST[tempat].'\', 
										\''.$thn.'-'.$bln.'-'.$tgl.' 00:00:00\', ';
	if(isset($Dokumen))
		$sql.= "$Dokumen, '".$_FILES[Dokumen][type]."', ";
		else $sql.= "'', '', ";
								$sql.= '\''.($levelku==1?$_POST[status]:0).'\')';
		$result = mysql_query($sql) or die(mysql_error());
	
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=uu_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
		
		//$judul = ""; $isi = "";
		//$verify_download = "$bhs_dwn_success_add_download";
	//}
}

if ($_POST['submit_edit_uu']) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object)
				values ('$session','uu','$userku','$ip',now(),'edit download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************

	if (is_uploaded_file($_FILES['Dokumen']['tmp_name'])) {
		$fp = fopen($_FILES['Dokumen']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Dokumen .= fgets($fp, 4096);
			}
		fclose($fp);
		$Dokumen="0x".bin2hex($Dokumen);
		}


		$sql = "UPDATE uu SET 
					kategori = '".$_POST[kategori]."', 
					nomor    = '".$_POST[nomor]."', 
					tahun    = '".$_POST[tahun]."', 
					tentang  = '".$_POST[tentang]."', 
					ringkasan  = '".$_POST[ringkasan]."', 
					tempat   = '".$_POST[tempat]."', 
					waktu    = '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." 00:00:00', ";
			if(isset($Dokumen)) {
				$sql.="
					Dokumen = ".$Dokumen.", TypeD = '".$_FILES[Dokumen][type]."', ";
				}elseif($_POST[dokumen]==1)
				$sql.="
					Dokumen = '', TypeD = '', ";
				

				$sql.="
					status = '".($levelku==1?$_POST[status]:0)."' 
					where id='".$_GET['id']."'";

//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_download = "$bhs_dwn_success_edit_download";
				$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=uu_main';
		header("Location: $URL://$host$uri/$extra");
		exit;

}


if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "uu_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','uu','$userku','$ip',now(),'publish download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update uu set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "uu_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','uu','$userku','$ip',now(),'pending download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update uu set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "uu_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','uu','$userku','$ip',now(),'delete download','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from uu where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "uu_main")) {
	if ($uploadfile=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','uu','$userku','$ip',now(),'upload download file','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		$sql = "delete from uu where id='".$_GET['id']."'";
		$result = mysql_query($sql) or die(mysql_error());

	}
}

?>