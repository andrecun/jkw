<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// perhalaman /////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST['submit_perpage']) {
	if ($jumlah=="") { }
	else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'edit perhalaman','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************

		$sql = "update perhalaman set jumlah='$jumlah' where id='".$_POST['id']."'";
		$result = mysql_query($sql) or die(mysql_error());
	}
}

?>