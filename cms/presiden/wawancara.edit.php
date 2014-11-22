<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("wawancara.nav.php"); ?>
<script type="text/javascript">
<!--
function hide_them_all() {
    document.getElementById("english_option").style.display = 'none';
    document.getElementById("indonesia_option").style.display = 'none';
}

function show_checked_option() {
    hide_them_all();
    if (document.getElementById('english_version').checked) {
        document.getElementById('english_option').style.display = 'block';
    } 
    if (document.getElementById('indonesia_version').checked) {
        document.getElementById('indonesia_option').style.display = 'block';
    } 
}
//-->
</script>
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_pdt_wawancara"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pdt_wawancara"; ?></b></font></td>
				</tr>
			</table>
			
<?php if (($levelku=="1") ||($levelku=="2") ||($levelku=="6")){ ?>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYOFMONTH(waktu) as tanggal, MONTH(waktu) as bulan, YEAR(waktu) as tahun, SECOND(waktu) as detik, MINUTE(waktu) as menit, HOUR(waktu) as jam from wawancara where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="./?file=wawancara_edit&amp;id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3" valign="top"><b><?php echo"$bhs_fks_add_wawancara"; ?></b></td>
							</tr>
							<?php if ($verify_wawancara!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_wawancara"; ?></font></td>
							</tr>
							<?php } ?>
														<tr>
								<td width="100">Tempat</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="tempat" value="<?php echo htmlentities($row[tempat]); ?>" size="60" /></td>
							</tr>

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
										<?php for ($i=$tahun-5; $i<=$tahun+5; $i++) { ?>
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
								<td valign="top">Bahasa</td>
								<td valign="top">:</td>
								<td valign="top">
								<input id="indonesia_version" type="radio" name="english" value="0"<?php
								if($row[bahasa]==0) echo "checked='checked'"; ?> onclick="if
                (this.checked) {
					document.getElementById('indonesia_option').style.display = 'block';
					document.getElementById('english_option').style.display = 'none';
                 }; return true" />Indonesia&nbsp;
								<input id="english_version" type="radio" name="english" value="1" <?php
								if($row[bahasa]==1) echo "checked='checked'"; ?> onclick="if
                (this.checked) {
					document.getElementById('indonesia_option').style.display = 'none';
                    document.getElementById('english_option').style.display = 'block';
                 }; return true" />Inggris
								
								</td>
							</tr>
							<tr>
								<td valign="top">Foto Ringkasan</td>
								<td valign="top">:</td>
								<td valign="top">
								<?php if($row[FotoRingkasan]!='') { ?>
								<select class="inputtext" name="fotoR">
								<option value="0">Gambar tidak berubah</option>
								<option value="1">Gambar dihapus</option>
								</select><br />								
								<img src="/imageWawancaraR.php/<?php echo $_GET[id]; ?>.jpg" />
								<?php } else echo "Foto ringkasan tidak tersedia"; ?>								
								<br />
								Ganti dengan foto ringkasan yang lain :<br />
								<input class="inputtext" type="file" name="FotoRingkasan" size="30" /></td>
							</tr>
							<tr>
								<td valign="top">Foto Detail</td>
								<td valign="top">:</td>
								<td valign="top">
								<?php if($row[FotoDetil]!='') { ?>
								<select class="inputtext" name="fotoD">
								<option value="0">Gambar tidak berubah</option>
								<option value="1">Gambar dihapus</option>
								</select><br />
								<img src="/imageWawancaraD.php/<?php echo $_GET[id]; ?>.jpg" />
								<?php } else echo "Foto Detail tidak tersedia"; ?>
								<br />
								Ganti dengan foto detail yang lain :<br />								
								<input class="inputtext" type="file" name="FotoDetil" size="30" /></td>
							</tr>
							<tr>
								<td width="100">Deskripsi Foto</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="deskripsi" value="<?php echo htmlentities($row[deskripsi]); ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top">Upload Dokumen</td>
								<td valign="top">:</td>
								<td valign="top">
								<?php
								if($row[ContentTypeDokumen]=='application/pdf')
									$doktype="PDF";
									elseif($row[ContentTypeDokumen]=='application/msword')
										$doktype="DOC";
										else $doktype="tidak diketahui";
								if($row[Dokumen]!='') {
								?>
								<select class="inputtext" name="dokumen">
								<option value="0">Dokumen tidak berubah</option>
								<option value="1">Dokumen dihapus</option>
								</select><br />
								<?php								
								echo "<a href='/DokumenWawancara.php?id=".$_GET[id]."' target=\"_blank\">Dokumen tersedia dengan format $doktype</a>";
									}
									else echo "Dokumen Tidak Tersedia"; ?>
								<br />
								Ganti dengan dokumen yang lain :<br />
								<input class="inputtext" type="file" name="Dokumen" size="30" /></td>
							</tr>	
													
							<tr>
								<td colspan="3"><strong>Audio Streaming</strong></td>
							</tr>	
							<tr>
								<td width="100">Tema Siaran</td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="TemaSiaran" value="<?php echo htmlentities($row[TemaSiaran]); ?>" size="60" /></td>
							</tr>

							</table>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Isi Wawancara</font></span></td>
							</tr>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_id" value="<?php echo stripslashes(htmlentities($row[judul_id])); ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="ringkasan_id"><?php echo $row[cuplikan_id]; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Wawancara Selengkapnya "; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_id"><?php echo $row[isi_id]; ?></textarea></td>
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
								<td><?php echo"Title "; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_en" value="<?php echo stripslashes(htmlentities($row[judul_en])); ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Summary"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="ringkasan_en"><?php echo $row[cuplikan_en]; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Speech in detail"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_en"><?php echo $row[isi_en]; ?></textarea></td>
							</tr>
						</table>
						</fieldset>
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_wawancara" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
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

