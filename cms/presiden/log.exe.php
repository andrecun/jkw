<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
/*
// log /////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST['submit_del_log']) {
	// begin log ************************************************************
	//$logsql = "insert into log (session,username,ip,logtime,act,object) 
	//			values ('$session','$userku','$ip',now(),'delete log','')";
	//$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************

	$query =  mysql_query("select * from log order by id desc");
	$jumlah = mysql_num_rows($query);
	$counter = $jumlah - 1;
	for ($i=0; $i<=$counter; $i++) { $status[$i] ='0';}
	for ($i=0; $i<=$counter; $i++) { if ($check[$i] == 'on' ) { $status[$i]='1';  } }
	for ($i=0; $i<=$counter; $i++) {
	   if ($status[$i] == '1' ) {
	      $hapus = mysql_query("delete from log where id=$id[$i]");
	   }
	}
}

if ($_GET['mode']=="submit_empty_log") {
	// begin log ************************************************************
	$logsql = "insert into log (session,username,ip,logtime,act,object) 
				values ('$session','$userku','$ip',now(),'empty log','')";
	$logrow = mysql_query($logsql) or die(mysql_error());
	// end log ************************************************************
	
	$sql = "delete from log";
	$result = mysql_query($sql) or die(mysql_error());
}
*/

?>