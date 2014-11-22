<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("sms.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/sms.png" border="0" alt="<?php echo"SMS 9949"; ?>" /></td>
					<td><font size="3"><b><?php echo"SMS 9949"; ?></b></font></td>
				</tr>
			</table>
<?php if (($levelku=="1") ||($levelku=="2") ||($levelku=="4")){ ?>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
$sql = mysql_query("select *, DAYOFMONTH(tglAwal) as tglAwal, MONTH(tglAwal) as blnAwal, YEAR(tglAwal) as thnAwal, DAYOFMONTH(tglAkhir) as tglAkhir, MONTH(tglAkhir) as blnAkhir, YEAR(tglAkhir) as thnAkhir from sms where id='".$_GET['id']."'");
$row = mysql_fetch_array($sql);
						$tglAwal = $row[tglAwal];
						$blnAwal = $row[blnAwal];
						$thnAwal = $row[thnAwal];
						$tglAkhir = $row[tglAkhir];
						$blnAkhir = $row[blnAkhir];
						$thnAkhir = $row[thnAkhir];
						?>
						<form action="./?file=sms_edit&amp;id=<?php echo $_GET[id]; ?>" method="post" enctype="multipart/form-data">
						
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Data"; ?></b></td>
							</tr>
							<?php if ($verify_sms!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_sms"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Periode Waktu"; ?></td>
								<td width="10">:</td>
								<td>
									<select class="inputtext" name="tglawal">
										<option value="01" <?php if ($tglAwal=="01") { echo"selected='selected'"; } ?>>01</option>
										<option value="02" <?php if ($tglAwal=="02") { echo"selected='selected'"; } ?>>02</option>
										<option value="03" <?php if ($tglAwal=="03") { echo"selected='selected'"; } ?>>03</option>
										<option value="04" <?php if ($tglAwal=="04") { echo"selected='selected'"; } ?>>04</option>
										<option value="05" <?php if ($tglAwal=="05") { echo"selected='selected'"; } ?>>05</option>
										<option value="06" <?php if ($tglAwal=="06") { echo"selected='selected'"; } ?>>06</option>
										<option value="07" <?php if ($tglAwal=="07") { echo"selected='selected'"; } ?>>07</option>
										<option value="08" <?php if ($tglAwal=="08") { echo"selected='selected'"; } ?>>08</option>
										<option value="09" <?php if ($tglAwal=="09") { echo"selected='selected'"; } ?>>09</option>
										<?php for ($i=10; $i<=31; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tglAwal==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
									<select class="inputtext" name="blnawal">
										<option value="01" <?php if ($blnAwal=="01") { echo"selected='selected'"; } ?>><?php conv_bln("01"); ?></option>
										<option value="02" <?php if ($blnAwal=="02") { echo"selected='selected'"; } ?>><?php conv_bln("02"); ?></option>
										<option value="03" <?php if ($blnAwal=="03") { echo"selected='selected'"; } ?>><?php conv_bln("03"); ?></option>
										<option value="04" <?php if ($blnAwal=="04") { echo"selected='selected'"; } ?>><?php conv_bln("04"); ?></option>
										<option value="05" <?php if ($blnAwal=="05") { echo"selected='selected'"; } ?>><?php conv_bln("05"); ?></option>
										<option value="06" <?php if ($blnAwal=="06") { echo"selected='selected'"; } ?>><?php conv_bln("06"); ?></option>
										<option value="07" <?php if ($blnAwal=="07") { echo"selected='selected'"; } ?>><?php conv_bln("07"); ?></option>
										<option value="08" <?php if ($blnAwal=="08") { echo"selected='selected'"; } ?>><?php conv_bln("08"); ?></option>
										<option value="09" <?php if ($blnAwal=="09") { echo"selected='selected'"; } ?>><?php conv_bln("09"); ?></option>
										<option value="10" <?php if ($blnAwal=="10") { echo"selected='selected'"; } ?>><?php conv_bln("10"); ?></option>
										<option value="11" <?php if ($blnAwal=="11") { echo"selected='selected'"; } ?>><?php conv_bln("11"); ?></option>
										<option value="12" <?php if ($blnAwal=="12") { echo"selected='selected'"; } ?>><?php conv_bln("12"); ?></option>
									</select> 
									<select class="inputtext" name="thnawal">
										<?php for ($i=2000; $i<=2020; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($thnAwal==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?></select>
&nbsp;-&nbsp;&nbsp;
									<select class="inputtext" name="tglakhir">
										<option value="01" <?php if ($tglAkhir=="01") { echo"selected='selected'"; } ?>>01</option>
										<option value="02" <?php if ($tglAkhir=="02") { echo"selected='selected'"; } ?>>02</option>
										<option value="03" <?php if ($tglAkhir=="03") { echo"selected='selected'"; } ?>>03</option>
										<option value="04" <?php if ($tglAkhir=="04") { echo"selected='selected'"; } ?>>04</option>
										<option value="05" <?php if ($tglAkhir=="05") { echo"selected='selected'"; } ?>>05</option>
										<option value="06" <?php if ($tglAkhir=="06") { echo"selected='selected'"; } ?>>06</option>
										<option value="07" <?php if ($tglAkhir=="07") { echo"selected='selected'"; } ?>>07</option>
										<option value="08" <?php if ($tglAkhir=="08") { echo"selected='selected'"; } ?>>08</option>
										<option value="09" <?php if ($tglAkhir=="09") { echo"selected='selected'"; } ?>>09</option>
										<?php for ($i=10; $i<=31; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($tglAkhir==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
									<select class="inputtext" name="blnakhir">
										<option value="01" <?php if ($blnAkhir=="01") { echo"selected='selected'"; } ?>><?php conv_bln("01"); ?></option>
										<option value="02" <?php if ($blnAkhir=="02") { echo"selected='selected'"; } ?>><?php conv_bln("02"); ?></option>
										<option value="03" <?php if ($blnAkhir=="03") { echo"selected='selected'"; } ?>><?php conv_bln("03"); ?></option>
										<option value="04" <?php if ($blnAkhir=="04") { echo"selected='selected'"; } ?>><?php conv_bln("04"); ?></option>
										<option value="05" <?php if ($blnAkhir=="05") { echo"selected='selected'"; } ?>><?php conv_bln("05"); ?></option>
										<option value="06" <?php if ($blnAkhir=="06") { echo"selected='selected'"; } ?>><?php conv_bln("06"); ?></option>
										<option value="07" <?php if ($blnAkhir=="07") { echo"selected='selected'"; } ?>><?php conv_bln("07"); ?></option>
										<option value="08" <?php if ($blnAkhir=="08") { echo"selected='selected'"; } ?>><?php conv_bln("08"); ?></option>
										<option value="09" <?php if ($blnAkhir=="09") { echo"selected='selected'"; } ?>><?php conv_bln("09"); ?></option>
										<option value="10" <?php if ($blnAkhir=="10") { echo"selected='selected'"; } ?>><?php conv_bln("10"); ?></option>
										<option value="11" <?php if ($blnAkhir=="11") { echo"selected='selected'"; } ?>><?php conv_bln("11"); ?></option>
										<option value="12" <?php if ($blnAkhir=="12") { echo"selected='selected'"; } ?>><?php conv_bln("12"); ?></option>
									</select> 
									<select class="inputtext" name="thnakhir">
										<?php for ($i=2000; $i<=2020; $i++) { ?>
										<option value="<?php echo"$i"; ?>" <?php if ($thnAkhir==$i) { echo"selected='selected'"; } ?>><?php echo"$i"; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo"Jumlah Total SMS"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="total" value="<?php echo"$row[totalSMS]"; ?>" size="20" maxlength="20" /></td>
							</tr>

							<tr>
								<td valign="top"><?php echo"Isi Laporan"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="laporan"><?php echo"$row[Laporan]"; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Grafik"; ?></td>
								<td valign="top">:</td>
								<td>
								<?php if($row[image]!='') { ?>
								<img src="/imageSMS.php/<?php echo $_GET[id]; ?>.jpg" />
								<?php } else echo "File grafik tidak tersedia"; ?>
								<br />Ubah File Grafik :&nbsp;<input class="inputtext" type="file" name="grafik" size="30" /><br />&nbsp;</td>
							</tr>
							<!--<tr>
								<td valign="top"><?php echo"Upload Data SMS"; ?></td>
								<td valign="top">:</td>
								<td><input class="inputtext" type="file" name="dataSMS" size="30" /></td>
							</tr>-->
							<tr>
														
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td><?php if ($levelku!="1") { echo"$bhs_fks_pending"; echo "<input type=\"hidden\" name=\"status\" value=\"0\"";  } else { ?>
								<input type="radio" name="status" value="0"  checked='checked' /> <?php echo"$bhs_fks_pending"; ?>
								<input type="radio" name="status" value="1"/> 
								<?php echo"$bhs_fks_publish"; ?> <?php } ?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_sms" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
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