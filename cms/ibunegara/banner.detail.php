<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("pers.nav.php"); ?>
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/gallery.png" border="0" alt="<?php echo"Rilis Foto"; ?>" /></td>
					<td><font size="3"><b><?php echo"Rilis Foto"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from fotorilis where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<form action="./?file=fotorilis_add" method="post" enctype="multipart/form-data">
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3" valign="top"><b><?php echo"Tambah Rilis Foto"; ?></b></td>
							</tr>
							<?php if ($verify_fotorilis!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_fotorilis"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td valign="top" width="100"><?php echo"Tanggal"; ?></td>
								<td valign="top" width="10">:</td>
								<td valign="top"><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td><?php if($row[status]) echo "Publish"; else echo "Pending"; ?></td>
							</tr>
							<tr>
								<td>Foto Detil</td>
								<td>:</td>
								<td><?php if(strlen($row['FotoDetil'])>0) { ?>
								<img src="/imageFotorilisD.php?id=<?php echo $_GET[id]; ?>" />
								<?php } ?></td>
							</tr>
							<tr>
								<td width="200">Deskripsi</td>
								<td>:</td>
								<td><?php echo $row[deskripsi]; ?></td>
							</tr>
							<tr>
								<td colspan="3"><strong>Upload Foto Versi Download</strong></td>
							</tr>							
							<tr>
								<td>Foto Ukuran 1024 x 768 pixel, 150 dpi</td>
								<td>:</td>
								<td><?php
								if($row[Foto150]!='') echo "<a href='/imageFotorilis150.php?id=".$_GET[id]."' target=\"_blank\">Foto Tersedia untuk 1024 x 768, 150 dpi</a>";
									else echo "Foto 1024 x 768, 150 dpi Tidak Tersedia"; ?></td>
							</tr>
							<tr>
								<td>Foto Ukuran 1024 x 768 pixel, 300 dpi</td>
								<td>:</td>
								<td><?php
								if($row[Foto150]!='') echo "<a href='/imageFotorilis300.php?id=".$_GET[id]."' target=\"_blank\">Foto Tersedia untuk 1024 x 768, 300 dpi</a>";
									else echo "Foto 1024 x 768, 300 dpi Tidak Tersedia"; ?></td>
							</tr>
							
							</table>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Keterangan</font></span></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Judul Rilis Foto"; ?></td>
								<td width="10">:</td>
								<td><?php echo nl2br($row[judul]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Penjelasan Singkat"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[isi]); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
						</fieldset>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>