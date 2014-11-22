<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php if (($levelku=="1")||($_GET[mod]!="")) { ?>

<?php include("log.nav.php");
$target = "file=log&amp;mod=$_GET[mod]";
 ?>

<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/log.png" border="0" alt="Log" /></td>
					<td><font size="3"><b>Log</b></font></td>
				</tr>
			</table>
			<table class="tablebg1" width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<?php include("log.select.php"); ?>
						<form method="post" action="./?<?php echo"$target"; ?><?php if ($_GET['showold']!="") {echo"&showold=".$_GET['showold'];} ?><?php if ($_GET['page']!="") {echo"&page=".$_GET['page'];} ?>">
						<table width='100%' border='0' bgcolor="#ffffff" align='center' cellpadding='0' cellspacing='0'>
							<tr bgcolor="dddddd">
								<td class="menu" height="30">&nbsp;</td>
								<td class="menu"><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=username&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b>Username</b><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=username&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
								<td class="menu"><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=ip&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b>IP</b><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=ip&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
								<td class="menu"><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=logtime&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b>LogTime</b><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=logtime&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
								<td class="menu"><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=act&amp;sort=asc"><img src="/images/asc.png" border="0" alt="asc" hspace="2" /></a><b>Act</b><a href="./?file=log&amp;mod=<?php echo $_GET[mod]; ?>&amp;order=act&amp;sort=desc"><img src="/images/desc.png" border="0" alt="desc" hspace="2" /></a></td>
								<td class="menu"><b>Object</b></td>
								<td class="menu" height="30">&nbsp;</td>
							</tr>
						<?php
						$limit = 20;
	
						// username - asc
						if (($_GET['order']=="username") && ($_GET['sort']=="asc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=username&amp;sort=asc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by username asc";
								else
								$sql = "select * from log order by username asc";
						}
						// username - desc
						elseif (($_GET['order']=="username") && ($_GET['sort']=="desc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=username&amp;sort=desc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by username desc";
								else
								$sql = "select * from log order by username desc";
						}
						// ip - asc
						elseif (($_GET['order']=="ip") && ($_GET['sort']=="asc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=ip&amp;sort=asc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by ip asc";
								else
								$sql = "select * from log order by ip asc";
						}
						// ip - desc
						elseif (($_GET['order']=="ip") && ($_GET['sort']=="desc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=ip&amp;sort=desc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by ip desc";
								else
								$sql = "select * from log order by ip desc";
						}
						// logtime - asc
						elseif (($_GET['order']=="logtime") && ($_GET['sort']=="asc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=logtime&amp;sort=asc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by logtime asc";
								else
								$sql = "select * from log order by logtime asc";
						}
						// logtime - desc
						elseif (($_GET['order']=="logtime") && ($_GET['sort']=="desc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=logtime&amp;sort=desc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by logtime desc";
								else
								$sql = "select * from log order by logtime desc";
						}
						// act - asc
						elseif (($_GET['order']=="act") && ($_GET['sort']=="asc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=act&amp;sort=asc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by act asc";
								else
								$sql = "select * from log order by act asc";
						}
						// act - desc
						elseif (($_GET['order']=="act") && ($_GET['sort']=="desc")) {
							$target = "file=log&amp;mod=$_GET[mod]&amp;order=act&amp;sort=desc";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by act desc";
								else
								$sql = "select * from log order by act desc";
						}
						// default
						else {
							$target = "file=log&amp;mod=$_GET[mod]";
							if($_GET[mod]!="")
								$sql = "select * from log where module='$_GET[mod]' order by logtime desc";
								else
								$sql = "select * from log order by logtime desc";
						}
	
						$total = mysql_num_rows(mysql_query($sql));
						include("../prevnext1.php");
						$query = $sql." LIMIT $offset, $limit";
						$result = mysql_query($query);

						$i=0;
						while ($row=mysql_fetch_array($result)) {
							$baris++; if (($baris % 2)==0){ $tdcol="#eeeeee"; } else { $tdcol="#ffffff"; }
						?>
							<tr bgcolor="<?php echo"$tdcol"; ?>" onmouseover="setPointer(this, '#ADD6FF')" onmouseout="setPointer(this, '<?php echo"$tdcol"; ?>')">
								<td width="30" align="center"><input type="checkbox" <?php if ($_GET['cek']=="check") {echo"checked='checked'";} elseif ($_GET['cek']=="nocheck") {} else {} ?> name="<?php echo"check[$i]"; ?>" /><input type="hidden" name="<?php echo"id[$i]"; ?>" value="<?php echo $row[id]; ?>" /></td>
								<td><?php echo"$row[username]"; ?></td>
								<td><?php echo"$row[ip]"; ?></td>
								<td><?php echo"$row[logtime]"; ?></td>
								<td><?php echo"$row[act]"; ?></td>
								<td><?php echo"$row[object]"; ?></td>
								<td width="30" align="center"><?php if($levelku=='0') { ?><input class="inputsubmit" type="submit" name="submit_del_log" value=" X " /><?php } ?></td>
							</tr>
							<tr>
								<td colspan="7" bgcolor="#dddddd"><img src="/images/x.gif" border="0" alt="" /></td>
							</tr>
						<?php
						$i ++;
						}
						?>
<?php if($levelku=='1') { ?>
							<tr bgcolor="dddddd">

								<td colspan="7" height="20"><!--<a href="./?<?php echo"$target"; ?><?php if ($_GET['showold']!="") {echo"&amp;showold=".$_GET['showold'];} ?><?php if ($_GET['page']!="") {echo"&amp;page=".$_GET['page'];} ?>&amp;cek=check">Check All</a> / <a href="./?<?php echo"$target"; ?><?php if ($_GET['showold']!="") {echo"&amp;showold=".$_GET['showold'];} ?><?php if ($_GET['page']!="") {echo"&amp;page=".$_GET['page'];} ?>&amp;cek=nocheck">Uncheck All</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="inputsubmit" type="submit" name="submit_del_log" value="Delete Record" />--></td>

							</tr>
<?php } ?>
							<tr bgcolor="dddddd">
								<td colspan="7" align="right">Total : <?php echo"$total"; ?> <?php if (($total<="1")) {echo"record";} else {echo"records";} ?></td>
							</tr>
							<tr bgcolor="dddddd">
								<td colspan="7" height="20" valign="bottom">
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
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php } else { include("error.access.php"); } ?>