<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("pers.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_prs_pers"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_prs_pers"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from pers where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<?php if ($verify_pers!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_pers"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Kategori"; ?></td>
								<td width="10">:</td>
								<td><b><?php 
					if($row[kategori]==1)
						echo"Keterangan Pers Presiden"; 
						elseif($row[kategori]==2)
						echo"Keterangan Pers Juru Bicara Presiden"; 
						elseif($row[kategori]==3)
						echo"Pers Rilis";
					?></b></td>
							</tr>
							<tr>
								<td><?php echo"Tempat"; ?></td>
								<td>:</td>
								<td><?php echo htmlentities($row[tempat]); ?></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_fks_status"; ?></td>
								<td>:</td>
								<td><?php if($row[status]) echo "Publish"; else echo "Pending"; ?></td>
							</tr>							
							<tr>
								<td>Dokumen Pers</td>
								<td>:</td>
								<td><?php
								if($row[ContentType]=='application/pdf')
									$doktype="PDF";
									elseif($row[ContentType]=='application/msword')
										$doktype="DOC";
										else $doktype="Tidak diketahui";
								if($row[Dokumen]!='') echo "<a href='/DokumenPers.php?id=".$_GET[id]."' target=\"_blank\">Dokumen tersedia dengan format $doktype</a>";
									else echo "Dokumen Tidak Tersedia"; ?></td>
							</tr>
						</table>
<?php
if($row[english]==0)
	{
?>

						<fieldset id="indonesia_option"><br />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Ruang Pers </font></span></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Judul"; ?></td>
								<td width="10">:</td>
								<td><?php echo nl2br(htmlentities($row[judul_id])); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Keterangan Pers"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br(htmlentities($row[isi_id])); ?></td>
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
								<td width="100"><?php echo"Title "; ?></td>
								<td width="10">:</td>
								<td><?php echo nl2br(htmlentities($row[judul_en])); ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Press Conference"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br(htmlentities($row[isi_en])); ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
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