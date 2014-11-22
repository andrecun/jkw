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
		<td width="60">
			<?php 
			if (($_GET['file']=="fokus_main") || ($_GET['file']=="fokus_add") || ($_GET['file']=="fokus_detail") || ($_GET['file']=="fokus_edit") || ($_GET['file']=="fokus_cat")) { 
				nav('on','Berita','fokus_main'); 
			} else { 
				nav('off','Berita','fokus_main'); 
			} 
			?>
		</td>
		<td width="90">
			<?php 
			if (($_GET['file']=="beritafoto_main") || ($_GET['file']=="beritafoto_add") || ($_GET['file']=="beritafoto_detail") || ($_GET['file']=="beritafoto_edit") || ($_GET['file']=="beritafoto_cat")) { 
				nav('on','Berita Foto','beritafoto_main'); 
			} else { 
				nav('off','Berita Foto','beritafoto_main'); 
			} 
			?>
		</td>

		<td width="60">
			<?php 
			if (($_GET['file']=="gallery_main") || ($_GET['file']=="gallery_detail") || ($_GET['file']=="gallery_display") || ($_GET['file']=="gallery_list") || ($_GET['file']=="gallery_upload")) { 
				nav('on','Foto','gallery_main'); 
			} else { 
				nav('off','Foto','gallery_main'); 
			} 
			?>
		</td>
		<td width="150">
			<?php 
			if (($_GET['file']=="pidato_main") || ($_GET['file']=="pidato_add") || ($_GET['file']=="pidato_detail") || ($_GET['file']=="pidato_edit") || ($_GET['file']=="pidato_cat")) { 
				nav('on','Pidato & Wawancara','pidato_main'); 
			} else { 
				nav('off','Pidato & Wawancara','pidato_main'); 
			} 
			?>
		</td>
		<td width="60">
			<?php 
			if (($_GET['file']=="kliping_main") || ($_GET['file']=="kliping_add") || ($_GET['file']=="kliping_detail") || ($_GET['file']=="kliping_edit") || ($_GET['file']=="kliping_cat")) { 
				nav('on','Kliping','kliping_main'); 
			} else { 
				nav('off','Kliping','kliping_main'); 
			} 
			?>
		</td>
		<td width="100">
			<?php 
			if (($_GET['file']=="#") || ($_GET['file']=="mutiara_add") || ($_GET['file']=="mutiara_detail") || ($_GET['file']=="mutiara_edit") || ($_GET['file']=="mutiara_cat")) { 
				nav('on','Mutiara Kata','mutiara_main'); 
			} else { 
				nav('off','Mutiara Kata','mutiara_main'); 
			} 
			?>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>