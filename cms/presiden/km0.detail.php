<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("km0.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"Dari Kilometer 0,00"; ?>" /></td>
					<td><font size="3"><b><?php echo"Dari Agenda"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php $detik = date("s"); $menit = date("i"); $jam = date("H"); $row[tanggal] = date("d"); $row[bulan] = date("m"); $row[tahun] = date("Y"); ?>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn  from km0 where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$row[tanggal] = $row[tanggal];
						$row[bulan] = $row[bulan];
						$row[tahun] = $row[tahun];
						?>
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Dari Agenda"; ?></b></td>
							</tr>
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Judul"; ?></td>
								<td width="10">:</td>
								<td><?php echo"$row[judul]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Tanggal"; ?></td>
								<td>:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_fks_published</font>";} else {echo"<font color='red'>$bhs_fks_pending</font>";} ?></td>
							</tr>													
							<!--<tr>
								<td><?php echo"Sumber"; ?></td>
								<td>:</td>
								<td><?php echo"$row[penulis]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"URL Sumber"; ?></td>
								<td>:</td>
								<td><?php echo"$row[media]"; ?></td>
							</tr>-->
							
							<tr>
								<td valign="top"><?php echo"Ringkasan"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[ringkasan]"; ?></td>
							</tr>
						<!--	<tr>
								<td valign="top"><?php echo"Isi Selengkapnya"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[isi]); ?></td>-->
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
