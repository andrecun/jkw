<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">
			&nbsp; 
			<a href="./?file=topik_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"$bhs_tpk_topik_index"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=topik_add"><img src="/images/nav_add.png" border="0" alt="" /> <?php echo"$bhs_tpk_add_topik"; ?></a> &nbsp;&nbsp; 
			<a href="refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_tpk_refresh"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=log&amp;mod=topik"><img src="/images/arrow.gif" border="0" alt="" /> <?php echo"Log Topik"; ?></a> &nbsp;&nbsp; 
		</td>
	</tr>
</table>
<br />