<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("mutiara.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"Mutiara Kata"; ?>" /></td>
					<td><font size="3"><b><?php echo"Mutiara Kata"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from mutiara where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						
						$detik = $row[detik];
						$menit = $row[menit];
						$jam = $row[jam];
						$tanggal = $row[tanggal];
						$bulan = $row[bulan];
						$tahun = $row[tahun];
						?>
						<form action="./?file=mutiara_edit&amp;id=<?php echo $_GET[id]; ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
						<input type="hidden" name="penulis" value="<?php echo"$userku"; ?>" />
						<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
							<tr>
								<td colspan="3"><b><?php echo"Tambah Mutiara Kata"; ?></b></td>
							</tr>
							<?php if ($verify_news!="") { ?>
							<tr>
								<td colspan="3"><font color="red"><?php echo"$verify_news"; ?></font></td>
							</tr>
							<?php } ?>
							<tr>
								<td><?php echo"Tempat"; ?></td>
								<td>:</td>
								<td><?php echo"$row[tempat]"; ?></td>
							</tr>
							<tr>
								<td width="100"><?php echo"Tanggal"; ?></td>
								<td width="10">:</td>
								<td><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></td>
							</tr>
							<tr>
								<td><?php echo"Nama Event"; ?></td>
								<td>:</td>
								<td><?php echo"$row[event]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"Isi Mutiara Kata"; ?></td>
								<td valign="top">:</td>
								<td><?php echo"$row[mutiara]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_status"; ?></td>
								<td>:</td>
								<td> <?php echo"$bhs_fks_pending"; ?></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>