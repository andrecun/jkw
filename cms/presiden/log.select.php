<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>
<?php if($levelku=="1") { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="8">
	<tr>
		<td>
			<select class="inputtext" onchange="javascript:if(options[selectedIndex].value!='') document.location=options[selectedIndex].value">
				<option>select</option>
				<option>------</option>
				<option value="?file=log" <?php if ($_GET['file']=="log") {echo"selected='selected'";} ?>>Log</option>
				<option value="?file=logbysession" <?php if ($_GET['file']=="logbysession") {echo"selected='selected'";} ?>>Log by Session</option>
			</select>
		</td>
		<td align="right">
<!--
			<a href="./?file=log&amp;mode=submit_empty_log" onclick="return confirm('<?php echo"$bhs_confirm_del"; ?> ?')"><font style="color:white; background-color:red; font-weight:bold;"> &nbsp;&nbsp; Empty Log &nbsp; </font></a>
-->
		</td>
	</tr>
</table>
<?php } ?>