<?php
if($_GET['action'] == 'delete') {
	$id = $_GET['id'];
	$sql = "DELETE FROM video where id='$id'";
	$query = mysql_query($sql);
	if($query) $message = "video deleted!";
	else $message = mysql_error();
}
if(is_array($_FILES)) {
		$source = "/video/".$_FILES['source']['name'];
		$fullpath = realpath("../../video/");
		#echo $_FILES['source']['tmp_name'].",".$fullpath."/".$_FILES['source']['name'];
		if(!move_uploaded_file($_FILES['source']['tmp_name'],$fullpath."/".$_FILES['source']['name']) && !empty($_FILES)) {
			//echo "error uploaded video!";
			//print_r($_FILES);
                 $tes=1;
		}
		
}
if($_POST['ac'] == 'add') {
	if($_POST['status']) $status="'0'";
	else $status = "'1'";
	$string = "INSERT INTO video
					(judul_id,status,keterangan_id,pengirim,waktu,source)
					VALUES ('".$_POST['judul_id']."',$status,'".
								$_POST['keterangan_id']."','$userku','".
								$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl']."','$source')
				";
	$query = mysql_query($string);
	$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','video','$userku','$ip',now(),'new video','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	if(!$query) $message = mysql_error();
	else $message = "video saved successfully!";
}elseif($_POST['submit_edit_video']) {
	if($source) $source = "source='$source',";
	if($_POST['keterangan_id'])
		$keterangan = " keterangan_id='".$_POST['keterangan_id']."', ";
	if($_POST['judul_id'])
		$judul = " judul_id='".$_POST['judul_id']."', ";
	if($_POST['status'])
		$status = " status='1', ";
	else
		$status = " status='0', ";
	if($_POST['thn'] && $_POST['bln'] && $_POST['tgl'])
		$tanggal = " waktu='".$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl']."'";
	$string = "UPDATE video SET ".
		$keterangan.$judul.$status.$source.$tanggal.
		" WHERE id=".$_POST['id'];
	$logsql = "insert into log (session,module,username,ip,logtime,act,object)
					values ('$session','video','$userku','$ip',now(),'edit video','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	/*--log--*/
	$edit = mysql_query($string);
	if($edit) $message = "video successfully updated!";
	else $message = mysql_error();
}

?>
