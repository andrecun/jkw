<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<table width="100%" bgcolor="#eeeeee" border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td height="30" valign="bottom">
			&nbsp; 
			<a href="./?file=pers_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"$bhs_prs_news_index"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=pers_add"><img src="/images/nav_add.png" border="0" alt="" /> <?php echo"$bhs_prs_add_news"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=fotorilis_main"><img src="/images/nav_home.png" border="0" alt="" /> <?php echo"Indeks Rilis Foto"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=fotorilis_add"><img src="/images/foto_add.png" border="0" alt="" /> <?php echo"Tambah Rilis Foto"; ?></a> &nbsp;&nbsp; 
			<a href="refresh.php"><img src="/images/nav_refresh.png" border="0" alt="" /> <?php echo"$bhs_prs_refresh"; ?></a> &nbsp;&nbsp; 
			<a href="./?file=log&amp;mod=pers"><img src="/images/arrow.gif" border="0" alt="" /> <?php echo"Log Ruang Pers"; ?></a> &nbsp;&nbsp; 
		</td>
	</tr>
</table>
<br />