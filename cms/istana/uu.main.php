<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("../istana/uu.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/download.png" border="0" alt="<?php echo"Perundang-undangan"; ?>" /></td>
					<td><font size="3"><b><?php echo"Perundang-undangan"; ?></b></font></td>
				</tr>
			</table>
			
			<table width="100%"  border="0" cellspacing="0" cellpadding="7">
				<tr>
					<td>| <a href="../istana/?file=uu_main">Lihat Semua</a> |</td>
					<td align="right">| <a href="../istana/?file=uu_main&amp;cat=Peraturan Pemerintah">Peraturan Pemerintah</a> | <a href="../istana/?file=uu_main&amp;cat=Peraturan Presiden">Peraturan Presiden</a> | <a href="../istana/?file=uu_main&amp;cat=Keputusan Presiden">Keputusan Presiden</a> | <a href="../istana/?file=uu_main&amp;cat=Instruksi Presiden">Instruksi Presiden</a> |</td>
				</tr>
			</table>

			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="7" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" width="10" height="30">&nbsp;</td>
					<td class="menu" width="100"><b><?php echo"Kategori"; ?></b></td>
					<td class="menu" width="100"><b><?php echo"PUU"; ?></b></td>
					<td class="menu"><b><?php echo"Tentang"; ?></b></td>
					<td class="menu" width="80"><b><?php echo"Tanggal"; ?></b></td>
					<td class="menu" width="160"><b><?php echo"&nbsp;"; ?></b></td>
					<td class="menu" width="10" height="30">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="7" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				//$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_download'");
				//$rowlimit = mysql_fetch_array($sqllimit);
				//$limit = $rowlimit['jumlah'];
				$limit = 10;
				
				if ($_GET['cat']!="") {
					$target = "file=uu_main&amp;cat=".$_GET['cat'];
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from uu where kategori='".$_GET['cat']."' order by waktu desc";
				} else {
					$target = "file=download_main";
					$sql = "select *, DATE_FORMAT(waktu, '%d/%m/%Y') as tanggal from uu order by waktu desc";
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
					<td width="100"><div style="padding:5px 0px 5px 0px"><?php echo"$row[kategori]"; ?></div></td>
					<td width="100"><?php echo"$row[puu]"; ?></td>
					<td><div style="padding:5px 0px 5px 0px"><?php echo"$row[tentang]"; ?></div></td>
					<td width="80"><?php echo"$row[tanggal]"; ?></td>
					<td width="160">&nbsp;&nbsp; &bull; <a href="#">Detail</a> &bull; <a href="#">Status</a> &bull; <a href="#">Edit</a> &bull; <a href="#">Delete</a></td>
					<td width="10">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="7" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="7" height="30" align="right"><?php echo"$bhs_dwn_total"; ?> : <?php echo"$total"; ?> data</td>
				</tr>
				<tr>
					<td colspan="7">
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

<?php } else { include("../istana/error.access.php"); } ?>