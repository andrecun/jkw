<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">&nbsp; <a href="./?file=user_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"$bhs_um_user_manager_index"; ?></a> &nbsp;&nbsp; <a href="./?file=user_main#adduser"><img src="/images/nav_add.png" border="0" alt="" /> <?php echo"$bhs_um_add_user_manager"; ?></a> &nbsp;&nbsp; <a href="refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_um_user_manager_refresh"; ?></a></td>
	</tr>
</table>
<br />