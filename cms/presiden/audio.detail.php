<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("wawancara.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_wwn_news"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_wwn_news"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from wawancara where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3" valign="top"><b><?php echo"$bhs_fks_add_pidato"; ?></b></td>
							</tr>
							<tr>
								<td width="100">Tempat</td>
								<td>:</td>
								<td><?php echo $row[tempat] ?></td>
							</tr>

							<tr>
								<td valign="top" width="100"><?php echo"Tanggal"; ?></td>
								<td valign="top" width="10">:</td>
								<td valign="top"><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?>
								</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_fks_published</font>";} else {echo"<font color='red'>$bhs_fks_pending</font>";} ?></td>
							</tr>
							<tr>
								<td>Foto Ringkasan</td>
								<td>:</td>
								<td><img src="/imagePidatoR.php?id=<?php echo $_GET[id]; ?>" /></td>
							</tr>
							<tr>
								<td>Foto Detil</td>
								<td>:</td>
								<td><img src="/imagePidatoD.php?id=<?php echo $_GET[id]; ?>" /></td>
							</tr>
							<tr>
								<td width="100">Deskripsi Foto</td>
								<td>:</td>
								<td><?php echo $row[deskripsi] ?></td>
							</tr>
							<tr>
								<td>Dokumen</td>
								<td>:</td>
								<td>								<?php
								if($row[ContentTypeDokumen]=='application/pdf')
									$doktype="PDF";
									elseif($row[ContentTypeDokumen]=='application/msword')
										$doktype="DOC";
										else $doktype="Tidak diketahui";
								if($row[Dokumen]!='') echo "<a href='/DokumenPidato.php?id=".$_GET[id]."' target=\"_blank\">Dokumen tersedia dengan format $doktype</a>";
									else echo "Dokumen Tidak Tersedia"; ?>
</td>
							</tr>	
													
							<tr>
								<td colspan="3"><strong>Audio Streaming</strong></td>
							</tr>	
							<tr>
								<td width="100">Tema Siaran</td>
								<td>:</td>
								<td><?php echo $row[TemaSiaran]; ?></td>
							</tr>
							<tr>
								<td>Alamat URL WMA</td>
								<td>:</td>
								<td><?php echo $row[alamatWMA]; ?></td>
							</tr>	
							<tr>
								<td>Alamat URL MP3</td>
								<td>:</td>
								<td><?php echo $row[alamatMP3]; ?></td>
							</tr>	
														<tr>
								<td>Alamat URL OGG</td>
								<td>:</td>
								<td><?php echo $row[alamatOGG]; ?></td>
							</tr>	
							</table>
<?php
if($row[english]==0)
	{
?>
						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Isi Pidato</font></span></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Judul"; ?></td>
								<td width="10">:</td>
								<td><?php echo nl2br($row[judul_id]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan "; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[cuplikan_id]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Pidato Selengkapnya "; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[isi_id]); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
						</fieldset>
<?php
	}
	else
	{
?>
						<fieldset id="english_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;English Version </font></span></td>
							</tr>
							<tr>
								<td><?php echo"Title "; ?></td>
								<td>:</td>
								<td><?php echo nl2br($row[judul_en]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Summary"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[cuplikan_en]); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Speech in detail"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[isi_en]); ?></td>
							</tr>
						</table>
						</fieldset>
<?php
	}
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>