<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("kliping.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_kli_news"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_kli_news"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from kliping where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[judul]); ?></td>
							</tr>
							<tr>
								<td><?php echo"Nama Sumber"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[sumber]); ?></td>
							</tr>
							<tr>
								<td><?php echo"URL Sumber"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[url]); ?></td>
							</tr>
							<tr>
								<td><?php echo"Status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_kli_published</font>";} else {echo"<font color='red'>$bhs_kli_pending</font>";} ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>