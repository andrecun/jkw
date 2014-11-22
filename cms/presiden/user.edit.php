<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("user.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/user.png" border="0" alt="<?php echo"$bhs_um_user_manager"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_um_user_manager"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td><?php include("user.list.php"); ?></td>
				</tr>
			</table>
			
			<br /><br />
<?php
$sql=mysql_query("select *,DATE_FORMAT(datereg, '%d/%m/%Y %H:%i') as date_reg from login where username='$_GET[username]'");
$row=mysql_fetch_array($sql);
?>			
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td><a name="edituser"></a>
						<form action="./?file=user_main" method="post" enctype="multipart/form-data">
						<input type="hidden" name="username" value="<?php echo"$_GET[username]"; ?>" />
						<table width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_um_edit_user"; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?php if ($error_reg!="") {echo"<font color=red>$error_reg</font>";} else {echo"&nbsp;";} ?></td>
							</tr>
							<?php if (($levelku==1) || ($row[username]==$userku)) { ?>
							<tr>
								<td><?php echo"$bhs_um_name"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="name" value="<?php echo"$row[name]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							</tr>
							<tr>
								<td><?php echo"Email"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="email" value="<?php echo"$row[email]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<tr>
								<td><?php echo"Nick"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="nick" value="<?php echo"$row[nick]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_level"; ?></td>
								<td>:</td>
								<td>
<table cellpadding="0" cellspacing="0">
									<tr>
									<td valign="top">
									<input type="radio" name="level" value="1" <?php if ($row[level]=="1") {echo"checked='checked'";} ?> /> <?php echo"$bhs_um_admin1"; ?> 
									</td>
									<td valign="top">
									<input type="radio" name="level" value="2" <?php if ($row[level]=="2") {echo"checked='checked'";} ?> /> <?php echo"$bhs_um_admin2"; ?>
									</td>
									<td valign="top">
									<input type="radio" name="level" value="3" <?php if ($row[level]=="3") {echo"checked='checked'";} ?> /> <?php echo"$bhs_um_admin3"; ?>
									</td>
									</tr>
									<tr>
                                                           
									<td>									
									<input type="radio" name="level" value="4" <?php if ($row[level]=="4") {echo"checked='checked'";} ?> /><?php echo"$bhs_um_admin4"; ?> 
									</td>
									<td>
									<input type="radio" name="level" value="5" <?php if ($row[level]=="5") {echo"checked='checked'";} ?> /><?php echo"$bhs_um_admin5"; ?> 
									</td>
									<td>
									<input type="radio" name="level" value="6" <?php if ($row[level]=="6") {echo"checked='checked'";} ?> /><?php echo"$bhs_um_admin6"; ?> 
									</td>
                                                                                                                           <td>
									<input type="radio" name="level" value="7" <?php if ($row[level]=="7") {echo"checked='checked'";} ?> /><?php echo"$bhs_um_admin7"; ?> 
									</td>
									</tr>
									</table>								
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_status"; ?></td>
								<td>:</td>
								<td><input type="radio" name="status" value="0" <?php if ($row[status]=="0") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_pending"; ?> <input type="radio" name="status" value="1" <?php if ($row[status]=="1") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_active"; ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" value="<?php echo"$bhs_submit"; ?>" name="submit_edit_user" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>