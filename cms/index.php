<?php
session_start();
session_unset();
session_destroy();

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
					<td>
						<form action="index.exe.php" method="post" enctype="multipart/form-data">
						<table width="240" border="0" bgcolor="#eeeeee" cellspacing="0" cellpadding="2" align="center">
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><font size="5">login</font></td>
							</tr>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><input type="text" name="username" size="20" class="inputtext" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input type="password" name="password" size="20" class="inputtext" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" value="Submit" name="login" class="inputsubmit" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br />

<?php include("cms.footer.php"); ?>

</body>
</html>