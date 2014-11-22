<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1") || ($levelku=="2") || ($levelku=="3")) { ?>

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
					$sql = mysql_query("select * from gallery_album where id='".$_GET['id']."'");
					$row = mysql_fetch_array($sql);
					$sql2 = mysql_query("select count(*) as jumlah from gallery_pics where id_album='$row[id]'");
					$row2 = mysql_fetch_array($sql2);
				
		?>
						<tr>
							<td>&nbsp;</td>
							<td valign="top"><a href="./?file=gallery_detail&amp;id=<?php echo"$row[id]"; ?>"><img src="/images/album_list.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_list"; ?></a> &nbsp; <a href="./?file=gallery_upload&amp;id=<?php echo"$row[id]"; ?>"><img src="/images/album_upload.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_upload_pic"; ?></a> &nbsp; <a href="./?file=gallery_main&amp;mode=submit_del_album&amp;id=<?php echo $row[id]; ?>" onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><img src="/images/album_trash.png" border="0" width="12" height="12" alt="" /> <?php echo"$bhs_gl_del_album"; ?></a></td>
						</tr>
						<tr>
							<td colspan="2"><img src="/images/x.gif" border="0" height="4" alt="" /></td>
						</tr>
						<tr>
							<td width="20"><img src="/images/rightarrow.png" border="0" width="16" height="16" hspace="4" alt="" /></td>
							<td><a href="./?file=gallery_detail&amp;id=<?php echo"$_GET[id]"; ?>"><b><?php echo"$row[album]"; ?></b> &nbsp; (<?php echo"$row2[jumlah]"; ?> <?php if ($row2[jumlah]=="1") {echo"pic";} else {echo"pics";} ?>)</a></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><?php echo"$row[deskripsi]"; ?></td>
						</tr>
						<tr>
							<td colspan="2"><img src="/images/x.gif" border="0" height="4" alt="" /></td>
						</tr>
					</table>
<script language="javascript1.5" type="text/javascript" >
<!--
function hapus_gambar(id)
	{
	document.pic.gambar.value=id;
	document.pic.submit();
	}
-->
</script>					
					<form name="pic" method="post" action="">
					<input type="hidden" name="gambar" value="">
					<input type="hidden" name="action" value="hapus">
					<table width='100%' border='1' align='center' cellpadding='2' cellspacing='0'>
						<tr>
						<td colspan="3">&nbsp;</td>
						</tr>
<?php
$result = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from gallery_pics where id_album='$_GET[id]'");
while ($row=mysql_fetch_array($result)) {
?>
						<tr>
						<td valign="top">
								<select class="inputtext" name="fotoD" onChange="hapus_gambar(<?php echo $row[id]; ?>);">
								<option value="0">Gambar tidak berubah</option>
								<option value="1">Gambar dihapus</option>
								</select><br />

						<img width="200" src="/ibunegara/imageGalleryD.php/<?php echo $row[id]; ?>.jpg" /><br /><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?><br /><?php echo $row[ringkasan]; ?> </td>
						<td valign="top"><?php if($row=mysql_fetch_array($result)) 
						echo  "
								<select class=\"inputtext\" name=\"fotoD\" onChange=\"hapus_gambar($row[id]);\">
								<option value=\"0\">Gambar tidak berubah</option>
								<option value=\"1\">Gambar dihapus</option>
								</select><br />
<img width=\"200\" src=\"/ibunegara/imageGalleryD.php/$row[id].jpg \" /><br />";
?>
<?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?>
<?php echo "<br>".$row[ringkasan]; ?></td>
						<td valign="top"><?php if($row=mysql_fetch_array($result)) 
						echo  "
								<select class=\"inputtext\" name=\"fotoD\" onChange=\"hapus_gambar($row[id]);\">
								<option value=\"0\">Gambar tidak berubah</option>
								<option value=\"1\">Gambar dihapus</option>
								</select><br />						
						<img width=\"200\" src=\"/ibunegara/imageGalleryD.php/$row[id].jpg \" /><br />";
						?>
<?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?>
<?php echo "<br>".$row[ringkasan]; ?></td>

						</tr>						

<?php
	}
?>
					<hr size="2" style="background-color:#dddddd" />
					</table>
					</form>
					<br /><br />
							
					<?php $target = "file=gallery_detail&amp;album=$row[album]"; ?>
					<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
					<?php if($navigation=="words") { ?>
						<tr>
							<td width="50%" align="right"><?php if($i<=$num_pp){}else{echo "<a href='".$PHP_SELF."?$target&amp;page=$from'>&laquo;&laquo; [Previous]</a>";} ?></td>
							<td width="50%" align="left"><?php if($i<$total){echo "<a href='".$PHP_SELF."?$target&amp;page=$pp'>[Next] &raquo;&raquo;</a>";} ?></td>
						</tr>
					<?php } ?>
					</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("error.access.php"); } ?>