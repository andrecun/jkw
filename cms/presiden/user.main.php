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
			
			<?php if ($levelku=="1") { ?>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td><a name="adduser"></a>
						<form action="./?file=user_main" method="post" enctype="multipart/form-data">
						<table width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
							<tr>
								<td><b><?php echo"$bhs_um_add_user"; ?></b></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?php if ($error_reg!="") {echo"<font color=red>$error_reg</font>";} else {echo"&nbsp;";} ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_username"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="username" value="<?php echo"$_POST[username]"; ?>" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="password1" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_re_password"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="password" name="password2" size="20" maxlength="32" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_name"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="name" value="<?php echo"$_POST[name]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<tr>
								<td><?php echo"Email"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="email" value="<?php echo"$_POST[email]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<tr>
								<td><?php echo"Nick"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="nick" value="<?php echo"$_POST[nick]"; ?>" size="30" maxlength="100" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_um_level"; ?></td>
								<td valign="top">:</td>
								<td valign="top">
									<table cellpadding="0" cellspacing="0">
									<tr>
									<td valign="top">
									<input type="radio" name="admin" value="1" />
									<?php echo"$bhs_um_admin1"; ?>
									</td>
									<td valign="top">
									<input type="radio" name="admin" value="2" checked="checked"/> 
									<?php echo"$bhs_um_admin2"; ?> 
									</td>
									<td valign="top">
									<input type="radio" name="admin" value="3"/> 
									<?php echo"$bhs_um_admin3"; ?>
									</td>
									</tr>
									<tr>
									<td>									
									<input type="radio" name="admin" value="4" />
									<?php echo"$bhs_um_admin4"; ?> 
									</td>
									<td>
									<input type="radio" name="admin" value="5" />
									<?php echo"$bhs_um_admin5"; ?> 
									</td>
									<td>
									<input type="radio" name="admin" value="6" />
									<?php echo"$bhs_um_admin6"; ?> 
									</td>
                                                                                                                            
                                                      <td>
									<input type="radio" name="admin" value="7" />
									<?php echo"$bhs_um_admin7"; ?> 
									</td>
									</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_um_status"; ?></td>
								<td>:</td>
								<td>
								<input type="radio" name="status" value="0" checked="checked" />
								<?php echo"$bhs_um_pending"; ?> <input type="radio" name="status" value="1" />
								<?php echo"$bhs_um_active"; ?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" value="<?php echo"$bhs_submit"; ?>" name="submit_add_user" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
			<?php } ?>
			
		</td>
	</tr>
</table>