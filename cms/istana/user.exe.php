<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
// user manager /////////////////////////////////////////////////////////////////////////////////////////////////
$error_reg = "";

if (($_POST['submit_add_user']) && ($levelku=="1")) {
	$sqlcek = mysql_query("select username from login where username='".$_POST['username']."'");
	$numcek = mysql_num_rows($sqlcek);
	
	if		($username == "")					{ $error_reg	= "$bhs_um_username_kosong"; }
	elseif	($numcek != "")						{ $error_reg	= "$bhs_um_username_digunakan"; }
	elseif	(ereg('[^A-Za-z0-9]', $username))	{ $error_reg	= "$bhs_um_username_huruf_angka"; }
	elseif	($password1 == "")					{ $error_reg	= "$bhs_um_password_kosong !!"; }
	elseif	($password2 == "")					{ $error_reg	= "$bhs_um_re_password_kosong !!"; }
	elseif	($password1 != $password2)			{ $error_reg	= "$bhs_um_password_berbeda !!"; }
	elseif	($name == "")						{ $error_reg	= "$bhs_um_nama_kosong !!"; }
	else	{
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add user','$username')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
	
		$sql = "insert into login (username,password,name,level,status,datereg) 
				values ('$username',md5('$password1'),'$name','$level','$status',now())";
		$result = mysql_query($sql) or die(mysql_error());
		
		$username	= "";
		$name		= "";			
	}
}

if (($_GET['mode'] == "submit_del_user") && ($_GET['level'] != "1") && ($levelku=="1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'del user','$username')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from login where username='".$_GET['username']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if ($_POST['submit_edit_user']) {
	if	($name == "")	{ $error_reg = "Nama kosong !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit user','$username')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set name='$name', level='$level', status='$status' where username='".$_POST['username']."'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$username	= "";
		$name		= "";
	}
}

if ($_POST['submit_change_password']) {
	$sqlcek = mysql_query("select password from login where username='$userku'");
	$rowcek = mysql_fetch_array($sqlcek);
	$pswd = $rowcek['password'];
	
	if		($pswdlama == "")			{ $error_reg = "$bhs_um_password_lama_kosong !!"; }
	elseif	(md5($pswdlama) != $pswd)	{ $error_reg = "$bhs_um_password_lama_salah"; }
	elseif	($pswdbaru1 == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($pswdbaru2 == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($pswdbaru1 != $pswdbaru2)	{ $error_reg = "$bhs_um_password_baru_beda !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'change password','$userku')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set password=md5('$pswdbaru1') where username='$userku'";
		$result = mysql_query($sql);
		$error_reg = "$bhs_um_password_diganti";
	}
}

if (($_POST['submit_reset_password']) && ($levelku == "1")) {
	
	if		($pswdbaru1 == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($pswdbaru2 == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($pswdbaru1 != $pswdbaru2)	{ $error_reg = "$bhs_um_password_baru_beda !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'reset password','$username')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set password=md5('$pswdbaru1') where username='$username'";
		$result = mysql_query($sql);
		$error_reg = "$bhs_um_password_diganti";
	}
}

if (($_GET['mode'] == "submit_active_user") && ($levelku == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'active user','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "update login set status='1' where uid='".$_GET['uid']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_GET['mode'] == "submit_pending_user") && ($levelku == "1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'pending user','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
		
	$sql = "update login set status='0' where uid='".$_GET['uid']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

?>