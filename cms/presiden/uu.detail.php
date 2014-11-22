<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("uu.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/download.png" border="0" alt="<?php echo"Perundang-undangan"; ?>" /></td>
					<td><font size="3"><b><?php echo"Perundang-undangan"; ?></b></font></td>
				</tr>
			</table>
			
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from uu where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<form action="./?file=uu_add" method="post" enctype="multipart/form-data">
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"$bhs_dwn_add_download"; ?></b></td>
							</tr>
							<?php if ($verify_download!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_download"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td width="100"><?php echo"Kategori"; ?></td>
								<td width="10">:</td>
								<td><?php
								if($row[kategori]==1)
									echo "Peraturan Pemerintah";
									elseif($row[kategori]==2)
									echo "Peraturan Presiden";
									elseif($row[kategori]==3)
									echo "Keputusan Presiden";
									elseif($row[kategori]==4)
									echo "Instruksi Presiden";
									?>
								</td>
							</tr>
							<tr>
								<td><?php echo"Nomor"; ?></td>
								<td>:</td>
								<td><?php 
								echo ($row[nomor]);
								 ?></td>
							</tr>
							<tr>
								<td><?php echo"Tahun"; ?></td>
								<td>:</td>
								<td><?php echo $row[tahun]; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Tentang"; ?></td>
								<td valign="top">:</td>
								<td><?php echo $row[tentang]; ?></td>
							</tr>
							<tr>
								<td><?php echo"Tempat Penetapan"; ?></td>
								<td>:</td>
								<td><?php echo $row[tempat]; ?></td>
							</tr>
							
							<tr>
								<td><?php echo"Tanggal Penetapan"; ?></td>
								<td>:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?>
								</td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Ringkasan"; ?></td>
								<td valign="top">:</td>
								<td><?php echo nl2br($row[ringkasan]); ?></td>
							</tr>							
							<tr>
								<td><?php echo"Dokumen UU"; ?></td>
								<td>:</td>
								<td><?php
								if($row[TypeD]=='application/pdf')
									$doktype="PDF";
									elseif($row[TypeD]=='application/msword')
										$doktype="DOC";
										else $doktype="Tidak diketahui";
								if($row[Dokumen]!='') echo "<a href='/DokumenUU.php?id=".$_GET[id]."' target=\"_blank\">Dokumen tersedia dengan format $doktype</a>";
									else echo "Dokumen Tidak Tersedia"; ?></td>
							</tr>
							<tr>
								<td><?php echo"Status"; ?></td>
								<td>:</td>
								<td><?php if($row[status]=='1') echo "Publish"; else echo "Pending"; ?></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("error.access.php"); } ?>