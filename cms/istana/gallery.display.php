<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2")) { ?>

<?php include("gallery.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/gallery.png" border="0" alt="<?php echo"$bhs_gl_gallery"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_gl_gallery"; ?></b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" align="center" cellpadding="4" cellspacing="0">
				<tr>
					<td valign="top">
						<?php
						$sql = mysql_query("select * from gallery_album where album='".$_GET['album']."'");
						$row = mysql_fetch_array($sql);
						$sql2 = mysql_query("select count(*) as jumlah from gallery_pics where album='".$_GET['album']."' and pic<>''");
						$row2 = mysql_fetch_array($sql2);
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="20"><img src="/images/rightarrow.png" border="0" width="16" height="16" hspace="4" alt="" /></td>
								<td><a href="./?file=gallery_detail&amp;album=<?php echo"$row[album]"; ?>"><b><?php echo"$row[album]"; ?></b> &nbsp; (<?php echo"$row2[jumlah]"; ?> <?php if ($row2[jumlah]=="0") {echo"pic";} else {echo"pics";} ?>)</a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><?php echo"$row[keterangan]"; ?></td>
							</tr>
							<tr>
								<td colspan="2"><img src="/images/x.gif" border="0" height="4" alt="" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><a href="./?file=gallery_list&amp;album=<?php echo"$row[album]"; ?>"><img src="/images/album_list.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_list"; ?></a> &nbsp; <a href="./?file=gallery_upload&amp;album=<?php echo"$row[album]"; ?>"><img src="/images/album_upload.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_upload_pic"; ?></a> &nbsp; <a href="./?file=gallery_main&amp;mode=submit_del_album&amp;id=<?php echo $row[id]; ?>&amp;album=<?php echo"$row[album]"; ?>" onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><img src="/images/album_trash.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_del_album"; ?></a></td>
							</tr>
							<tr>
								<td colspan="2"><img src="/images/x.gif" border="0" height="4" alt="" /></td>
							</tr>
						</table>
						<hr size="1" style="background-color:#dddddd" />

						<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
							<tr>
								<td align="center">
									<select class="inputtext" onchange="javascript:if(options[selectedIndex].value!='') document.location=options[selectedIndex].value">
										<option><?php echo"$bhs_gl_select_pic"; ?></option>
									<?php
									$sql = mysql_query("select * from gallery_pics where album='".$_GET['album']."' order by id asc");
									while ($row = mysql_fetch_array($sql)) {
									?>
										<option value="?file=gallery_display&amp;album=<?php echo"$row[album]"; ?>&amp;pic=<?php echo"$row[pic]"; ?>" <?php if ($_GET['pic']==$row[pic]) {echo"selected='selected'";} else {} ?>><?php echo"$row[pic]"; ?></option>
									<?php
									}
									?>
									</select>
									<br />
									<br />
			
									<?php
									$sql2 = mysql_query("select * from gallery_pics where pic='".$_GET['pic']."'");
									$row2 = mysql_fetch_array($sql2);
									
									list($width, $height, $type, $attr) = getimagesize("../../presiden/gallery/".$_GET['album']."/".$_GET['pic']);
									//echo"width: $width, height: $height, type: $type, attr: $attr";
									
									if ($width < "400") {$panjang = $width;$lebar = $height;}
									elseif ($width > "400") {$panjang = 400;$rasio = $height/$width;$lebar = $panjang*$rasio;}
									else {$panjang = 0;$lebar = 0;}
									
									echo"<img src='../../presiden/gallery/".$_GET['album']."/".$_GET['pic']."' width='$panjang' height='$lebar' border='0' alt='' /><br /><br />$row2[deskripsi]";
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

<?php } else { include("error.access.php"); } ?>