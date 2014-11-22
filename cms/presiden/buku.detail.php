<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("buku.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"Buku"; ?>" /></td>
					<td><font size="3"><b><?php echo"Buku"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from buku where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="./?file=buku_detail&amp;id=<?php echo $_GET[id]; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Buku"; ?></b></td>
							</tr>
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td><?php echo"Judul"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_id]"; ?></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
                                                                                    <tr>
								<td width="100"><?php echo"Cover"; ?></td>
								<td width="10">:</td>
								<td><img src="/imageC.php/<?php echo $_GET[id];  ?>.jpg"/></td>
							</tr>
							<tr>
								<td><?php echo"Cuplikan"; ?></td>
								<td>:</td>
								<td><?php echo"$row[cuplikan_id]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Isi "; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[isi_id]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td> <?php if($row[status]==1) echo"Published"; else echo"Pending"; ?></td>
							</tr>
						</table>
                                    
                                    
                                    
                                    <?php if (($levelku=="1") ||($levelku=="2") ){ ?>
						<fieldset>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
							<tr>
								<td height="24" colspan="3" bgcolor="#283E6F"><span style="font-weight: bold; font-size: 12px"><font color="#ffffff"> &nbsp;Link Terkait</font></span></td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>
						</table><a name="terkait"></a>
						<table width="100%">
<?php
if(isset($verify_buku_link))
{
?>
							<tr>
								<td colspan="4"><?php echo "$verify_buku_link"; ?></td>
							</tr>
						
<?php

}
if($_GET['d']=="edit")
{
$sql="select judul_link, url_link, ringkasan, id as id_link from buku_link where id='".$_GET['id_link']."'";
$row=$objconn->dbQueryArray($sql);
?>
							<tr>
								<td colspan="4"><strong>Perubahan Link Terkait</strong></td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>
							<tr>
								<td width="100">Judul</td>
								<td width="10">:</td>
								<td colspan="2"><input class="inputtext" type="text" name="judul_link" size="60" value="<?php echo htmlentities($row[0]['judul_link']); ?>" /></td>
							</tr>
							<tr>
								<td>URL</td>
								<td>:</td>
								<td colspan="2"><input class="inputtext" type="text" name="url_link" size="60" value="<?php echo htmlentities($row[0][url_link]); ?>" /></td>
							</tr>
							<tr>
								<td valign="top">Ringkasan</td>
								<td valign="top">:</td>
								<td colspan="2"><textarea class="inputtext" rows="5" cols="60" name="ringkasan"><?php echo htmlentities($row[0]['ringkasan']); ?></textarea></td>
							</tr>
							<tr>
								<td><input type="hidden" name="id_link" value="<?php echo $row[0][id_link]; ?>" />&nbsp;</td>
								<td>&nbsp;</td>
								<td colspan="2"><input class="inputsubmit" type="submit" name="edit_link_buku" value="Kirim"/>&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
							<tr>
								<td colspan="4"><hr /></td>
							</tr>

<?php
}
else
{
if(!isset($verify_buku_link))
{
?>

							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><strong>Penambahan Link Terkait</strong></td>
							</tr>

<?php
}
$sql="select *, id as id_link from buku_link where buku_id='".$_GET['id']."' order by id desc limit 0,5";
if($row=$objconn->dbQueryArray($sql))
for($i=0;$i<sizeof($row);$i++)
	{
?>
							<tr>
								<td width="100"><?php echo"Judul"; ?></td>
								<td width="10">:</td>
								<td width="65%"><a href="<?php echo htmlentities($row[$i][url_link]); ?>"><?php echo htmlentities($row[$i][judul_link]); ?></a></td>
								<td align="right">&bull;<a href="?file=buku_detail&amp;id=<?php echo $_GET[id]; ?>&amp;d=edit&amp;id_link=<?php echo htmlentities($row[$i][id_link]); ?>#terkait"> Perubahan</a> &bull; <a onclick="return confirm('Hapus links terkait?');" href="?file=buku_detail&amp;id=<?php echo $_GET[id]; ?>&amp;d=del&amp;id_link=<?php echo htmlentities($row[$i][id_link]); ?>#terkait"> Hapus</a></td>
							</tr>
							<tr>
								<td><?php echo"Ringkasan"; ?></td>
								<td>:</td>
								<td colspan="2"><?php echo htmlentities($row[$i][ringkasan]); ?></td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><hr /></td>
							</tr>
<?php
	}

?>
							<tr>
								<td>Judul</td>
								<td>:</td>
								<td colspan="2"><input class="inputtext" type="text" name="judul_link" size="60" /></td>
							</tr>
							<tr>
								<td>URL</td>
								<td>:</td>
								<td colspan="2"><input class="inputtext" type="text" name="url_link" size="60" /></td>
							</tr>
							<tr>
								<td valign="top">Ringkasan</td>
								<td valign="top">:</td>
								<td colspan="2"><textarea class="inputtext" rows="5" cols="60" name="ringkasan"></textarea></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td colspan="2"><input class="inputsubmit" type="submit" name="submit_link_buku" value="Kirim" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
<?php
}
?>						</table>
						</fieldset>						
<?php
}
?>	
                                    
                                    
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>