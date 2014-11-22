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
<?php if (($levelku=="1") ||($levelku=="2")||($levelku=="3") ){ ?>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYOFMONTH(waktu) as tanggal, MONTH(waktu) as bulan, YEAR(waktu) as tahun, SECOND(waktu) as detik, MINUTE(waktu) as menit, HOUR(waktu) as jam from fotorilis where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="./?file=fotorilis_edit&amp;id=<?php echo $row[id]; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3" valign="top"><b><?php echo"Edit Rilis Foto"; ?></b></td>
							</tr>
							<?php if ($verify_fotorilis!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_fotorilis"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td valign="top" width="100"><?php echo"Tanggal"; ?></td>
								<td valign="top" width="10">:</td>
								<td valign="top">
									<select class="inputtext" name="tgl">
										<option value="01" <?php if ($tanggal=="01") { echo"selected='selected'"; } ?>>01</option>
										<option value="02" <?php if ($tanggal=="02") { echo"selected='selected'"; } ?>>02</option>
										<option value="03" <?php if ($tanggal=="03") { echo"selected='selected'"; } ?>>03</option>
										<option value="04" <?php if ($tanggal=="04") { echo"selected='selected'"; } ?>>04</option>
										<option value="05" <?php if ($tanggal=="05") { echo"selected='selected'"; } ?>>05</option>
										<option value="06" <?php if ($tanggal=="06") { echo"selected='selected'"; } ?>>06</option>
										<option value="07" <?php if ($tanggal=="07") { echo"selected='selected'"; } ?>>07</option>
										<option value="08" <?php if ($tanggal=="08") { echo"selected='selected'"; } ?>>08</option>
										<option value="09" <?php if ($tanggal=="09") { echo"selected='selected'"; } ?>>09</option>
										<?php for ($i=10; $i<=31; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tanggal==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
									<select class="inputtext" name="bln">
										<option value="01" <?php if ($bulan=="01") { echo"selected='selected'"; } ?>><?php conv_bln("01"); ?></option>
										<option value="02" <?php if ($bulan=="02") { echo"selected='selected'"; } ?>><?php conv_bln("02"); ?></option>
										<option value="03" <?php if ($bulan=="03") { echo"selected='selected'"; } ?>><?php conv_bln("03"); ?></option>
										<option value="04" <?php if ($bulan=="04") { echo"selected='selected'"; } ?>><?php conv_bln("04"); ?></option>
										<option value="05" <?php if ($bulan=="05") { echo"selected='selected'"; } ?>><?php conv_bln("05"); ?></option>
										<option value="06" <?php if ($bulan=="06") { echo"selected='selected'"; } ?>><?php conv_bln("06"); ?></option>
										<option value="07" <?php if ($bulan=="07") { echo"selected='selected'"; } ?>><?php conv_bln("07"); ?></option>
										<option value="08" <?php if ($bulan=="08") { echo"selected='selected'"; } ?>><?php conv_bln("08"); ?></option>
										<option value="09" <?php if ($bulan=="09") { echo"selected='selected'"; } ?>><?php conv_bln("09"); ?></option>
										<option value="10" <?php if ($bulan=="10") { echo"selected='selected'"; } ?>><?php conv_bln("10"); ?></option>
										<option value="11" <?php if ($bulan=="11") { echo"selected='selected'"; } ?>><?php conv_bln("11"); ?></option>
										<option value="12" <?php if ($bulan=="12") { echo"selected='selected'"; } ?>><?php conv_bln("12"); ?></option>
									</select> 
									<select class="inputtext" name="thn">
										<?php for ($i=2000; $i<=2020; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tahun==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td>
 <?php if ($levelku!="1") { echo"$bhs_fks_pending";  } else { ?>
								<input type="radio" name="status" value="0" <?php if($row[status]==0) echo "checked='checked'"; ?> /> <?php echo"$bhs_fks_pending"; ?>
								<input type="radio" name="status" value="1" <?php if($row[status]==1) echo "checked='checked'"; ?> /> 
								<?php echo"$bhs_fks_publish"; ?> <?php } ?></td>
							</tr>
							<tr>
								<td>Foto Detail</td>
								<td>:</td>
								<td>
								<?php if($row[FotoDetil]!='') { ?>
								<img src="/imageFotorilisD.php/<?php echo $_GET[id]; ?>.jpg" />
								<?php } else echo "Foto Detail tidak tersedia"; ?><br />
								Mengganti Gambar Detail :<br />
								<input class="inputtext" type="file" name="FotoDetil" size="30" /></td>
							</tr>
							<tr>
								<td width="200">Deskripsi</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="deskripsi" value="<?php echo"$row[deskripsi]"; ?>" size="60" /></td>
							</tr>
							<tr>
								<td colspan="3"><strong>Upload Foto Versi Download</strong></td>
							</tr>							
							<tr>
								<td>Mengganti Foto Ukuran 1024 x 768 pixel, 150 dpi</td>
								<td>:</td>
								<td><input class="inputtext" type="file" name="Foto150" size="30" /></td>
							</tr>
							<tr>
								<td>Mengganti Foto Ukuran 1024 x 768 pixel, 300 dpi</td>
								<td>:</td>
								<td><input class="inputtext" type="file" name="Foto300" size="30" /></td>
							</tr>
							
							</table>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Keterangan</font></span></td>
							</tr>
							<tr>
								<td><?php echo"Judul Rilis Foto"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul" value="<?php echo $row[judul]; ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Penjelasan Singkat"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="isi"><?php echo $row[isi]; ?></textarea></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
						</fieldset>
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_fotorilis" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
<?php } else { include("error.access.php"); } ?>
		</td>
	</tr>
</table>