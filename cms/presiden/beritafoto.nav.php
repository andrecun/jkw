<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">&nbsp; <a href="./?file=beritafoto_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"$bhs_bft_beritafoto_index"; ?></a> &nbsp;&nbsp; <a href="./?file=beritafoto_add"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"Tambah Berita Foto"; ?></a> &nbsp;&nbsp; <a href="refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_bft_refresh"; ?></a>&nbsp;&nbsp;<a href="./?file=log&amp;mod=beritafoto"><img src="/images/arrow.gif" border="0" alt="" /> <?php echo"Log Berita Foto"; ?></a> &nbsp;&nbsp;  </td>
	</tr>
</table>
<br />