<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/pidato.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_pdt_news"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pdt_news"; ?></b></font></td>
				</tr>
			</table>
			
			<?php if (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) { ?>
			
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYOFMONTH(waktu) as tanggal, MONTH(waktu) as bulan, YEAR(waktu) as tahun, SECOND(waktu) as detik, MINUTE(waktu) as menit, HOUR(waktu) as jam from pidato where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="../istana/?file=pidato_edit&amp;id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"$bhs_pdt_edit_news"; ?></b></td>
							</tr>
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"$bhs_pdt_date"; ?></td>
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
								<td><?php echo"$bhs_pdt_category"; ?></td>
								<td>:</td>
								<td>
									<select class="inputtext" name="kategori">
										<option value=""><?php echo"$bhs_pdt_select_category"; ?></option>
										<option value="">---</option>
										<?php
										$sqlkat = mysql_query("select * from news_cat order by id asc");
										while ($rowkat = mysql_fetch_array($sqlkat)) {
										?>
										<option value="<?php echo"$rowkat[id]"; ?>" <?php if ($row[kategori]==$rowkat[id]) {echo"selected='selected'";} ?>><?php echo"$rowkat[kategori_id] / $rowkat[kategori_en]"; ?></option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_source"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="sumber" value="<?php echo"$row[sumber]"; ?>" size="40" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_title"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_id" value="<?php echo"$row[judul_id]"; ?>" size="60" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_title"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="judul_en" value="<?php echo"$row[judul_en]"; ?>" size="60" /></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_pdt_content"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_id"><?php echo"$row[isi_id]"; ?></textarea></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_pdt_content"; ?></td>
								<td valign="top">:</td>
								<td><textarea class="inputtext" rows="25" cols="120" name="isi_en"><?php echo"$row[isi_en]"; ?></textarea></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td>
								<?php if ($row[status]=="0") { ?>
									<input type="radio" name="status" value="0" checked="checked" /> <?php echo"$bhs_pdt_pending"; ?> <input type="radio" name="status" value="1" /> <?php echo"$bhs_pdt_publish"; ?>
								<?php } elseif ($row[status]=="1") { ?>
									<input type="radio" name="status" value="0" /> <?php echo"$bhs_pdt_pending"; ?> <input type="radio" name="status" value="1" checked="checked" /> <?php echo"$bhs_pdt_publish"; ?>
								<?php } ?>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_edit_news" value="<?php echo"$bhs_submit"; ?>" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
			
			<?php } else { include("../istana/error.access.php"); } ?>
			
		</td>
	</tr>
</table>