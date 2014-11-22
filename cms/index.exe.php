<?php
session_start();

if(!$PHP_SELF){
	if($HTTP_POST_VARS) 	{extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "POST_");}
	if($HTTP_GET_VARS)  	{extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "GET_");}
	if($HTTP_COOKIE_VARS)	{extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "COOKIE_");}
	if($HTTP_ENV_VARS)	 	{extract($HTTP_ENV_VARS, EXTR_PREFIX_SAME, "ENV_");}
	if($HTTP_SERVER_VARS)	{extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "SERVER_");}
	if($HTTP_POST_FILES)	{extract($HTTP_POST_FILES, EXTR_PREFIX_SAME, "FILES_");}
	if($HTTP_SESSION_VARS)	{extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "SESSION_");}
}
if($PHP_SELF == ""){ $PHP_SELF = $HTTP_SERVER_VARS["PHP_SELF"]; }

include("../lib/config.php");
include("function.php");
include("bhs.ind.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include("copyright.php"); ?>
<html>
<head>
<?php $sqltitle = mysql_query("select * from preference"); $rowtitle = mysql_fetch_array($sqltitle); $title = $rowtitle[title_presiden]; ?>
<title>..:: <?php echo"$title"; ?> :: CMS ::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link media="all" href="cms.css" type="text/css" rel="stylesheet" />
</head>

<body style="margin: 0px 0px 0px 0px;">

<?php include("cms.header.php"); ?>

<br />
<table class="tablebg1" width="750" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4">
				<tr>
					<td align="center"><font size="4">loading...............</font></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br />
	
<?php include("cms.footer.php"); ?>

</body>
</html>

<?php
if($_POST['login']){
	$username		= addslashes($_POST['username']);
	$password		= addslashes($_POST['password']);

	$session = session_id();
	$ip = $_SERVER['REMOTE_ADDR'];

	$sql = mysql_query("select * from login where username='$username' and status='1'");
	$row = mysql_fetch_array($sql);
	$us = $row['username'];
	$pw = $row['password'];
	$lv = $row['level'];
	$fullname = $row['name'];

	if(($username==$us) && (md5($password)==$pw)) {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$username','$ip',now(),'login admin','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$_SESSION['user']		= $us;
		$_SESSION['pswd']		= $pw;
		$_SESSION['level']		= $lv;
		$_SESSION['session']	= $session;
		$_SESSION['ip']			= $ip;
		$_SESSION['fullname']		= $fullname;
		echo "<meta http-equiv='refresh' content='0;URL=presiden/' />"; die();
	} else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$username','$ip',now(),'error login','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		echo "<meta http-equiv='refresh' content='0;URL=logout.php' />"; die();
	}
}
?>