<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/pidato.nav.php"); ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/news.png" border="0" alt="<?php echo"$bhs_pdt_news"; ?>" /></td>
					<td><font size="3"><b><?php echo"$bhs_pdt_news"; ?></b></font></td>
				</tr>
			</table>
			
			<?php if (($levelku=="1") || ($levelku=="2")) { ?>
			
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="8" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
				<tr>
					<td class="menu" height="30">&nbsp;</td>
					<td class="menu">&nbsp;</td>
					<td class="menu"><b><?php echo"$bhs_pdt_category"; ?></b></td>
					<td class="menu"><b><?php echo"$bhs_pdt_category"; ?></b></td>
					<td class="menu" align="center"><b><?php echo"$bhs_pdt_action"; ?></b></td>
					<td class="menu">&nbsp;</td>
					<td class="menu" align="center"><b><?php echo"$bhs_pdt_delete"; ?></b></td>
					<td class="menu" height="30">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="8" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
			<?php
			$sql = mysql_query("select * from news_cat order by id asc");
			while($row=mysql_fetch_array($sql)) {
			$baris++; if (($baris % 2)==0){$tdcol="#eeeeee";} else {$tdcol="#ffffff";}
			?>
				<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
				<form action="../istana/?file=news_cat" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $row[id]; ?>" />
					<td width="100">&nbsp;</td>
					<td><img src="/images/cek.png" border="0" alt="" /></td>
					<td><input class="inputtext" type="text" size="25" name="kategori_id" value="<?php echo"$row[kategori_id]"; ?>" /></td>
					<td><input class="inputtext" type="text" size="25" name="kategori_en" value="<?php echo"$row[kategori_en]"; ?>" /></td>
					<td align="center"><input class="inputsubmit" type="submit" name="submit_edit_cat_news" value="<?php echo"$bhs_save_changes"; ?>" /></td>
					<td width="10">&nbsp;</td>
					<td width="40" align="center"><a href="../istana/?file=news_cat&amp;mode=submit_del_cat_news&amp;id=<?php echo $row[id]; ?>"  onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><img src="/images/del.png" border="0" alt="<?php echo"$bhs_pdt_delete"; ?>" /></a></td>
					<td width="100">&nbsp;</td>
				</form>
				</tr>
				<tr>
					<td colspan="8" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
				</tr>
			<?php
			}
			?>
			</table>
			
			<br /><br />
			
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td>
						<form action="../istana/?file=news_cat" method="post" enctype="multipart/form-data">
						<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
							<tr>
								<td colspan="3"><b><?php echo"$bhs_pdt_add_cat"; ?></b></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_category"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="kategori_id" size="50" /></td>
							</tr>
							<tr>
								<td><?php echo"$bhs_pdt_category"; ?></td>
								<td>:</td>
								<td><input class="inputtext" type="text" name="kategori_en" size="50" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input class="inputsubmit" type="submit" name="submit_add_cat_news" value="<?php echo"$bhs_submit"; ?>" />&nbsp;<input class="inputsubmit" type="reset" value="<?php echo"$bhs_reset"; ?>" /></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
			
			<?php } else { include("../istana/error.access.php"); } ?>
			
		</td>
	</tr>
</table>