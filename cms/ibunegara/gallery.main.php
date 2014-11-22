<?php 
if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); }

if($_GET["action"]=="delete")
	{
	$SQL="delete from gallery where id=".$_GET["id"];
	$objconn->dbQuery($SQL);
	}
	elseif($_GET["action"]=="status")
	{
	if($_GET['status']==0) $status=1; else $status=0;
	$SQL="update gallery set status='$status' where id=".$_GET["id"];
	$objconn->dbQuery($SQL);
	}

?>

<?php include("gallery.nav.php"); ?>
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/gallery.png" border="0" alt="<?php echo"Album Foto"; ?>" /></td>
					<td><font size="3"><b><?php echo"Album Foto"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="70"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu" width="350"><b><?php echo"Album"; ?></b></td>
					<td class="menu" align="center"><b><?php echo"Status"; ?></b></td>
					<td class="menu" align="center" height="30"><b><?php echo"Action"; ?></b></td>
					<td class="menu" width="10"><b><?php echo"&nbsp;"; ?></b></td>
				</tr>
				<tr>
					<td colspan="6" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_gallery'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				if ($_GET['cat']!="") {
					$target = "file=gallery_main&amp;cat=".$_GET['cat'];
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from gallery_album where kategori='".$_GET['cat']."' order by waktu desc";
				} else {
					$target = "file=gallery_main";
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from gallery_album order by waktu desc";
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
					<td><?php echo"$row[tanggal]"; ?></td>
					<td><div style="padding:5px 0px 5px 0px"><?php echo"$row[album]"; ?>
<?php
if($row[judul_en]!='')
	{
?>
					<hr /><?php echo"$row[judul_en]"; }?></div></td>
					<td align="center" width="60"><?php if ($row[status]==0) echo"<div style='color:#ff0000; font-weight:bold'>Pending</div>"; else echo "<div style='color:#008000; font-weight:bold'>Published</div>"; ?></div></td>
					<td align="center">&nbsp;&nbsp;&bull;&nbsp;<?php  if(($levelku==1)||(!$row[status])&&($levelku==2)||(!$row[status])&&($levelku==3))
					 { ?><a href="?file=gallery_detail&amp;id=<?php echo $row[id]; ?>">Detail</a><?php } else echo "Detail"; ?>&nbsp;&bull;&nbsp;<?php
					if($levelku==1)
					{
					echo "<a href=\"?file=gallery_main&amp;action=status&amp;id=";
					echo $row[id];
					echo "&amp;status=";
				    echo $row[status]; 
				    echo "\">Status</a> &bull;&nbsp;";
					}else 
					echo "Status &bull;&nbsp;";
					if((!$row[status])||($levelku==1))
					{
?><a href="?file=gallery_edit&amp;id=<?php echo $row[id]; ?>">Edit</a>&nbsp;&bull;&nbsp;<?php
					}
					else echo "Edit&nbsp;&bull;&nbsp;";

					if($levelku==1)
					{
					echo "<a href=\"?file=gallery_main&amp;action=delete&amp;id=";
					echo $row[id];
					echo "\" onclick=\"return confirm('Apakah Anda yakin untuk menghapus Topik &quot;$row[judul_id]&quot;')\">Delete</a>";
					}else {
?>Delete<?php
						}
?></td>
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