<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if ($levelku=="1") { ?>

<?php include("../ibunegara/preference.nav.php"); ?>

<table class="tablebg1" width="750" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/preference.png" border="0" alt="<?php echo"$bhs_pre_preference"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pre_preference"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4">
				<tr>
					<td>
						<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td>
									<?php
									$sql = mysql_query("select * from preference");
									$row = mysql_fetch_array($sql);
									?>
									<form action="../ibunegara/?file=preference" method="post" enctype="multipart/form-data">
									<table width="80%" border="0" cellpadding="2" cellspacing="0" align="center">
										<tr>
											<td width="120"><b><?php echo"$bhs_pre_change_preference"; ?></b></td>
											<td width="5">&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="3">&nbsp;</td>
										</tr>
										<tr>
											<td><?php echo"Title Web Presiden"; ?></td>
											<td>:</td>
											<td><input class="inputtext" type="text" name="title_presiden" value="<?php echo"$row[title_presiden]"; ?>" size="70" maxlength="100" /></td>
										</tr>
										<tr>
											<td><?php echo"Title Web Ibu Negara"; ?></td>
											<td>:</td>
											<td><input class="inputtext" type="text" name="title_ibunegara" value="<?php echo"$row[title_ibunegara]"; ?>" size="70" maxlength="100" /></td>
										</tr>
										<tr>
											<td><?php echo"Title Web Istana"; ?></td>
											<td>:</td>
											<td><input class="inputtext" type="text" name="title_istana" value="<?php echo"$row[title_istana]"; ?>" size="70" maxlength="100" /></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td><input class="inputsubmit" type="submit" value="Submit" name="submit_change_preference" /> <input class="inputsubmit" type="reset" value="Reset" /></td>
										</tr>
									</table>
									</form>
								</td>
							</tr>
						</table>					
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("../ibunegara/error.access.php"); } ?>