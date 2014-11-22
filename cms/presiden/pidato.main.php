<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("pidato.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_pdt_pidato"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pdt_pidato"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="70"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu"><b><?php echo"Judul"; ?></b></td>
					<td class="menu" align="center" height="30"><b><?php echo"Status"; ?></b></td>
					<td class="menu" align="center"><b><?php echo"Action"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_pidato'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				//if ($_GET['cat']!="") {
				//	$target = "file=pidato_main&amp;cat=".$_GET['cat'];
				//	$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from pidato where kategori='".$_GET['cat']."' order by waktu desc";
				//} else {
					$target = "file=pidato_main";
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from pidato order by waktu desc";
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
					<td width="70"><?php echo"$row[tanggal]"; ?></td>
					<td><div style="padding:5px 0px 5px 0px">
					<?php if($row[bahasa]==0) echo htmlentities($row[judul_id]); else {?>
					<?php echo htmlentities($row[judul_en]); }?></div></td>
					<td align="center" width="60"><?php if ($row[status]==0) echo"<div style='color:#ff0000; font-weight:bold'>Pending</div>"; else echo "<div style='color:#008000; font-weight:bold'>Published</div>"; ?></div></td>
					<td align="center" width="180">&nbsp;&nbsp;&bull;&nbsp;<a href="?file=pidato_detail&amp;id=<?php echo $row[id]; ?>">Detail</a>&nbsp;&bull;&nbsp;<?php
					if($levelku==1)
					{
					echo "<a href=\"?file=pidato_main&amp;action=status&amp;id=";
					echo $row[id];
					echo "&amp;status=";
				    echo $row[status]; 
				    echo "\">Status</a> &bull;&nbsp;";
					}else 
					echo "Status &bull;&nbsp;";
					if(($levelku==1)||(!$row[status])&&($levelku==2)||(!$row[status])&&($levelku==6))
					{
?><a href="?file=pidato_edit&amp;id=<?php echo $row[id]; ?>">Edit</a>&nbsp;&bull;&nbsp;<?php
					}
					else echo "Edit&nbsp;&bull;&nbsp;";
					if(($levelku==1))
					{
					echo "<a href=\"?file=pidato_main&amp;action=delete&amp;id=";
					echo $row[id];
					echo "\" onclick=\"return confirm('Apakah Anda yakin untuk menghapus Pidato &quot;$row[judul_id]&quot;')\">Delete</a>";
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