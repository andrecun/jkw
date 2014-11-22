<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("message.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/message.png" border="0" alt="<?php echo"$bhs_msg_message"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_msg_message"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select * from message where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<tr>
								<td width="100"><?php echo"$bhs_msg_date"; ?></td>
								<td width="10">:</td>
								<td>
									<?php
									$waktu1 = explode(" ", $row[waktu]);
									$waktu2 = explode("-", $waktu1[0]);
									echo"$waktu2[2] "; conv_bln("$waktu2[1]"); echo" $waktu2[0]";
									?>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_msg_ip"; ?></td>
								<td>:</td>
								<td><?php echo"$row[ip]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_msg_name"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[nama]); ?></td>
							</tr>
							<tr>
								<td><?php echo"Email"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[email]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_msg_detail"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br(htmlentities($row[pesan])); ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_msg_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"Approved";} else {echo"Pending";} ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<?php if ($row[balasan]!="") { ?>
							<tr>
								<td valign="top"><?php echo"$bhs_msg_reply"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br(htmlentities($row[balasan])); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<?php } ?>

						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("error.access.php"); } ?>