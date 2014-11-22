<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>
<?php include("perspektif.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"Perspektif Lain"; ?>" /></td>
					<td><font size="3"><b><?php echo"Perspektif Lain"; ?></b></font></td>
				</tr>
			</table>
<?php if (($levelku=="1") ||($levelku=="2") ){ ?>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYOFMONTH(waktu) as tanggal, MONTH(waktu) as bulan, YEAR(waktu) as tahun, SECOND(waktu) as detik, MINUTE(waktu) as menit, HOUR(waktu) as jam from perspektif where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$row[tanggal] = $row[tanggal];
						$row[bulan] = $row[bulan];
						$row[tahun] = $row[tahun];
						?>
						<form action="./?file=perspektif_edit&amp;id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Perspektif Lain"; ?></b></td>
							</tr>
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul" value="<?php echo"$row[judul]"; ?>" size="90" /></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td>
									<select class="inputtext" name="tgl">
										<option value="01" <?php if ($row[tanggal]=="01") { echo"selected='selected'"; } ?>>01</option>
										<option value="02" <?php if ($row[tanggal]=="02") { echo"selected='selected'"; } ?>>02</option>
										<option value="03" <?php if ($row[tanggal]=="03") { echo"selected='selected'"; } ?>>03</option>
										<option value="04" <?php if ($row[tanggal]=="04") { echo"selected='selected'"; } ?>>04</option>
										<option value="05" <?php if ($row[tanggal]=="05") { echo"selected='selected'"; } ?>>05</option>
										<option value="06" <?php if ($row[tanggal]=="06") { echo"selected='selected'"; } ?>>06</option>
										<option value="07" <?php if ($row[tanggal]=="07") { echo"selected='selected'"; } ?>>07</option>
										<option value="08" <?php if ($row[tanggal]=="08") { echo"selected='selected'"; } ?>>08</option>
										<option value="09" <?php if ($row[tanggal]=="09") { echo"selected='selected'"; } ?>>09</option>
										<?php for ($i=10; $i<=31; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($row[tanggal]==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
									<select class="inputtext" name="bln">
										<option value="01" <?php if ($row[bulan]=="01") { echo"selected='selected'"; } ?>><?php conv_bln("01"); ?></option>
										<option value="02" <?php if ($row[bulan]=="02") { echo"selected='selected'"; } ?>><?php conv_bln("02"); ?></option>
										<option value="03" <?php if ($row[bulan]=="03") { echo"selected='selected'"; } ?>><?php conv_bln("03"); ?></option>
										<option value="04" <?php if ($row[bulan]=="04") { echo"selected='selected'"; } ?>><?php conv_bln("04"); ?></option>
										<option value="05" <?php if ($row[bulan]=="05") { echo"selected='selected'"; } ?>><?php conv_bln("05"); ?></option>
										<option value="06" <?php if ($row[bulan]=="06") { echo"selected='selected'"; } ?>><?php conv_bln("06"); ?></option>
										<option value="07" <?php if ($row[bulan]=="07") { echo"selected='selected'"; } ?>><?php conv_bln("07"); ?></option>
										<option value="08" <?php if ($row[bulan]=="08") { echo"selected='selected'"; } ?>><?php conv_bln("08"); ?></option>
										<option value="09" <?php if ($row[bulan]=="09") { echo"selected='selected'"; } ?>><?php conv_bln("09"); ?></option>
										<option value="10" <?php if ($row[bulan]=="10") { echo"selected='selected'"; } ?>><?php conv_bln("10"); ?></option>
										<option value="11" <?php if ($row[bulan]=="11") { echo"selected='selected'"; } ?>><?php conv_bln("11"); ?></option>
										<option value="12" <?php if ($row[bulan]=="12") { echo"selected='selected'"; } ?>><?php conv_bln("12"); ?></option>
									</select> 
									<select class="inputtext" name="thn">
										<?php for ($i=2000; $i<=2020; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($row[tahun]==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td>
 <?php if ($levelku!="1") { echo"$bhs_fks_pending";  } else { ?>
								<input type="radio" name="status" value="0" <?php if($row[status]==0) echo "checked='checked'"; ?> /> <?php echo"$bhs_fks_pending"; ?>
								<input type="radio" name="status" value="1" <?php if($row[status]==1) echo "checked='checked'"; ?> /> 
								<?php echo"$bhs_fks_publish"; ?> <?php } ?></td>
							</tr>
							<tr>
								<td><?php echo"Sumber"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="penulis" value="<?php echo"$row[penulis]"; ?>" size="60" /></td>
							</tr>
							<tr>
								<td><?php echo"URL Sumber"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="media" value="<?php echo"$row[media]"; ?>" size="60" /></td>
							</tr>
							
							<tr>
								<td valign="top"><?php echo"Ringkasan"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="8" cols="60" name="ringkasan"><?php echo"$row[ringkasan]"; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Isi Selengkapnya"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="110" name="isi"><?php echo"$row[isi]"; ?></textarea></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_perspektif" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
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
