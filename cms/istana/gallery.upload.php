<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php 
if($_GET[id]!='')
if (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) { ?>

<?php include("gallery.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/gallery.png" border="0" alt="<?php echo"$bhs_gl_gallery"; ?><�"></td>
					<td><font size="3"><b><?php echo"$bhs_gl_gallery"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td valign="top">
						<?php
						$sql = mysql_query("select * from gallery_album where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						$sql2 = mysql_query("select count(id) as jumlah from gallery_pics where id_album='".$_GET['id']."'");
						$row2 = mysql_fetch_array($sql2);
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="20"><img src="/images/rightarrow.png" border="0" width="16" height="16" hspace="4"></td>
								<td><a href="./?file=gallery_detail&amp;album=<?php echo"$row[album]"; ?>"><b><?php echo"$row[album]"; ?></b> &nbsp; (&nbsp;<?php if ($row2[jumlah]>0) echo $row2[jumlah]; else echo "0"; ?> <?php if ($row2[jumlah]==1) {echo"pic";} else {echo"pics";} ?>&nbsp;)</a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><?php echo"$row[deskripsi]"; ?></td>
							</tr>
							<tr>
								<td colspan="2"><img src="/images/x.gif" border="0" height="4"></td>
							</tr>
						</table>
						<hr size="1" color="#cccccc">
<?php $detik = date("s"); $menit = date("i"); $jam = date("H"); $tanggal = date("d"); $bulan = date("m"); $tahun = date("Y"); ?>
						<form action="./?file=gallery_detail&amp;id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width="70%" border="0" align="center" cellpadding="1" cellspacing="0">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_gl_upload_pic"; ?></b></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_gl_pic"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="file" name="FotoD" size="50"><input type='hidden' name='upload<?php echo"$i"; ?>'></td>
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
								<td><?php echo"$bhs_gl_desc"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="deskripsi" size="50" maxlength="255"></td>
							</tr>
							<tr>
								<td><?php echo"ringkasan"; ?></td>
								<td>:</td>
								<td><textarea class="inputtext" rows="5" cols="60" name="ringkasan"></textarea></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_upload_gallery" value="<?php echo"$bhs_submit"; ?>">&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>"></td>
							</tr>
						</table>
						</form>		
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("error.access.php"); } ?>