<?php
ob_start();
session_start();
include("../../lib/config.php");
include_once("../../lib/DatabaseAccess.php");
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

ini_set("arg_separator.output", "&amp;");

$userku		= $_SESSION['user'];
$pswdku		= $_SESSION['pswd'];
$levelku	= $_SESSION['level'];

//$userku		= 'ekodox';
//$pswdku		= 'asdf';
//$levelku		= '1';

if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo"<meta http-equiv='refresh' content='0;url=../index.php' />"; die(); }

include("../../lib/config.php");
include("../function.php");

$bhs = $_COOKIE['bhs'];
if (!isset($bhs)) {$bhs='ind';}
include("../bhs.$bhs.php");

//exe
include"user.exe.php";
include"preference.exe.php";
include"banner.exe.php";
include"log.exe.php";
include"perhalaman.exe.php";

include"topik.exe.php";
include"fokus.exe.php";
include"pers.exe.php";
include"fotorilis.exe.php";
include"beritafoto.exe.php";
include"gallery.exe.php";
include"pidato.exe.php";
include"wawancara.exe.php";
include"kliping.exe.php";
include"perspektif.exe.php";
include"message.exe.php";
include"uu.exe.php";
include"sms.exe.php";
include"pobox.exe.php";
include"mutiara.exe.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<?php $sqltitle = mysql_query("select * from preference"); $rowtitle = mysql_fetch_array($sqltitle); $title = $rowtitle[title_presiden]; ?>
<title>..:: <?php echo"$title"; ?> :: CMS ::..</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link media="all" href="../cms.css" type="text/css" rel="stylesheet" />

<script language="javascript" src="../functions.js" type="text/javascript"></script>
<script type="text/javascript" src="../cekinput.js"></script>
<script src="/popup.js" language="javascript" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	color: #FFFF99;
	font-weight: bold;
}
-->
</style>
</head>

<body style="margin: 0px 0px 0px 0px;">

<?php include("cms.header.php"); ?>

<table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td class="header3">
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td height="35" align="left"> &nbsp; <a href="./?file=home"><font class="header3">[<?php echo"$bhs_home"; ?>] <a href="./?file=user_main"><font class="header3">[<?php echo"$bhs_user_manager"; ?>]</font></a> <a href="./?file=preference"><font class="header3">[<?php echo"$bhs_preference"; ?>]</font></a> <a href="./?file=banner"><font class="header3">[<?php echo"$bhs_banner"; ?>]</font></a> <a href="./?file=log"><font class="header3">[<?php echo"$bhs_log"; ?>]</font></a> <a href="./?file=perhalaman"><font class="header3">[<?php echo"$bhs_perhalaman"; ?>]</font></a> <a href="../logout.php" onclick="return confirm('<?php echo"$bhs_confirm_logout"; ?>')"><font color="red">[<b><?php echo"$bhs_logout"; ?></b>]</font></a></font></a></td>
					<td height="35" align="right"><a href="./?file=sms_main"><span class="style1">SMS 9949</span></a> | <a href="./?file=pobox_main"><span class="style1">PO BOX 9949</span></a> | <a href="?file=message_main"><span class="style1">Kotak Pesan</span></a>&nbsp;&nbsp; </td>
				</tr>
			</table> 
		</td>
	</tr>
	<tr>
		<td><?php include("navigasi.php"); ?></td>
	</tr>
	<tr>
		<td>
			<?php
			$file=$_GET['file'];
			if		(!isset($file))					{ $file='home'; }
			
			if		($file=='home')					{ include("home.php"); }
			
			elseif	($file=='user_main')			{ include("user.main.php"); }
			elseif	($file=='user_edit')			{ include("user.edit.php"); }
			elseif	($file=='user_password')		{ include("user.password.php"); }
			
			elseif	($file=='preference')			{ include("preference.php"); }
			
			elseif	($file=='banner')				{ include("banner.php"); }
			
			elseif	($file=='log')					{ include("log.php"); }
			elseif	($file=='logbysession')			{ include("logbysession.php"); }
			
			elseif	($file=='perhalaman')			{ include("perhalaman.php"); }
			
			elseif	($file=='topik_main')			{ include("topik.main.php"); }
			elseif	($file=='topik_add')			{ include("topik.add.php"); }
			elseif	($file=='topik_detail')			{ include("topik.detail.php"); }
			elseif	($file=='topik_edit')			{ include("topik.edit.php"); }
			elseif	($file=='topik_cat')			{ include("topik.cat.php"); }
			
			elseif	($file=='fokus_main')			{ include("fokus.main.php"); }
			elseif	($file=='fokus_add')			{ include("fokus.add.php"); }
			elseif	($file=='fokus_detail')			{ include("fokus.detail.php"); }
			elseif	($file=='fokus_edit')			{ include("fokus.edit.php"); }
			elseif	($file=='fokus_cat')			{ include("fokus.cat.php"); }
			
			elseif	($file=='pers_main')			{ include("pers.main.php"); }
			elseif	($file=='pers_add')				{ include("pers.add.php"); }
			elseif	($file=='pers_detail')			{ include("pers.detail.php"); }
			elseif	($file=='pers_edit')			{ include("pers.edit.php"); }
			elseif	($file=='pers_cat')				{ include("pers.cat.php"); }
			
			elseif	($file=='fotorilis_main')		{ include("fotorilis.main.php"); }
			elseif	($file=='fotorilis_add')		{ include("fotorilis.add.php"); }
			elseif	($file=='fotorilis_edit')		{ include("fotorilis.edit.php"); }
			elseif	($file=='fotorilis_detail')		{ include("fotorilis.detail.php"); }
			
			elseif	($file=='beritafoto_main')		{ include("beritafoto.main.php"); }
			elseif	($file=='beritafoto_add')		{ include("beritafoto.add.php"); }
			elseif	($file=='beritafoto_edit')		{ include("beritafoto.edit.php"); }
			elseif	($file=='beritafoto_detail')	{ include("beritafoto.detail.php"); }

			
			elseif	($file=='gallery_main')			{ include("gallery.main.php"); }
			elseif	($file=='gallery_edit')			{ include("gallery.edit.php"); }
			elseif	($file=='gallery_add')			{ include("gallery.add.php"); }
			elseif	($file=='gallery_detail')		{ include("gallery.detail.php"); }
			elseif	($file=='gallery_display')		{ include("gallery.display.php"); }
			elseif	($file=='gallery_list')			{ include("gallery.list.php"); }
			elseif	($file=='gallery_upload')		{ include("gallery.upload.php"); }
			
			//elseif	($file=='pages_main')			{ include("pages.main.php"); }
			//elseif	($file=='pages_detail')			{ include("pages.detail.php"); }
			//elseif	($file=='pages_edit')			{ include("pages.edit.php"); }
			
			elseif	($file=='pidato_main')			{ include("pidato.main.php"); }
			elseif	($file=='pidato_add')			{ include("pidato.add.php"); }
			elseif	($file=='pidato_detail')		{ include("pidato.detail.php"); }
			elseif	($file=='pidato_edit')			{ include("pidato.edit.php"); }
			elseif	($file=='pidato_cat')			{ include("pidato.cat.php"); }
			
			elseif	($file=='wawancara_main')		{ include("wawancara.main.php"); }
			elseif	($file=='wawancara_add')		{ include("wawancara.add.php"); }
			elseif	($file=='wawancara_detail')		{ include("wawancara.detail.php"); }
			elseif	($file=='wawancara_edit')		{ include("wawancara.edit.php"); }
			elseif	($file=='wawancara_cat')		{ include("wawancara.cat.php"); }
			
			elseif	($file=='kliping_main')			{ include("kliping.main.php"); }
			elseif	($file=='kliping_add')			{ include("kliping.add.php"); }
			elseif	($file=='kliping_detail')		{ include("kliping.detail.php"); }
			elseif	($file=='kliping_edit')			{ include("kliping.edit.php"); }
			elseif	($file=='kliping_cat')			{ include("kliping.cat.php"); }
			
			elseif	($file=='perspektif_main')		{ include("perspektif.main.php"); }
			elseif	($file=='perspektif_add')		{ include("perspektif.add.php"); }
			elseif	($file=='perspektif_detail')	{ include("perspektif.detail.php"); }
			elseif	($file=='perspektif_edit')		{ include("perspektif.edit.php"); }
			elseif	($file=='perspektif_cat')		{ include("perspektif.cat.php"); }
			
			elseif	($file=='message_main')			{ include("message.main.php"); }
			elseif	($file=='message_detail')		{ include("message.detail.php"); }
			elseif	($file=='message_reply')		{ include("message.reply.php"); }
			
			elseif	($file=='uu_main')				{ include("uu.main.php"); }
			elseif	($file=='uu_add')				{ include("uu.add.php"); }
			elseif	($file=='uu_detail')			{ include("uu.detail.php"); }
			elseif	($file=='uu_edit')				{ include("uu.edit.php"); }
			elseif	($file=='uu_upload')			{ include("uu.upload.php"); }
	
			elseif	($file=='sms_main')				{ include("sms.main.php"); }
			elseif	($file=='sms_add')				{ include("sms.add.php"); }
			elseif	($file=='sms_detail')			{ include("sms.detail.php"); }
			elseif	($file=='sms_edit')				{ include("sms.edit.php"); }
			elseif	($file=='sms_report_main')		{ include("sms_report.main.php"); }
			elseif	($file=='sms_report_add')		{ include("sms_report.add.php"); }

			elseif	($file=='pobox_main')			{ include("pobox.main.php"); }
			elseif	($file=='pobox_add')			{ include("pobox.add.php"); }
			elseif	($file=='pobox_detail')			{ include("pobox.detail.php"); }
			elseif	($file=='pobox_edit')			{ include("pobox.edit.php"); }

			elseif	($file=='mutiara_main')			{ include("mutiara.main.php"); }
			elseif	($file=='mutiara_add')			{ include("mutiara.add.php"); }
			elseif	($file=='mutiara_detail')		{ include("mutiara.detail.php"); }
			elseif	($file=='mutiara_edit')			{ include("mutiara.edit.php"); }
				
			//elseif	($file=='search')				{ include("search.php"); }
			
			//elseif	($file=='credit')				{ include("credit.php"); }
			
			else									{ include("error.php"); }
			?>
		</td>
	</tr>
</table>
<br />

<?php include("cms.footer.php"); ?>

</body>
</html>

<?php
$_SESSION['user']		= $userku;
$_SESSION['pswd']		= $pswdku;
$_SESSION['level']		= $levelku;
?>

<?php
//$output = preg_replace("/(\s+)?(\<.+\>)(\s+)?/", "$2",  ob_get_contents());
//ob_end_clean();
//echo $output;
?>