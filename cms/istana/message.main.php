<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("../istana/message.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/message.png" border="0" alt="<?php echo"$bhs_msg_message"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_msg_message"; ?></b></font></td>
				</tr>
			</table>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="70"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu" width="160"><b><?php echo"Nama"; ?></b></td>
					<td class="menu"><b><?php echo"Pesan"; ?></b></td>
					<td class="menu" width="160"><b><?php echo"&nbsp;"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_message'");
				$rowlimit = mysql_fetch_array($sqllimit);
				$limit = $rowlimit['jumlah'];
				$target = "file=message_main";
				$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from message order by waktu desc";
				$total = mysql_num_rows(mysql_query($sql));
				include("../prevnext1.php");
				$query = $sql." LIMIT $offset, $limit";
				$result = mysql_query($query);

				while ($row=mysql_fetch_array($result)) {
				$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
				?>
				<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
					<td width="10">&nbsp;</td>
					<td width="70"><?php echo"$row[tanggal]"; ?></td>
					<td width="160">
						<div style="padding:5px 0px 5px 0px">
						<?php echo"$row[nama]"; ?><br />
						<?php echo"<a href='mailto:$row[email]'>$row[email]</a>"; ?><br />
						<?php echo"$row[ip]"; ?>
						</div>
					</td>
					<td>
						<div style="padding:5px 0px 5px 0px">
						<a href="../istana/?file=message_detail&amp;id=<?php echo $row[id]; ?>">
						<?php
						$content = explode(" ", $row[pesan]);
						for ($k=0; $k < 25; $k++) {
							if ($row[baca]=="0") {echo "<b>$content[$k] </b>";} else {echo "$content[$k] ";}
						}
						?> ...
						</a>
						</div>
					</td>
					<td width="160">&nbsp;&nbsp; &bull; <a href="#">Detail</a> &bull; <a href="#">Status</a> &bull; <a href="#">Edit</a> &bull; <a href="#">Delete</a></td>
					<td width="10">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="6" height="30" align="right"><?php echo"$bhs_msg_total"; ?> : <?php echo"$total"; ?> data</td>
				</tr>
				<tr>
					<td colspan="6">
						<table width="100%" bgcolor="#dddddd" border="0" cellspacing="0" cellpadding="4">
							<tr>
								<td>
									<?php
									$numlimit = mysql_num_rows($result);
									if ($numlimit!="") { include("../prevnext2.php"); }
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("../istana/error.access.php"); } ?>