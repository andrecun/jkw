<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php
function nav($mode,$page,$link) {
	switch($mode){
		case "on":
			echo"<div style='background-color:#eeeeee; padding:4px; border-right: solid 1px #102d6a;'>&nbsp;&nbsp;<a href='?file=$link'><b>$page</b></a>&nbsp;&nbsp;</div>";
		break;
		case "off":
			echo"<div style='background-color:#3872b2; padding:4px; border-right: solid 1px #102d6a;'>&nbsp;&nbsp;<a href='?file=$link'><font color='#ffffff'>$page</font></a>&nbsp;&nbsp;</div>";
		break;
		default:
			echo "";
		break;		
	}
}
?>
<table width="100%" bgcolor="#102d6A" border="0" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td width="5">&nbsp;</td>
		<td width="100">
			<?php 
			if (($_GET['file']=="pernakpernik_main") || ($_GET['file']=="pernakpernik_add") || ($_GET['file']=="pernakpernik_detail") || ($_GET['file']=="pernakpernik_edit") || ($_GET['file']=="pernakpernik_cat")) { 
				nav('on','Pernak Pernik','pernakpernik_main'); 
			} else { 
				nav('off','Pernak Pernik','pernakpernik_main'); 
			} 
			?>		</td>
		<td width="75">
			<?php 
			if (($_GET['file']=="gallery_main") || ($_GET['file']=="gallery_detail") || ($_GET['file']=="gallery_display") || ($_GET['file']=="gallery_list") || ($_GET['file']=="gallery_upload")) { 
				nav('on','Foto','gallery_main'); 
			} else { 
				nav('off','Foto','gallery_main'); 
			} 
			?>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>