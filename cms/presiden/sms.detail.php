<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php 
include("sms.nav.php"); 
if($_GET[action]!='daftarSMS')
	{
?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/sms.png" border="0" alt="<?php echo"SMS 9949"; ?>" /></td>
					<td><font size="3"><b><?php echo"SMS 9949"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
$sql = mysql_query("select *, DATE_FORMAT(tglAwal, '%d/%m/%Y') as awal, DATE_FORMAT(tglAkhir, '%d/%m/%Y') as akhir from sms where id='".$_GET['id']."'");
$row = mysql_fetch_array($sql);
						?>
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
								<td><?php echo $row[awal] ?>
&nbsp;-&nbsp;&nbsp;<?php echo $row[akhir] ?>
								</td>
							</tr>
							<tr>
														
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]!="0") {echo"<font color='blue'>$bhs_fks_published</font>";} else {echo"<font color='red'>$bhs_fks_pending</font>";} ?></td>
							</tr>
							<tr>
								<td><?php echo"Jumlah Total SMS"; ?></td>
								<td>:</td>
								<td><?php echo"$row[totalSMS]"; ?></td>
							</tr>

							<tr>
								<td valign="top"><?php echo"Isi Laporan"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[Laporan]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Upload File Grafik"; ?></td>
								<td valign="top">:</td>
								<td>						<?php
						if(strlen($row[image])>0)
							{
						?>
								<img src="/imageSMS.php?id=<?php echo $_GET[id];  ?>"/>
						<?php
							} else { echo "gambar tidak tersedia"; }
						?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Upload Data SMS"; ?></td>
								<td valign="top">:</td>
								<td><?php
								if($row[TypeData]=='application/vnd.ms-excel')
									$doktype="Microsoft Excel";
									else $doktype="Tidak diketahui";
								if($row[Data]!='') echo "<a href='DataSMS.php?id=".$_GET[id]."' target=\"_blank\">Dokumen tersedia dengan format $doktype</a>";
									else echo "Dokumen Tidak Tersedia"; ?></td>
							</tr>

						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
		}
		else
		{
?>
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>

			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="5" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="140" align="center"><b><?php echo"Waktu"; ?></b></td>
					<td class="menu" width="140" align="center"><b><?php echo"No. HP"; ?></b></td>
					<td class="menu" align="center"><b><?php echo"SMS"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
				</tr>
				<?php


				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_news'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				//if ($_GET['cat']!="") {
				//	$target = "file=sms_main&amp;cat=".$_GET['cat'];
				//	$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from sms where kategori='".$_GET['cat']."' order by waktu desc";
				//} else {
					$target = "file=sms_main";
					$sql = "select * from sms_data where sms_id = '".$_GET[id]."' order by waktu_sms desc";
				//}
				
				$total = mysql_num_rows(mysql_query($sql));
				include("../prevnext1.php");
				$query = $sql." LIMIT $offset, $limit";
				$result = mysql_query($query);

				while ($row=mysql_fetch_array($result)) {
				$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
				?>
				<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
					<td height="30">&nbsp;</td>
					<td align="left"><?php echo $row[waktu_sms]; ?></td>
					<td align="left"><?php echo $row[pengirim]; ?></td>
					<td align="center"><?php echo $row[isi]; ?></td>
					<td height="30">&nbsp;</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="5" height="30" align="right"><?php echo"$bhs_pdt_total"; ?> : <?php echo"$total"; ?> data</td>
				</tr>
				<tr>
					<td colspan="5">
						<table width="100%" bgcolor="#dddddd" border="0" cellspacing="0" cellpadding="4">
							<tr>
								<td>
									<?php
									$numlimit = mysql_num_rows($result);
									if ($numlimit!="") { include("../prevnext2.php"); }
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="5" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>




<?php
		}
?>