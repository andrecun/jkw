<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/user.nav.php"); ?>

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
					<td><?php include("../istana/user.list.php"); ?></td>
				</tr>
			</table>
			
			<br /><br />
			
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td><a name="password"></a>
						<?php if ($_GET['mode'] == "change_password") { ?>
						<form action="../istana/?file=user_password&amp;mode=<?php echo $_GET['mode']; ?>&amp;username=<?php echo $_GET['username']; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>" />
						<table width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_um_change_password"; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?php if ($error_reg!="") {echo"<font color=red>$error_reg</font>";} else {echo"&nbsp;";} ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_username"; ?></td>
								<td>:</td>
								<td><?php echo $_GET['username']; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_old_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="pswdlama" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_new_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="pswdbaru1" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_re_new_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="pswdbaru2" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" value="<?php echo"$bhs_submit"; ?>" name="submit_change_password" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
						<?php } elseif ($_GET['mode'] == "reset_password") { ?>
						<form action="../istana/?file=user_password&amp;mode=<?php echo $_GET['mode']; ?>&amp;username=<?php echo $_GET['username']; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>" />
						<table width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_um_reset_password"; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?php if ($error_reg!="") {echo"<font color=red>$error_reg</font>";} else {echo"&nbsp;";} ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_username"; ?></td>
								<td>:</td>
								<td><?php echo $_GET['username']; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_new_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="pswdbaru1" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_re_new_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="pswdbaru2" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" value="<?php echo"$bhs_submit"; ?>" name="submit_reset_password" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
						<?php } else {} ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>