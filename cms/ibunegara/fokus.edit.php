<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("fokus.nav.php"); ?>
<script type="text/javascript">
<!--
function hide_them_all() {
    document.getElementById("english_option").style.display = 'none';
}

function show_checked_option() {
    hide_them_all();
    if (document.getElementById('english_version').checked) {
        document.getElementById('english_option').style.display = 'block';
    } 
}
//-->
</script>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_fks_fokus"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_fks_fokus"; ?></b></font></td>
				</tr>
			</table>
			
			<?php if (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) { ?>
			
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYOFMONTH(waktu) as tanggal, MONTH(waktu) as bulan, YEAR(waktu) as tahun, SECOND(waktu) as detik, MINUTE(waktu) as menit, HOUR(waktu) as jam from fokus where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="./?file=fokus_edit&amp;id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"$bhs_fks_edit_fokus"; ?></b></td>
							</tr>
							<?php if ($verify_fokus!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_fokus"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"$bhs_fks_date"; ?></td>
								<td width="10">:</td>
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
										<option value="<?php echo"$i"; ?>" <?php if ($tanggal==$i) { echo"selected"; } ?>><?php echo"$i"; ?></option>
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
									<input type="hidden" name="jam" value="<?php echo"$jam"; ?>" />
									<input type="hidden" name="mnt" value="<?php echo"$menit"; ?>" />
									<input type="hidden" name="dtk" value="<?php echo"$detik"; ?>" />
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td>
 <?php if ($levelku!="1") { echo"$bhs_fks_pending"; echo "<input type=\"hidden\" name=\"status\" value=\"0\"";  } else { ?>
								<input type="radio" name="status" value="0"  checked='checked' /> <?php echo"$bhs_fks_pending"; ?>
								<input type="radio" name="status" value="1"/> 
								<?php echo"$bhs_fks_publish"; ?> <?php } ?></td>
							</tr>
							<tr>
								<td valign="top">Bahasa Inggris</td>
								<td valign="top">:</td>
								<td valign="top">
								<input type="radio" name="english" value="0" <?php if($row[english]==0) echo "checked='checked'"; ?> onclick="if
                (this.checked) {
                    hide_them_all();
                 }; return true" />Tidak Tersedia<br />
								<input id="english_version" type="radio" name="english" value="1" <?php if($row[english]==1) echo "checked='checked'"; ?>  onclick="if
                (this.checked) {
                    hide_them_all();
                    document.getElementById('english_option').style.display = 'block';
                 }; return true" />Tersedia
								
								</td>
							</tr>
							<tr>
								<td valign="top">Foto Ringkasan</td>
								<td valign="top">:</td>
								<td>
						<?php
						if($row[ContentTypeR]!='')
							{
						?>
								<select class="inputtext" name="fotoR">
								<option value="0">Gambar tidak berubah</option>
								<option value="1">Gambar dihapus</option>
								</select><br />

								<img src="/ibunegara/imageR.php/<?php echo $_GET[id];  ?>.jpg"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?>
								
								<br />Ganti Foto :<br /><input class="inputtext" type="file" name="FotoRingkasan" size="60" /></td>
							</tr>
							<tr>
								<td valign="top">Foto Detil</td>
								<td valign="top">:</td>
								<td>
						<?php
						if($row[ContentTypeD]!='')
							{
						?>
								<select class="inputtext" name="fotoD">
								<option value="0">Gambar tidak berubah</option>
								<option value="1">Gambar dihapus</option>
								</select><br />

								<img src="/ibunegara/imageD.php/<?php echo $_GET[id];  ?>.jpg"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?>
								<br />Ganti Foto :<br /><input class="inputtext" type="file" name="FotoDetil" size="30" />
								</td>
							</tr>
							<tr>
								<td width="100">Deskripsi</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="deskripsi" value="<?php echo htmlentities($row[deskripsi]); ?>" size="60" /></td>
							</tr>

							</table>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Versi Indonesia </font></span></td>
							</tr>
							<tr>
								<td width="100">Sub Judul</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="subjudul_id" value="<?php echo htmlentities($row[subjudul_id]); ?>" size="60" /></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_id" value="<?php echo nl2br(htmlentities($row[judul_id])); ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan Berita "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="cuplikan_id"><?php echo htmlentities($row[cuplikan_id]); ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Berita Selengkapnya "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_id"><?php echo htmlentities($row[isi_id]); ?></textarea></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
						</fieldset>
						<fieldset id="english_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;English Version </font></span></td>
							</tr>
							<tr>
								<td width="100">Sub Title</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="subjudul_en" value="<?php echo htmlentities($row[subjudul_en]); ?>" size="60" /></td>
							</tr>
							<tr>
								<td><?php echo"Title "; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_en" value="<?php echo nl2br(htmlentities($row[judul_en])); ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Summary "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="cuplikan_en"><?php echo htmlentities($row[cuplikan_en]); ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"News "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_en"><?php echo nl2br(htmlentities($row[isi_en])); ?></textarea></td>
							</tr>
						</table>
						</fieldset>
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_fokus" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
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
<script type="text/javascript">
<!--
    show_checked_option();
//-->
</script>