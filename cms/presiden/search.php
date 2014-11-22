<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("search.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/search.png" border="0" alt="<?php echo"$bhs_sch_search"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_sch_search"; ?></b></font></td>
				</tr>
			</table>
			
			<?php if (($_GET[file]=="search") && ($_GET[keyword]!="") && ($_GET[tabel]!="")) { ?>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<?php
				$sqllimit = mysql_query("select jumlah from perhalaman where halaman='admin_search'");
				$rowlimit = mysql_fetch_array($sqllimit);
				$limit = $rowlimit['jumlah'];
				
				$_GET['keyword'] = ereg_replace('<[^>]*>','',$_GET['keyword']);
				$_GET['tabel'] = ereg_replace('<[^>]*>','',$_GET['tabel']);
				$kword = strtolower($_GET['keyword']);
				$kw = explode(" ", $kword);
				$numkw = count($kw);
				$target = "file=search&amp;keyword=".$_GET['keyword']."&amp;tabel=".$_GET['tabel'];
				
				switch ($_GET['tabel']) {
					case "news":
						$kolom1 = "judul_id";
						$kolom2 = "isi_id";
						$syarat = "status='1'";
					break;
					case "data":
						$kolom1 = "judul_id";
						$kolom2 = "isi_id";
						$syarat = "status='1'";
					break;
					case "focus":
						$kolom1 = "judul_id";
						$kolom2 = "isi_id";
						$syarat = "status='1'";
					break;
					case "pages":
						$kolom1 = "title";
						$kolom2 = "detail1";
						$syarat = "status='1'";
					break;
					case "download":
						$kolom1 = "judul_id";
						$kolom2 = "isi_id";
						$syarat = "status='1'";
					break;
					case "message":
						$kolom1 = "topik";
						$kolom2 = "pesan";
						$syarat = "status='1'";
					break;
					default:
						$kolom1 = "";
						$kolom2 = "";
						$syarat = "";
					break;
				}
				
				switch ($numkw) {
					case "1":
						$sql = "select * 
								from ".$_GET['tabel']." 
								where 
									lower($kolom1) like '%$kw[0]%' or lower($kolom2) like '%$kw[0]%' 
								having $syarat 
								";
					break;
					case "2":
						$sql = "select * 
								from ".$_GET['tabel']." 
								where 
									lower($kolom1) like '%$kw[0]%' or lower($kolom2) like '%$kw[0]%' or 
									lower($kolom1) like '%$kw[1]%' or lower($kolom2) like '%$kw[1]%' 
								having $syarat
								";
					break;
					case "3":
						$sql = "select * 
								from ".$_GET['tabel']." 
											where 
									lower($kolom1) like '%$kw[0]%' or lower($kolom2) like '%$kw[0]%' or 
									lower($kolom1) like '%$kw[1]%' or lower($kolom2) like '%$kw[1]%' or 
									lower($kolom1) like '%$kw[2]%' or lower($kolom2) like '%$kw[2]%' 
								having $syarat
								";
					break;
					case "4":
						$sql = "select * 
								from ".$_GET['tabel']." 
								where 
									lower($kolom1) like '%$kw[0]%' or lower($kolom2) like '%$kw[0]%' or 
									lower($kolom1) like '%$kw[1]%' or lower($kolom2) like '%$kw[1]%' or 
									lower($kolom1) like '%$kw[2]%' or lower($kolom2) like '%$kw[2]%' or 
									lower($kolom1) like '%$kw[3]%' or lower($kolom2) like '%$kw[3]%' 
								having $syarat
								";
					break;
					case "5":
						$sql = "select * 
								from ".$_GET['tabel']." 
								where 
									lower($kolom1) like '%$kw[0]%' or lower($kolom2) like '%$kw[0]%' or 
									lower($kolom1) like '%$kw[1]%' or lower($kolom2) like '%$kw[1]%' or 
									lower($kolom1) like '%$kw[2]%' or lower($kolom2) like '%$kw[2]%' or 
									lower($kolom1) like '%$kw[3]%' or lower($kolom2) like '%$kw[3]%' or 
									lower($kolom1) like '%$kw[4]%' or lower($kolom2) like '%$kw[4]%' 
								having $syarat
								";
					break;
					default:
						$sql = "";
					break;
				}
				
				$totalrecord = mysql_query($sql);
				$total = mysql_num_rows($totalrecord);
				include("../prevnext1.php");
				$query = $sql." LIMIT $offset, $limit";
				$result = mysql_query($query);
				
				$numchar = strlen($kw[0]);
				?>
				<tr bgcolor="#dddddd">
					<td class="menu" height="30"> &nbsp;&nbsp; <?php echo"$bhs_sch_result_for_keyword : <b>".$_GET[keyword]."</b>"; ?> 
						<?php if ($numchar<="2") { ?>
							(<?php echo"0 $bhs_sch_record"; ?>)
						<?php } else { ?>
							(<?php echo"$total"; ?> <?php if (($total<="1")) {echo"$bhs_sch_record";} else {echo"$bhs_sch_records";} ?>)
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<?php
				if ($total=="0") {
				?>
				<tr>
					<td>
						<font color="red"><b><?php echo"$bhs_sch_no_result"; ?></b></font>
						<p><a href="http://www.google.com/search?q=<?php echo $_GET['keyword']; ?>" target="_blank" title="look up &quot;<?php echo $_GET['keyword']; ?>&quot; on Google">Click here</a> to try the search on Google.com</p>
					</td>
				</tr>
				<?php
				} elseif ($numchar<="2") {
				?>
				<tr>
					<td><font color="red"><b><?php echo"$bhs_sch_min_3_char"; ?></b></font></td>
				</tr>
				<?php
				} else {
				while ($row=mysql_fetch_array($result)) {
				?>
				<tr bgcolor="#ffffff" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '#ffffff')">
					<td>
						<div style="padding:4px">
						<?php
						if ($_GET['tabel']=="news") {
							$sqlres = mysql_query("select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from news where judul_id='$row[judul_id]' or isi_id='$row[isi_id]' having status='1' order by waktu desc");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=news_detail&amp;id=$rowres[id]'><b>$rowres[judul_id]</b></a> - $rowres[tgl] "; conv_bln("$rowres[bln]"); echo" $rowres[thn]<br />";
							$rowres[isi_id] = ereg_replace('<[^>]*>',' ',$rowres[isi_id]);
							for ($k=0; $k < 250; $k++) { echo $rowres[isi_id][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=news_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=news_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						if ($_GET['tabel']=="data") {
							$sqlres = mysql_query("select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from data where judul_id='$row[judul_id]' or isi_id='$row[isi_id]' having status='1' order by waktu desc");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=data_detail&amp;id=$rowres[id]'><b>$rowres[judul_id]</b></a> - $rowres[tgl] "; conv_bln("$rowres[bln]"); echo" $rowres[thn]<br />";
							$rowres[isi_id] = ereg_replace('<[^>]*>',' ',$rowres[isi_id]);
							for ($k=0; $k < 250; $k++) { echo $rowres[isi_id][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=data_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=data_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						elseif ($_GET['tabel']=="focus") {
							$sqlres = mysql_query("select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from focus where judul_id='$row[judul_id]' or isi_id='$row[isi_id]' having status='1' order by waktu desc");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=focus_detail&amp;id=$rowres[id]'><b>$rowres[judul_id]</b></a> - $rowres[tgl] "; conv_bln("$rowres[bln]"); echo" $rowres[thn]<br />";
							$rowres[isi_id] = ereg_replace('<[^>]*>',' ',$rowres[isi_id]);
							for ($k=0; $k < 250; $k++) { echo $rowres[isi_id][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=focus_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=focus_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						elseif ($_GET['tabel']=="pages") {
							$sqlres = mysql_query("select * from pages where title='$row[title]' or detail1='$row[detail1]' having status='1' order by title asc");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=pages_detail&amp;id=$rowres[id]'><b>$rowres[title]</b></a><br />";
							$rowres[detail1] = ereg_replace('<[^>]*>',' ',$rowres[detail1]);
							for ($k=0; $k < 250; $k++) { echo $rowres[detail1][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=pages_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=pages_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						if ($_GET['tabel']=="download") {
							$sqlres = mysql_query("select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from download where judul_id='$row[judul_id]' or isi_id='$row[isi_id]' having status='1' order by waktu desc");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=download_detail&amp;id=$rowres[id]'><b>$rowres[judul_id]</b></a> - $rowres[tgl] "; conv_bln("$rowres[bln]"); echo" $rowres[thn]<br />";
							$rowres[isi_id] = ereg_replace('<[^>]*>',' ',$rowres[isi_id]);
							for ($k=0; $k < 250; $k++) { echo $rowres[isi_id][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=download_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=download_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						elseif ($_GET['tabel']=="message") {
							$sqlres = mysql_query("select * from message where topik='$row[topik]' or pesan='$row[pesan]' having status='1'");
							$rowres = mysql_fetch_array($sqlres);
							echo"<a href='$PHP_SELF?file=message_detail&amp;id=$rowres[id]'><b>$rowres[topik]</b></a><br />";
							$rowres[pesan] = ereg_replace('<[^>]*>',' ',$rowres[pesan]);
							for ($k=0; $k < 250; $k++) { echo $rowres[pesan][$k]; }
							echo"...<br>";
							echo"<small><a href='$PHP_SELF?file=message_detail&amp;id=$rowres[id]'>$domain$PHP_SELF?file=message_detail&amp;id=$rowres[id]</a></small>";
							echo"<br>";
						} 
						else {}
						?>
						</div>
					</td>
				</tr>
				<tr>
					<td bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td height="30" align="right"><?php echo"$bhs_sch_total"; ?> : <?php echo"$total"; ?> <?php if (($total<="1")) {echo"$bhs_sch_record";} else {echo"$bhs_sch_records";} ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" bgcolor="#dddddd" border="0" cellspacing="0" cellpadding="4">
							<tr>
								<td>
									<?php
									$numlimit = mysql_num_rows($result);
									if ($numlimit!="") {
									echo"<div>";
									include("../prevnext2.php");
									echo"</div>";
									}
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php
				}
				?>				
			</table>
			
			<?php } else { ?>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td><font color="red"><b><?php echo"No Keyword !!"; ?></b></font></td>
				</tr>
			</table>
			<?php } ?>
			
			<br /><br />
			
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td height="60" align="center" valign="middle"><?php include("search.inc2.php"); ?></td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>