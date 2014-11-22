<?php 
if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } 


?>

<?php include("banner.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/gallery.png" border="0" alt="<?php echo"Banner"; ?>" /></td>
					<td><font size="3"><b><?php echo"Banner"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="70"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu" colspan="2" width="500"><b><?php echo"Foto"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="160"><b><?php echo"&nbsp;"; ?></b></td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_fotorilis'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				if ($_GET['cat']!="") {
					$target = "file=banner_main&amp;cat=".$_GET['cat'];
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from banner where kategori='".$_GET['cat']."' order by waktu desc";
				} else {
					$target = "file=banner_main";
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from banner order by waktu desc";
				}
				
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
					<td colspan="2"><div style="padding:5px 0px 5px 0px"><img width="500" src="/ibunegara/imageBanner.php?id=<?php echo $row[id]; ?>"></div></td>
					<td width="10"><?php if ($row[status]==0) echo"<div style='color:#ff0000; font-weight:bold'>Pending</div>"; else echo "<div style='color:#008000; font-weight:bold'>Published</div>"; ?></div></td>
					<td width="180">&nbsp;&nbsp; &bull; <a href="./?file=banner_main&amp;action=status&amp;id=<?php echo $row[id]; ?>&amp;status=<?php echo $row[status]; ?>">Status</a> &bull; <a href="./?file=banner_main&amp;action=delete&amp;id=<?php echo $row[id]; ?>">Delete</a></td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="6" height="30" align="right"><?php echo"$bhs_fks_total"; ?> : <?php echo"$total"; ?> <?php if (($total<="1")) {echo"$bhs_fks_record";} else {echo"$bhs_fks_records";} ?></td>
				</tr>
				<tr>
					<td colspan="6">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>