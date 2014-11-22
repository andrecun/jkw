<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
// user manager /////////////////////////////////////////////////////////////////////////////////////////////////
$error_reg = "";

if (($_POST['submit_add_user']) && ($levelku=="1")) {
	$sqlcek = mysql_query("select username from login where username='".$_POST['username']."'");
	$numcek = mysql_num_rows($sqlcek);
	
	if		($_POST[username] == "")					{ $error_reg	= "$bhs_um_username_kosong"; }
	elseif	($numcek != "")						{ $error_reg	= "$bhs_um_username_digunakan"; }
	elseif	(ereg('[^A-Za-z0-9]', $_POST[username]))	{ $error_reg	= "$bhs_um_username_huruf_angka"; }
	elseif	($_POST[password1] == "")					{ $error_reg	= "$bhs_um_password_kosong !!"; }
	elseif	($_POST[password2] == "")					{ $error_reg	= "$bhs_um_re_password_kosong !!"; }
	elseif	($_POST[password1] != $_POST[password2])			{ $error_reg	= "$bhs_um_password_berbeda !!"; }
	elseif	($_POST[name] == "")						{ $error_reg	= "$bhs_um_nama_kosong !!"; }
	else	{
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'add user','$_POST[username]')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
	
		$sql = "insert into login (username,password,name,email,nick,level,status,datereg) 
				values ('$_POST[username]',md5('$_POST[password1]'),'$_POST[name]','$_POST[email]','$_POST[nick]','$_POST[admin]','$_POST[status]',now())";
	
            $result = mysql_query($sql) or die(mysql_error());
		
		$_POST[username]	= "";
		$_POST[name]		= "";			
	}
}

if (($_GET['mode'] == "submit_del_user") && ($levelku=="1")) {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'del user','$_POST[username]')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from login where username='".$_GET['username']."'";
	$result = mysql_query($sql) or die(mysql_error());
}

if (($_POST['submit_edit_user']) && ($levelku=="1")) {
	if	($_POST[name] == "")	{ $error_reg = "Nama kosong !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit user','$_POST[username]')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set name='$_POST[name]', email='$_POST[email]', nick='$_POST[nick]', level='$_POST[level]', status='$_POST[status]' where username='".$_POST['username']."'";

		$result = mysql_query($sql) or die(mysql_error());
		
		$_POST[username]	= "";
		$_POST[name]		= "";
	}
}

if ($_POST['submit_change_password']) {
	$sqlcek = mysql_query("select level,password from login where username='$userku'");
	$rowcek = mysql_fetch_array($sqlcek);
	$pswd = $rowcek['password'];
	
	if(($_POST[pswdlama] == "")&&($rowcek[level]!=1)){ $error_reg = "$bhs_um_password_lama_kosong !!"; }
	elseif	(md5($_POST[pswdlama]) != $pswd)	{ $error_reg = "$bhs_um_password_lama_salah"; }
	elseif	($_POST[pswdbaru1] == "")			{ $error_reg = "$bhs_um_password_baru_kosong !"; }
	elseif	($_POST[pswdbaru2] == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($_POST[pswdbaru1] != $_POST[pswdbaru2])	{ $error_reg = "$bhs_um_password_baru_beda !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'change password','$userku')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set password=md5('$_POST[pswdbaru1]') where username='$userku'";
		$result = mysql_query($sql);
		$error_reg = "$bhs_um_password_diganti";
	}
}

if (($_POST['submit_reset_password']) && ($levelku == "1")) {
	
	if		($_POST[pswdbaru1] == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($_POST[pswdbaru2] == "")			{ $error_reg = "$bhs_um_password_baru_kosong !!"; }
	elseif	($_POST[pswdbaru1] != $_POST[pswdbaru2])	{ $error_reg = "$bhs_um_password_baru_beda !!"; }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'reset password','$_POST[username]')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update login set password=md5('$_POST[pswdbaru1]') where username='$_POST[username]'";
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