<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/topik.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_tpk_topik"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_tpk_topik"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select * from topik where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_topik!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_topik"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td><?php echo"$row[waktu]"; ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">Versi Indonesia</td>
							</tr>
							<tr>
								<td colspan="3"><hr /></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_id]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Keyword"; ?></td>
								<td>:</td>
								<td><?php echo"$row[keyword_id]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Cuplikan"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[cuplikan_id]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Berita Selengkapnya"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[isi_id]"; ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">English Version</td>
							</tr>
							<tr>
								<td colspan="3"><hr /></td>
							</tr>
							<tr>
								<td><?php echo"Title"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_en]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Keyword"; ?></td>
								<td>:</td>
								<td><?php echo"$row[keyword_en]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Summary"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[cuplikan_en]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"News"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[isi_en]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_tpk_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_tpk_published</font>";} else {echo"<font color='red'>$bhs_tpk_pending</font>";} ?></td>
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