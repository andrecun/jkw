<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">
			&nbsp; <a href="./?file=buku_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"Indeks Buku"; ?></a> &nbsp;&nbsp; <a href="./?file=buku_add"><img src="/images/nav_add.png" border="0" alt="" /> <?php echo"Tambah Buku"; ?></a> &nbsp;&nbsp; <a href="refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_pdt_refresh"; ?></a> <a href="./?file=log&amp;mod=buku"><img src="/images/arrow.gif" border="0" alt="" /> <?php echo"Log Buku"; ?></a> &nbsp;&nbsp;
		</td>
	</tr>
</table>
<br />