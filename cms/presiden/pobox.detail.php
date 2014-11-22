<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("pobox.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/pobox.png" border="0" alt="<?php echo"PO BOX 9949"; ?>" /></td>
					<td><font size="3"><b><?php echo"PO BOX 9949"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
$sql = mysql_query("select *, DATE_FORMAT(tglAwal, '%d/%m/%Y') as awal, DATE_FORMAT(tglAkhir, '%d/%m/%Y') as akhir from pobox where id='".$_GET['id']."'");
$row = mysql_fetch_array($sql);
						$tglAwal = $row[tglAwal];
						$blnAwal = $row[blnAwal];
						$thnAwal = $row[thnAwal];
						$tglAkhir = $row[tglAkhir];
						$blnAkhir = $row[blnAkhir];
						$thnAkhir = $row[thnAkhir];
						?>
						<form action="./?file=pobox_edit&amp;id=<?php echo $row[id]; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Laporan"; ?></b></td>
							</tr>
							<?php if ($verify_pobox!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_pobox"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Periode Waktu"; ?></td>
								<td width="10">:</td>
								<td><?php echo $row[awal] ?>
&nbsp;-&nbsp;&nbsp;<?php echo $row[akhir] ?>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_fks_published</font>";} else {echo"<font color='red'>$bhs_fks_pending</font>";} ?></td>
							</tr>							
							<tr>
								<td valign="top"><?php echo"Isi Laporan"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[laporan]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Upload File Grafik"; ?></td>
								<td valign="top">:</td>
								<td><?php
						if(strlen($row[grafik])>0)
							{
						?>
								<img src="/imagePOBOX.php?id=<?php echo $_GET[id];  ?>"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>