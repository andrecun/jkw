<?php 
if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); }

if($_GET["action"]=="delete")
	{
	$SQL="delete from topik where id=".$_GET["id"];
	$objconn->dbQuery($SQL);
	}
	elseif($_GET["action"]=="status")
	{
	if($_GET['status']==0) $status=1; else $status=0;
	$SQL="update topik set status='$status' where id=".$_GET["id"];
	$objconn->dbQuery($SQL);
	}

?>

<?php include("../istana/topik.nav.php"); ?>
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_tpk_topik"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_tpk_topik"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="70"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu" colspan="2"><b><?php echo"Judul"; ?></b></td>
					<td class="menu" width="10"><b><?php echo"&nbsp;"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_topik'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				//if ($_GET['cat']!="") {
				//	$target = "file=topik_main&amp;cat=".$_GET['cat'];
				//	$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from topik where kategori='".$_GET['cat']."' order by waktu desc";
				//} else {
					$target = "file=topik_main";
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from topik order by waktu desc";
				//}
				
				$total = mysql_num_rows(mysql_query($sql));
				include("../prevnext1.php");
				$query = $sql." LIMIT $offset, $limit";
				$result = mysql_query($query);

				while ($row=mysql_fetch_array($result)) {
				$baris++; if (($baris % 2)==0){$tdcol="#ffffff";} else {$tdcol="#eeeeee";}
				?>
				<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
					<td width="10">&nbsp;</td>
					<td width="70"><?php echo"$row[tanggal]"; ?></td>
					<td><div style="padding:5px 0px 5px 0px"><?php echo"$row[judul_id]"; ?><hr width="95%" align="left" /><?php echo"$row[judul_en]"; ?></div></td>
					<td align="center" width="60"><?php if ($row[status]==0) echo"<div style='color:#ff0000; font-weight:bold'>Pending</div>"; else echo "<div style='color:#008000; font-weight:bold'>Published</div>"; ?></div></td>
					<td width="160">&nbsp;&nbsp; &bull; <a href="../istana/?file=topik_detail&amp;id=<?php echo $row[id]; ?>">Detail</a> &bull; <a href="../istana/?file=topik_main&amp;action=status&amp;id=<?php echo $row[id]; ?>&amp;status=<?php echo $row[status]; ?>">Status</a> &bull; <a href="../istana/?file=topik_edit&amp;id=<?php echo $row[id]; ?>">Edit</a> &bull; <a href="../istana/?file=topik_main&amp;action=delete&amp;id=<?php echo $row[id]; ?>">Delete</a></td>
					<td width="10">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="6" height="30" align="right"><?php echo"$bhs_tpk_total"; ?> : <?php echo"$total"; ?> data</td>
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