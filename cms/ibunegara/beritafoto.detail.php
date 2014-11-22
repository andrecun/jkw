<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("beritafoto.nav.php"); ?>

<form action="./?file=beritafoto_detail" method="post" enctype="multipart/form-data">
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_fks_beritafoto"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_fks_beritafoto"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn  from beritafoto where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_beritafoto!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_beritafoto"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_fks_published</font>";} else {echo"<font color='red'>$bhs_fks_pending</font>";} ?></td>
							</tr>
							<tr>
								<td valign="top">Foto Ringkasan</td>
								<td valign="top">:</td>
								<td>
						<?php
						if(strlen($row[FotoR])>0)
							{
						?>
								<img src="/ibunegara/imageBeritafotoR.php/<?php echo $_GET[id];  ?>.jpg"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?></td>
							</tr>
							<tr>
								<td valign="top">Foto Detil</td>
								<td valign="top">:</td>
								<td>
						<?php
						if(strlen($row[FotoD])>0)
							{
						?>
								<img src="/ibunegara/imageBeritafotoD.php/<?php echo $_GET[id];  ?>.jpg"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?></td>
							</tr>
							<tr>
								<td width="100">Deskripsi</td>
								<td>:</td>
								<td><?php echo $row[deskripsi]; ?></td>
							</tr>
							</table>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Berita Foto </font></span></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Judul"; ?></td>
								<td width="10">:</td>
								<td><?php echo $row[judul]; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan Berita "; ?></td>
								<td valign="top">:</td>
								<td><?php echo $row[Ringkasan]; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Berita Selengkapnya "; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[isi]); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>							
						</table>
						</fieldset>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>