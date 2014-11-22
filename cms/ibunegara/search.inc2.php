<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<form action="../ibunegara/?file=search&amp;keyword=<?php echo $_GET[keyword]; ?>&amp;tabel=<?php echo $_GET[tabel]; ?>" method="get">
&nbsp;<?php echo"$bhs_sch_search "; ?>&nbsp;
<input type="hidden" name="file" value="search" />
<input class="inputtext" type="text" name="keyword" value="<?php echo $_GET[keyword]; ?>" size="20" maxlength="255" />
&nbsp;<?php echo"$bhs_sch_at "; ?>&nbsp;
<select class="inputtext" name="tabel">
	<option value=""><?php //echo"$bhs_sch_select"; ?></option>
	<option value="news" <?php if ($_GET[tabel]=="news") {echo"selected='selected'";} ?>><?php echo"$bhs_news"; ?></option>
	<option value="data" <?php if ($_GET[tabel]=="data") {echo"selected='selected'";} ?>><?php echo"$bhs_data"; ?></option>
	<option value="focus" <?php if ($_GET[tabel]=="focus") {echo"selected='selected'";} ?>><?php echo"$bhs_focus"; ?></option>
	<option value="pages" <?php if ($_GET[tabel]=="pages") {echo"selected='selected'";} ?>><?php echo"$bhs_pages"; ?></option>
	<option value="download" <?php if ($_GET[tabel]=="download") {echo"selected='selected'";} ?>><?php echo"$bhs_download"; ?></option>
	<option value="message" <?php if ($_GET[tabel]=="message") {echo"selected='selected'";} ?>><?php echo"$bhs_message"; ?></option>
</select>
&nbsp;<input class="inputsubmit" type="submit" value="<?php echo"$bhs_sch_submit"; ?>" />
</form>