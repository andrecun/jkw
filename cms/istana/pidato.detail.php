<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/pidato.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_pdt_news"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pdt_news"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select * from pidato where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Tempat"; ?></td>
								<td width="10">:</td>
								<td><?php echo $row[tempat]; ?></td>
							</tr>
							<tr>
								<td><?php echo"Tanggal"; ?></td>
								<td>:</td>
								<td><?php echo"$row[waktu]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_id]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_en]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Sub Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[subjudul_id]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Sub Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[subjudul_en]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Berita Selengkapnya"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[isi_id]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Berita Selengkapnya"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[isi_en]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_pdt_published</font>";} else {echo"<font color='red'>$bhs_pdt_pending</font>";} ?></td>
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