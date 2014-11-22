<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php

// preference /////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['submit_change_preference']){
	//if ($title == "")	{ }
	//else {
		// begin log ************************************************************
		$logsql = "insert into log (session,username,ip,logtime,act,object) 
					values ('$session','$userku','$ip',now(),'change preference','')";
		$logrow = mysql_query($logsql) or die(mysql_error());
		// end log ************************************************************
		
		$sql = "update preference set title_presiden='$title_presiden', title_ibunegara='$title_ibunegara', title_istana='$title_istana'";
		$result = mysql_query($sql);
	//}
}

?>