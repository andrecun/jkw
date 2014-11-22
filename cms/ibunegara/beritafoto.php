<?php if (($_SESSION['user']=="") && ($_SESSION['pswd']=="") && ($_SESSION['level']=="")) { echo"<meta http-equiv=refresh content='0;url=./' />"; die(); } ?>

<?php include("beritafoto.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/banner.png" border="0" alt="<?php echo"$bhs_bft_beritafoto"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_bft_beritafoto"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="12">
				<tr>
					<td valign="top">
						<?php if ($_SESSION['level']=="1") { ?>
						<!-- upload beritafoto -->
						<?php $detik = date("s"); $menit = date("i"); $jam = date("H"); $tanggal = date("d"); $bulan = date("m"); $tahun = date("Y"); ?>
						<form action="./?file=beritafoto" method="post" enctype="multipart/form-data">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td><b><?php echo"$bhs_bft_upload"; ?></b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><b>Upload File</b></td>
							</tr>
							<tr>
								<td><input class="inputtext" type="file" name="uploadfile" size="30" /><input type="hidden" name="upload" /></td>
							</tr>
							<tr>
								<td><b>Tanggal</b></td>
							</tr>
							<tr>
								<td>
									<select class="inputtext" name="tgl">
										<option value="01" <?php if ($tanggal=="01") { echo"selected"; } ?>>01</option>
										<option value="02" <?php if ($tanggal=="02") { echo"selected"; } ?>>02</option>
										<option value="03" <?php if ($tanggal=="03") { echo"selected"; } ?>>03</option>
										<option value="04" <?php if ($tanggal=="04") { echo"selected"; } ?>>04</option>
										<option value="05" <?php if ($tanggal=="05") { echo"selected"; } ?>>05</option>
										<option value="06" <?php if ($tanggal=="06") { echo"selected"; } ?>>06</option>
										<option value="07" <?php if ($tanggal=="07") { echo"selected"; } ?>>07</option>
										<option value="08" <?php if ($tanggal=="08") { echo"selected"; } ?>>08</option>
										<option value="09" <?php if ($tanggal=="09") { echo"selected"; } ?>>09</option>
										<?php for ($i=10; $i<=31; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tanggal==$i) { echo"selected"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
									<select class="inputtext" name="bln">
										<option value="01" <?php if ($bulan=="01") { echo"selected"; } ?>><?php conv_bln("01"); ?></option>
										<option value="02" <?php if ($bulan=="02") { echo"selected"; } ?>><?php conv_bln("02"); ?></option>
										<option value="03" <?php if ($bulan=="03") { echo"selected"; } ?>><?php conv_bln("03"); ?></option>
										<option value="04" <?php if ($bulan=="04") { echo"selected"; } ?>><?php conv_bln("04"); ?></option>
										<option value="05" <?php if ($bulan=="05") { echo"selected"; } ?>><?php conv_bln("05"); ?></option>
										<option value="06" <?php if ($bulan=="06") { echo"selected"; } ?>><?php conv_bln("06"); ?></option>
										<option value="07" <?php if ($bulan=="07") { echo"selected"; } ?>><?php conv_bln("07"); ?></option>
										<option value="08" <?php if ($bulan=="08") { echo"selected"; } ?>><?php conv_bln("08"); ?></option>
										<option value="09" <?php if ($bulan=="09") { echo"selected"; } ?>><?php conv_bln("09"); ?></option>
										<option value="10" <?php if ($bulan=="10") { echo"selected"; } ?>><?php conv_bln("10"); ?></option>
										<option value="11" <?php if ($bulan=="11") { echo"selected"; } ?>><?php conv_bln("11"); ?></option>
										<option value="12" <?php if ($bulan=="12") { echo"selected"; } ?>><?php conv_bln("12"); ?></option>
									</select> 
									<select class="inputtext" name="thn">
										<?php for ($i=2000; $i<=2020; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tahun==$i) { echo"selected"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><b>Ringkasan</b></td>
							</tr>
							<tr>
								<td><textarea class="inputtext" rows="3" cols="44" name="cuplikan" /></textarea></td>
							</tr>
							<tr>
								<td><b>Berita Selengkapnya</b></td>
							</tr>
							<tr>
								<td><textarea class="inputtext" rows="5" cols="44" name="isi" /></textarea></td>
							</tr>
							<tr>
								<td><font color="red"><?php echo"$bhs_bft_warning"; ?></font></td>
							</tr>
							<tr>
								<td><input class="inputsubmit" type="submit" name="submit_upload_beritafoto" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
						<?php } else {} ?>
						
						<br /><br />
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><b><?php echo"Arsip"; ?></b></td>
							</tr>
							<tr>
								<td>
									<ul>
										<li><a href="./?file=beritafoto">Terbaru...</a></li>
									<?php
									$sqlarc = mysql_query("select *,DATE_FORMAT(waktu, '%Y-%m') as arsip from beritafoto where status='1' group by arsip order by arsip desc");
									while ($rowarc=mysql_fetch_array($sqlarc)) {
										$arsip = explode("-", $rowarc[arsip]);
										$bln = $arsip[1]; $thn = $arsip[0];
									?>
										<li><a href="./?file=beritafoto&amp;bln=<?php echo"$bln"; ?>&amp;thn=<?php echo"$thn"; ?>"><?php conv_bln("$bln"); echo" $thn"; ?></a></li>
									<?php
									}
									?>
									</ul>
								</td>
							</tr>
						</table>
						
					</td>
					<td valign="top">
						<!-- beritafoto -->
						
						<?php
						if (($_GET['bln']!="") && ($_GET['thn']!="")) {
							$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn, DATE_FORMAT(waktu, '%d/%m/%Y') as waktu from beritafoto where DATE_FORMAT(waktu, '%m')='".$_GET['bln']."' and DATE_FORMAT(waktu, '%Y')='".$_GET['thn']."' order by waktu desc");
						} else {
							$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn, DATE_FORMAT(waktu, '%d/%m/%Y') as waktu from beritafoto order by waktu desc limit 0,10");
						}
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><b><?php echo"$bhs_bft_templates"; ?></b></td>
							</tr>
						<?php if (($_GET['bln']!="") && ($_GET['thn']!="")) { ?>
							<tr>
								<td><?php echo"Arsip bulan "; conv_bln($_GET['bln']); echo" ".$_GET['thn']; ?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						<?php } else { ?>
							<tr>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
								</td>
							</tr>
						<?php while ($row=mysql_fetch_array($sql)) { ?>
							<tr>
								<td>
									<?php
									list($width, $height, $type, $attr) = @getimagesize("/images/$row[pic]");
									if ($width < "300") { $panjang = $width; $lebar = $height; }
									elseif ($width > "300") { $panjang = 300; $rasio = $height/$width; $lebar = $panjang*$rasio; }
									else { $panjang = 0; $lebar = 0; }
									?>
									<img src="../../presiden/beritafoto/<?php echo"$row[pic]"; ?>" width="<?php echo"$panjang"; ?>" height="<?php echo"$lebar"; ?>" border="0" alt="<?php echo"$row[pic]"; ?>" /><br />
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="50">Tanggal</td><td width="10">:</td><td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
										</tr>
										<tr>
											<td>Cuplikan</td><td>:</td><td><?php echo"$row[cuplikan]"; ?></td>
										</tr>
										<tr>
											<td>Berita Selengkapnya</td><td>:</td><td><?php echo"$row[isi]"; ?></td>
										</tr>
										<tr>
											<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
										</tr>
									</table>
									<br />						
								</td>
							</tr>
						<?php } ?>
						</table>
					
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>