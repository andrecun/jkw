<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("kibar.nav.php"); ?>

<form action="?file=kibar_detail&amp;id=<?php echo $_GET[id]; ?>#terkait" method="post" enctype="multipart/form-data">
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_kb_kibar"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_kb_kibar"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam from kibar where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_kibar!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_kibar"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="50">Tanggal</td>
								<td width="5">:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn'].", ".$row['jam']." WIB"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_kb_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_kb_published</font>";} else {echo"<font color='red'>$bhs_kb_pending</font>";} ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							</table>
							<fieldset>
							<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Versi Indonesia </font></span></td>
							</tr>
							<tr>
								<td><?php echo"Sub Judul"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[subjudul_id]); ?></td>
							</tr>
							<tr>
								<td width="110"><?php echo"$bhs_kb_title"; ?></td>
								<td width="5">:</td>
								<td><?php echo htmlentities($row[judul_id]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan"; ?></td>
								<td valign="top">:</td>
								<td>
								<?php echo nl2br(htmlentities($row[cuplikan_id])); ?>
								</td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_kb_content"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br(htmlentities($row[isi_id])); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							</table>
							</fieldset>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
