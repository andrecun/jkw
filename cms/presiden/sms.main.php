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
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="200" align="center"><b><?php echo"Periode Waktu"; ?></b></td>
					<td class="menu" width="140" align="center"><b><?php echo"Total Jumlah SMS"; ?></b></td>
					<td class="menu" align="center" width="100"><b><?php echo"Status"; ?></b></td>
					<td class="menu" align="center" height="30"><b><?php echo"Action"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>

				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
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
					$sql = "select *, DATE_FORMAT(tglAwal, '%d/%m/%Y') as awal, DATE_FORMAT(tglAkhir, '%d/%m/%Y') as akhir  from sms order by tglAwal desc";
				//}
				
				$total = mysql_num_rows(mysql_query($sql));
				include("../prevnext1.php");
				$query = $sql." LIMIT $offset, $limit";
				$result = mysql_query($query);

				while ($row=mysql_fetch_array($result)) {
				$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
				?>
				<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
					<td width="10">&nbsp;</td>
					<td align="center"><?php echo"$row[awal] - $row[akhir]"; ?></td>
					<td align="center"><div style="padding:5px 0px 5px 0px"><?php echo"$row[totalSMS]"; ?></div></td>
					<td align="center"><?php if ($row[status]=='0') echo"<div style='color:#ff0000; font-weight:bold'>Pending</div>"; else echo "<div style='color:#008000; font-weight:bold'>Published</div>"; ?></div></td>
					<td width="360" align="center">&nbsp;&nbsp; &bull; <a href="./?file=sms_detail&amp;action=daftarSMS&amp;id=<?php echo $row[id]; ?>">Daftar SMS</a>&nbsp;&nbsp; &bull;&nbsp; <a href="?file=sms_detail&amp;id=<?php echo $row[id]; ?>">Lihat Laporan</a>&nbsp;&bull;&nbsp;
<?php
					if($levelku==1)
					{
					echo "<a href=\"?file=sms_main&amp;action=status&amp;id=";
					echo $row[id];
					echo "&amp;status=";
				    echo $row[status]; 
				    echo "\">Status</a> &bull;&nbsp;";
					}
					if(($levelku==1)||(!$row[status])&&($levelku==2)||(!$row[status])&&($levelku==4))
					{
?><a href="?file=sms_edit&amp;id=<?php echo $row[id]; ?>">Edit</a>&nbsp;&nbsp&bull;&nbsp; 
<?php
					}
					else echo "Edit&nbsp;&nbsp&bull;&nbsp;"; 
					if(($levelku==1)||(!$row[status])&&($levelku==2)||(!$row[status])&&($levelku==4))
					{
					echo "<a href=\"?file=sms_main&amp;action=delete&amp;id=";
					echo $row[id];
					echo "\" onclick=\"return confirm('Apakah Anda yakin untuk menghapus SMS periode &quot;$row[awal] - $row[akhir]&quot;')\">Delete</a>";
					}else {
?>Delete<?php
						}
?></td>
					<td width="10">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="6" height="30" align="right"><?php echo"$bhs_pdt_total"; ?> : <?php echo"$total"; ?> data</td>
				</tr>
				<tr>
					<td colspan="6">
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
			</table>
		</td>
	</tr>
</table>