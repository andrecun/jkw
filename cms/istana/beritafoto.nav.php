<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">&nbsp; <a href="../istana/?file=beritafoto"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"$bhs_bft_beritafoto_index"; ?></a> &nbsp;&nbsp; <a href="../istana/refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_bft_refresh"; ?></a></td>
	</tr>
</table>
<br />