<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("../istana/uu.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/download.png" border="0" alt="<?php echo"Perundang-undangan"; ?>" /></td>
					<td><font size="3"><b><?php echo"Perundang-undangan"; ?></b></font></td>
				</tr>
			</table>
			
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php $detik = date("s"); $menit = date("i"); $jam = date("H"); $tanggal = date("d"); $bulan = date("m"); $tahun = date("Y"); ?>
						<form action="../istana/?file=uu_add" method="post" enctype="multipart/form-data">
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"$bhs_dwn_add_download"; ?></b></td>
							</tr>
							<?php if ($verify_download!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_download"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Kategori"; ?></td>
								<td width="10">:</td>
								<td>
									<select class="inputtext" name="kategori">
										<option value="" selected="selected">Pilih Kategori</option>
										<option value="">-------</option>
										<option value="Peraturan Pemerintah">Peraturan Pemerintah</option>
										<option value="Peraturan Presiden">Peraturan Presiden</option>
										<option value="Keputusan Presiden">Keputusan Presiden</option>
										<option value="Instruksi Presiden">Instruksi Presiden</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo"PUU"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="puu" value="<?php echo"$puu"; ?>" size="40" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Tentang"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="12" cols="120" name="tentang"><?php echo"$tentang"; ?></textarea></td>
							</tr>
							<tr>
								<td><?php echo"Tanggal"; ?></td>
								<td>:</td>
								<td>
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
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo"LN"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="ln" value="<?php echo"$ln"; ?>" size="40" /></td>
							</tr>
							<tr>
								<td><?php echo"TLN"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="tln" value="<?php echo"$tln"; ?>" size="40" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Keterangan"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="10" cols="120" name="keterangan"><?php echo"$keterangan"; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Detail"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="detail"><?php echo"$detail"; ?></textarea></td>
							</tr>
							<tr>
								<td><?php echo"Upload File"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="file" name="file" value="<?php echo"$file"; ?>" size="40" /></td>
							</tr>
							<tr>
								<td><?php echo"Status"; ?></td>
								<td>:</td>
								<td><input type="radio" name="status" value="0" /> <?php echo"$bhs_dwn_pending"; ?> <?php if (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) { ?> <input type="radio" name="status" value="1" checked="checked" /> <?php echo"$bhs_dwn_publish"; ?> <?php } else { } ?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_add_download" value="<?php echo"$bhs_submit"; ?>" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("../istana/error.access.php"); } ?>