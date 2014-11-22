<?php
session_start();

include("../lib/config.php");
// begin log ************************************************************
$logsql = "insert into log (session,username,ip,logtime,act) 
			values ('".$_SESSION['session']."','".$_SESSION['user']."','".$_SESSION['ip']."',now(),'logout user')";
$logrow = mysql_query($logsql) or die(mysql_error());
// end log ************************************************************

session_unset();
session_destroy();
?>
<meta http-equiv="refresh" content="0;URL=index.php" />