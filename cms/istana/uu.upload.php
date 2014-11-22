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
			
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td>
						<?php
						$sql = mysql_query("select * from download where id='".$_GET['id']."'");
						$row = mysql_fetch_array($sql);
						?>
						<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
							<tr>
								<td width="100"><?php echo"$bhs_dwn_title"; ?></td>
								<td width="10">:</td>
								<td><?php echo"$row[judul_id]"; ?></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_dwn_title"; ?></td>
								<td>:</td>
								<td><?php echo"$row[judul_en]"; ?></td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_dwn_content"; ?></td>
								<td valign="top">:</td>
								<td><?php $row[isi_id] = ereg_replace('<[^>]*>',' ',$row[isi_id]); for ($k=0; $k < 300; $k++) { echo $row[isi_id][$k]; } ?> ...</td>
							</tr>
							<tr>
								<td valign="top"><?php echo"$bhs_dwn_content"; ?></td>
								<td valign="top">:</td>
								<td><?php $row[isi_en] = ereg_replace('<[^>]*>',' ',$row[isi_en]); for ($k=0; $k < 300; $k++) { echo $row[isi_en][$k]; } ?> ...</td>
							</tr>
							<tr>
								<td><?php echo"$bhs_dwn_status"; ?></td>
								<td>:</td>
								<td><?php if ($row[status]=="1") {echo"<font color='blue'>$bhs_dwn_published</font>";} elseif ($row[status]=="0") {echo"<font color='red'>$bhs_dwn_pending</font>";} else {} ?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<a href="../istana/?file=uu_detail&amp;id=<?php echo $row[id]; ?>"><img src="/images/view.png" border="0" alt="<?php echo"$bhs_dwn_view"; ?>" /></a>
									
									<?php if ($row[status]=="0") { ?>
										<a href="../istana/?file=uu_upload&amp;mode=submit_publish_download&amp;id=<?php echo $row[id]; ?>"><img src="/images/publish.png" border="0" alt="<?php echo"$bhs_dwn_publish"; ?>" /></a>
									<?php } elseif ($row[status]=="1") { ?>
										<a href="../istana/?file=uu_upload&amp;mode=submit_pending_download&amp;id=<?php echo $row[id]; ?>"><img src="/images/unpublish.png" border="0" alt="<?php echo"$bhs_dwn_pending"; ?>" /></a>
									<?php } else {} ?>
									
									<a href="../istana/?file=uu_edit&amp;id=<?php echo $row[id]; ?>"><img src="/images/edit.png" border="0" alt="<?php echo"$bhs_dwn_edit"; ?>" /></a>
									
									<a href="../istana/?file=uu_main&amp;mode=submit_del_download&amp;id=<?php echo $row[id]; ?>"  onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><img src="/images/del.png" border="0" alt="<?php echo"$bhs_dwn_delete"; ?>" /></a>
								</td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php
									$sqlfl = mysql_query("select * from download_file where pid='$row[id]' order by id asc");
									?>
									<table width="80%" border="0" cellpadding="4" cellspacing="1" align="center">
										<tr bgcolor="#dddddd">
											<td width="30" align="center"><b><?php echo"$bhs_dwn_number"; ?></b></td>
											<td><b><?php echo"$bhs_dwn_deskripsi"; ?></b></td>
											<td width="40" align="center"><b><?php echo"$bhs_dwn_download"; ?></b></td>
											<td width="40" align="center"><b><?php echo"$bhs_dwn_delete"; ?></b></td>
										</tr>
									<?php
									$i='1'; 
									while ($rowfl = mysql_fetch_array($sqlfl)) {
										$imgsize = filesize('../download/upload/'.$rowfl[file]);
										$imagesize = round($imgsize, 0);
									?>
										<tr bgcolor="#ffffff">
											<td width="30" align="center"><?php echo"$i"; ?></td>
											<td><?php echo"$rowfl[file]"; ?> &nbsp; (<?php if ($imagesize<1024) {echo"$imagesize byte";} else {$imagesize = $imagesize/1024; $imagesize = round($imagesize, 0); echo"$imagesize Kb";} ?>)</td>
											<td width="40" align="center"><a href="../download/upload/<?php echo"$rowfl[file]"; ?>" target="_blank"><img src="/images/save.png" border="0" width="16" height="16" alt="<?php echo"$bhs_dwn_save"; ?>" /></a></td>
											<td width="40" align="center"><a href="../istana/?file=uu_upload&amp;id=<?php echo"$rowfl[pid]"; ?>&amp;upload=<?php echo"$rowfl[file]"; ?>&amp;mode=submit_del_download_file&amp;idfile=<?php echo"$rowfl[id]"; ?>" onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><img src="/images/del2.png" border="0" width="16" height="16" alt="<?php echo"$bhs_dwn_delete"; ?>" /></a></td>
										</tr>
									<?php
									$i++; 
									} 
									?>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<form action="../istana/?file=uu_upload&amp;id=<?php echo $row[id]; ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="pid" value="<?php echo $row[id]; ?>" />
									<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td colspan="3"><a name="uploadfile"></a><b><?php echo"$bhs_dwn_upload_file"; ?></b></td>
										</tr>
										<tr>
											<td width="100"><?php echo"$bhs_dwn_file"; ?></td>
											<td width="10">:</td>
											<td><input class="inputtext" type="file" name="uploadfile" size="50" /><input type='hidden' name='upload' /></td>
										</tr>
										<!--
										<tr>
											<td><?php echo"$bhs_dwn_deskripsi"; ?></td>
											<td>:</td>
											<td><input class="inputtext" type="text" size="50" maxlength="255" name="deskripsi_id" /></td>
										</tr>
										<tr>
											<td><?php echo"$bhs_dwn_deskripsi"; ?></td>
											<td>:</td>
											<td><input class="inputtext" type="text" size="50" maxlength="255" name="deskripsi_en" /></td>
										</tr>
										-->
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td><input class="inputsubmit" type="submit" name="submit_upload_download_file" value="<?php echo"$bhs_submit"; ?>" /> <input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
										</tr>
									</table>
									</form>
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