<?php 
	if (($userku=="") && ($pswdku=="") && ($levelku=="")) { 
		echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="11" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
	</tr>
	<tr>
		<td class="menu" height="30">&nbsp;</td>
		<td class="menu" width="100"><a href="../istana/?file=user_main&amp;order=username&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b><?php echo"$bhs_um_username"; ?></b><a href="../istana/?file=user_main&amp;order=username&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
		<td class="menu" width="200"><a href="../istana/?file=user_main&amp;order=name&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b><?php echo"$bhs_um_name"; ?></b><a href="../istana/?file=user_main&amp;order=name&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
		<td class="menu" width="80" align="center"><a href="../istana/?file=user_main&amp;order=level&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b><?php echo"$bhs_um_level"; ?></b><a href="../istana/?file=user_main&amp;order=level&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
		<td class="menu" width="100" align="center"><a href="../istana/?file=user_main&amp;order=datereg&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b><?php echo"$bhs_um_date_reg"; ?></b><a href="../istana/?file=user_main&amp;order=datereg&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
		<td class="menu" width="60" align="center"><b><?php echo"$bhs_um_status"; ?></b></td>
		<td class="menu" width="40" align="center"><b><?php echo"$bhs_um_action"; ?></b></td>
		<td class="menu" width="40" align="center"><b><?php echo"$bhs_um_edit"; ?></b></td>
		<td class="menu" width="40" align="center"><b><?php echo"$bhs_um_pswd"; ?></b></td>
		<td class="menu" width="40" align="center"><b><?php echo"$bhs_um_delete"; ?></b></td>
		<td class="menu" height="30">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="11" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
	</tr>
	<?php
	if (($levelku=="1") && ($_GET['order']=="") && ($_GET['sort']=="")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by name asc");
	}
	// username - asc
	elseif (($levelku=="1") && ($_GET['order']=="username") && ($_GET['sort']=="asc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by username asc");
	} 
	// username - desc
	elseif (($levelku=="1") && ($_GET['order']=="username") && ($_GET['sort']=="desc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by username desc");
	} 
	// name - asc
	elseif (($levelku=="1") && ($_GET['order']=="name") && ($_GET['sort']=="asc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by name asc");
	} 
	// name - desc
	elseif (($levelku=="1") && ($_GET['order']=="name") && ($_GET['sort']=="desc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by name desc");
	} 
	// level - asc
	elseif (($levelku=="1") && ($_GET['order']=="level") && ($_GET['sort']=="asc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by level asc");
	} 
	// level - desc
	elseif (($levelku=="1") && ($_GET['order']=="level") && ($_GET['sort']=="desc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by level desc");
	} 
	// datereg - asc
	elseif (($levelku=="1") && ($_GET['order']=="datereg") && ($_GET['sort']=="asc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by datereg asc");
	} 
	// datereg - desc
	elseif (($levelku=="1") && ($_GET['order']=="datereg") && ($_GET['sort']=="desc")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login order by datereg desc");
	} 
	elseif (($levelku=="2") || ($levelku=="3")) {
		$sql = mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login where username='$userku'");
	} 
	else { }
	
	while ($row=mysql_fetch_array($sql)) {
	$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
	?>
	<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
		<td>&nbsp;</td>
		<td width="100"><img src="/images/rightarrow.png" border="0" width="12" height="12" hspace="4" alt="" /> <?php echo"$row[username]"; ?></td>
		<td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"$row[name]"; ?></td>
		<td width="80" align="center"><?php if ($row[level]=="1") {echo"$bhs_um_admin1";} elseif ($row[level]=="2") {echo"$bhs_um_admin2";} elseif ($row[level]=="3") {echo"$bhs_um_admin3";} else {} ?></td>
		<td width="100" align="center"><?php echo"$row[date_reg]"; ?></td>
		<td width="60" align="center"><?php if ($row[status]=="0") {echo"<font color='red'>$bhs_um_pending</font>";} elseif ($row[status]=="1") {echo"<font color='blue'>$bhs_um_active</font>";} else {} ?></td>
		<td width="40" align="center">
		<?php if ($levelku=="1") { ?>
			<?php if ($row[status]=="0") { ?>
				<a href="../istana/?file=user_main&amp;mode=submit_active_user&amp;uid=<?php echo"$row[uid]"; ?>"><img src="/images/publish.png" border="0" alt="<?php echo"$bhs_um_active"; ?>" /></a>
			<?php } elseif ($row[status]=="1") { ?>
				<a href="../istana/?file=user_main&amp;mode=submit_pending_user&amp;uid=<?php echo"$row[uid]"; ?>"><img src="/images/unpublish.png" border="0" alt="<?php echo"$bhs_um_pending"; ?>" /></a>
			<?php } else {} ?>
		<?php } else { ?>
			<?php if ($row[status]=="0") { ?>
				<img src="/images/publish.png" border="0" alt="<?php echo"$bhs_um_active"; ?>" />
			<?php } elseif ($row[status]=="1") { ?>
				<img src="/images/unpublish.png" border="0" alt="<?php echo"$bhs_um_pending"; ?>" />
			<?php } else {} ?>
		<?php } ?>
		</td>
		<td width="40" align="center"><a href="../istana/?file=user_edit&amp;username=<?php echo"$row[username]"; ?>#edituser"><img src="/images/edit.png" border="0" alt="<?php echo"$bhs_um_edit"; ?>" /></a></td>
		<td width="40" align="center">
			<?php if (($levelku=="1") && ($row[username]==$superuser)) { ?>
				<a href="../istana/?file=user_password&amp;mode=change_password&amp;username=<?php echo"$userku"; ?>#password"><img src="/images/add.png" border="0" alt="<?php echo"$bhs_um_change"; ?>" /></a>
			<?php } elseif ($row[username]==$userku) { ?>
				<a href="../istana/?file=user_password&amp;mode=change_password&amp;username=<?php echo"$userku"; ?>#password"><img src="/images/add.png" border="0" alt="<?php echo"$bhs_um_change"; ?>" /></a>
			<?php } else { ?>
				<a href="../istana/?file=user_password&amp;mode=reset_password&amp;username=<?php echo"$row[username]"; ?>#password"><img src="/images/add.png" border="0" alt="<?php echo"$bhs_um_reset"; ?>" /></a>
			<?php } ?>
		</td>
		<td width="40" align="center">
			<?php if ((($row[level]=="1") && ($row[username]==$superuser)) || ($row[username]==$userku)) { ?>
				<img src="/images/delx.png" border="0" alt="" />
			<?php } else { ?>
				<a href="../istana/?file=user_main&amp;mode=submit_del_user&amp;username=<?php echo"$row[username]"; ?>&amp;level=<?php echo"$row[level]"; ?>" onclick="return confirm('<?php echo"$bhs_confirm_del"; ?>')"><img src="/images/del.png" border="0" alt="<?php echo"$bhs_um_delete"; ?>" /></a>
			<?php } ?>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="11" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
	</tr>
	<?php
	}
	?>
</table>