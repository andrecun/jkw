<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../ibunegara/user.nav.php"); ?>

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
					<td><?php include("../ibunegara/user.list.php"); ?></td>
				</tr>
			</table>
			
			<br /><br />
			
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td><a name="edituser"></a>
						<?php
						$sql = mysql_query("select * from login where username='$username'");
						$row = mysql_fetch_array($sql);
						?>
						<form action="../ibunegara/?file=user_main" method="post" enctype="multipart/form-data">
						<input type="hidden" name="username" value="<?php echo"$row[username]"; ?>" />
						<table width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_um_edit_user"; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?php if ($error_reg!="") {echo"<font color=red>$error_reg</font>";} else {echo"&nbsp;";} ?></td>
							</tr>
							<?php if (($userku==$superuser) || ($row[username]!=$superuser)) { ?>
							<tr>
								<td><?php echo"$bhs_um_name"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="name" value="<?php echo"$row[name]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<?php } else { ?>
							<tr>
								<td><?php echo"$bhs_um_name"; ?></td>
								<td>:</td>
								<td><?php echo"$row[name]"; ?><input type="hidden" name="name" value="<?php echo"$row[name]"; ?>" /></td>
							</tr>
							<?php } ?>
							<?php if ((($levelku=="1") && ($row[level]=="1") && ($userku==$superuser) && ($row[username]!=$superuser)) || (($levelku=="1") && ($row[level]=="2")) || (($levelku=="1") && ($row[level]=="3"))) { ?>
							<tr>
								<td><?php echo"$bhs_um_level"; ?></td>
								<td>:</td>
								<td><input type="radio" name="level" value="1" <?php if ($row[level]=="1") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_admin1"; ?> <input type="radio" name="level" value="2" <?php if ($row[level]=="2") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_admin2"; ?> <input type="radio" name="level" value="3" <?php if ($row[level]=="3") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_admin3"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_status"; ?></td>
								<td>:</td>
								<td><input type="radio" name="status" value="0" <?php if ($row[status]=="0") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_pending"; ?> <input type="radio" name="status" value="1" <?php if ($row[status]=="1") {echo"checked='checked'";} else {} ?> /> <?php echo"$bhs_um_active"; ?></td>
							</tr>
							<?php } elseif (($levelku=="1") && ($row[level]=="1") && ($userku!=$superuser) && ($row[username]!=$superuser)) { ?>
							<input type="hidden" name="level" value="<?php echo"$row[level]"; ?>" />
							<input type="hidden" name="status" value="<?php echo $row[status]; ?>" />
							<?php } elseif (($levelku=="2") && ($row[level]=="2")) { ?>
							<input type="hidden" name="level" value="<?php echo"$row[level]"; ?>" />
							<input type="hidden" name="status" value="<?php echo $row[status]; ?>" />
							<?php } elseif (($levelku=="3") && ($row[level]=="3")) { ?>
							<input type="hidden" name="level" value="<?php echo"$row[level]"; ?>" />
							<input type="hidden" name="status" value="<?php echo $row[status]; ?>" />
							<?php } else { ?>
							<input type="hidden" name="level" value="<?php echo"$row[level]"; ?>" />
							<input type="hidden" name="status" value="<?php echo $row[status]; ?>" />
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