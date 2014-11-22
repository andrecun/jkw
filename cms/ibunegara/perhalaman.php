<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if ($levelku=="1") { ?>

<?php include("../ibunegara/perhalaman.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/perhalaman.png" border="0" alt="<?php echo"$bhs_ph_perhalaman"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_ph_perhalaman"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
						<?php
						$sql = mysql_query("select * from perhalaman order by halaman asc");
						while($row=mysql_fetch_array($sql)) {
						$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
						?>
							<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
								<td>
									<form action="../ibunegara/?file=perhalaman" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
									<input type="hidden" name="halaman" value="<?php echo"$row[halaman]"; ?>" />
									<table width="530" border="0" cellspacing="0" cellpadding="0" align="center">
										<tr>
											<td width="30"><img src="/images/halaman.png" width="16" height="16" border="0" alt="" /></td>
											<td width="400"><?php echo"$row[keterangan]"; ?></td>
											<td width="50"><input class="inputtext" type="text" size="2" maxlength="2" name="jumlah" value="<?php echo"$row[jumlah]"; ?>" /></td>
											<td width="50"><input class="inputsubmit" type="submit" name="submit_perpage" value="<?php echo"$bhs_save_changes"; ?>" /></td>
										</tr>
									</table>
									</form>
								</td>
							</tr>
						<?php
						}
						?>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("../ibunegara/error.access.php"); } ?>