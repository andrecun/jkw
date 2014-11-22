<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// buku /////////////////////////////////////////////////////////////////////////////////////////////////
$verify_buku = "";
if ($_POST['submit_add_buku']) {
	//if ($judul=="") { $verify_buku = "$bhs_pdt_title_empty"; }
	//elseif ($_POST[buku]=="") { $verify_buku = "$bhs_pdt_content_empty"; }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','buku','$userku','$ip',now(),'add buku','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
            
                    if (is_uploaded_file($_FILES['Cover']['tmp_name'])) {
		$fp = fopen($_FILES['Cover']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Cover .= fgets($fp, 4096);
			}
		fclose($fp);
		$Cover="0x".bin2hex($Cover);
		}
            
		$sql = "INSERT INTO buku (waktu, 
											waktuLog, 
											judul_id, 
											cuplikan_id, 
                                                                                                                                    isi_id,";
                      if(isset($Cover))
		$sql.="ContentTypeC, Cover, ";                                                                                                              
											$sql.="status) VALUES (
											'".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." ".$_POST[jam].":".$_POST[mnt].":".$_POST[dtk]."',
											NOW(), 
											'$_POST[judul]', 
											'".quotes($_POST[cuplikan])."', 
                                                                                                                                    '".quotes($_POST[buku])."',   " ;
                                                                  
                              if(isset($Cover))
		$sql.= "'".$_FILES['Cover']['type']."', ".$Cover.", "  ;                          
					$sql.="'".($levelku==1?$_POST[status]:0)."');";
//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());
//   exit;
		$_POST[tempat] = ""; $judul = ""; $subjudul = ""; $_POST[buku] = ""; $judul = ""; $subjudul = ""; $_POST[buku] = "";
		$verify_buku = "Tambah buku berhasil";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '?file=buku_main';
		header("Location: $URL://$host$uri/$extra");
		exit;
	//}
}

if ($_POST['submit_edit_buku']) {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','buku','$userku','$ip',now(),'edit buku','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
            
  if (is_uploaded_file($_FILES['Cover']['tmp_name'])) {
		$fp = fopen($_FILES['Cover']['tmp_name'], 'r');
		while (!feof($fp)) {
				$Cover .= fgets($fp, 4096);
			}
		fclose($fp);
		$Cover="0x".bin2hex($Cover);
		}
            
		$sql = "update buku set waktu = '".$_POST[thn]."-".$_POST[bln]."-".$_POST[tgl]." ".$_POST[jam].":".$_POST[mnt].":".$_POST[dtk]."', 
                                                                                                                                  cuplikan_id = '".quotes($_POST[cuplikan])."', 
															judul_id = '".quotes($_POST[judul])."',
											isi_id = '".quotes($_POST[buku])."', ";
            if((isset($Cover)))
				$sql.="Cover = $Cover, 			
					ContentTypeC = '".$_FILES['Cover'][type]."', ";
				elseif($_POST[fotoR]==1)
					$sql.="Cover = '', 			
						ContentTypeC = '', ";
          $sql.="status = '".($levelku==1?$_POST[status]:0)."' where id='".$_POST['id']."'";
//echo $sql;

		$result = mysql_query($sql) or die(mysql_error());
//exit;		
		$verify_buku = "$bhs_pdt_success_edit_buku";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "?file=buku_edit&id=$_POST[id]";
		header("Location: $URL://$host$uri/$extra");
		exit;
	}

if($levelku==1) {
if (($_GET['action'] == "status")&&($_GET['file'] == "buku_main")&&($_GET['status'] == "0")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','buku','$userku','$ip',now(),'publish buku','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update buku set status='1' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "status")&&($_GET['file'] == "buku_main")&&($_GET['status'] == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','buku','$userku','$ip',now(),'pending buku','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update buku set status='0' where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['action'] == "delete")&&($_GET['file'] == "buku_main")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','buku','$userku','$ip',now(),'delete buku','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from buku where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['file'] == "buku_detail")&&($_GET['d'] == "del")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','buku','$userku','$ip',now(),'delete buku link','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from buku_link where id='".$_GET['id_link']."' AND buku_id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}
}

//LINK
if ($_POST['submit_link_buku']) {
	
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','buku','$userku','$ip',now(),'add buku link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into buku_link ( buku_id, judul_link, url_link, ringkasan) values ( '".$_GET['id']."', '".$_POST['judul_link']."', '".$_POST['url_link']."', '".$_POST['ringkasan']."')";
		
		$objconn->dbQuery($sql);
		$judul_link = ""; $url_link = ""; $ringkasan = "";
		$verify_buku_link = "Tambah Link Berhasil";
	//}
}

if ($_POST['edit_link_buku']) {

		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','buku','$userku','$ip',now(),'edit buku link terkait','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
/*
		$cuplikan_id=nl2br($cuplikan_id);
		$cuplikan_id=addslashes($cuplikan_id);
		$cuplikan_en=str_replace("\r","<br>\r",$cuplikan_en);
		$isi_id=str_replace("\r","<br>\r",$isi_id);
		$isi_en=str_replace("\r","<br>\r",$isi_en);
*/
		$sql = "update buku_link set judul_link='".$_POST['judul_link']."', url_link='".$_POST['url_link']."', ringkasan='".$_POST['ringkasan']."' where id='".$_POST['id_link']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$verify_buku_link = "<strong>Perubahan buku Link Terkait berhasil</strong>";
}

/*
if ($_POST['submit_add_cat_buku']) {
	if ($kategori=="") { }
	elseif ($kategori=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','buku','$userku','$ip',now(),'add buku category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "insert into buku_cat (kategori,kategori) values ('$kategori','$kategori')";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_POST['submit_edit_cat_buku']) {
	if ($kategori=="") { }
	elseif ($kategori=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
					values ('$session','buku','$userku','$ip',now(),'edit buku category','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update buku_cat set kategori='$kategori',kategori='$kategori' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

if ($_GET['mode'] == "submit_del_cat_buku") {
	// begin log ************************************************************
	$logsql = "insert into log (session,module,username,ip,logtime,act,object) 
				values ('$session','buku','$userku','$ip',now(),'delete buku category','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "delete from buku_cat where id='".$_GET['id']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

*/
?>