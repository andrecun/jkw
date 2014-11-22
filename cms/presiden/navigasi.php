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
		<td>
			<?php 
			if (($_GET['file']=="topik_main") || ($_GET['file']=="topik_add") || ($_GET['file']=="topik_detail") || ($_GET['file']=="topik_edit") || ($_GET['file']=="topik_cat")) { 
				nav('on','Topik','topik_main'); 
			} else { 
				nav('off','Topik','topik_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="fokus_main") || ($_GET['file']=="fokus_add") || ($_GET['file']=="fokus_detail") || ($_GET['file']=="fokus_edit") || ($_GET['file']=="fokus_cat")) { 
				nav('on','Berita','fokus_main'); 
			} else { 
				nav('off','Berita','fokus_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="pers_main") || ($_GET['file']=="pers_add") || ($_GET['file']=="pers_detail") || ($_GET['file']=="pers_edit") || ($_GET['file']=="pers_cat") || ($_GET['file']=="fotorilis")) { 
				nav('on','Pers','pers_main'); 
			} else { 
				nav('off','Pers','pers_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="beritafoto_main") || ($_GET['file']=="beritafoto_add") || ($_GET['file']=="beritafoto_detail") || ($_GET['file']=="beritafoto_edit") || ($_GET['file']=="beritafoto_cat")) { 
				nav('on','Berita Foto','beritafoto_main'); 
			} else { 
				nav('off','Berita Foto','beritafoto_main'); 
			} 
			?>
		</td>

		<td>
			<?php 
			if (($_GET['file']=="gallery_main") || ($_GET['file']=="gallery_detail") || ($_GET['file']=="gallery_display") || ($_GET['file']=="gallery_list") || ($_GET['file']=="gallery_upload")) { 
				nav('on','Foto','gallery_main'); 
			} else { 
				nav('off','Foto','gallery_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="pidato_main") || ($_GET['file']=="pidato_add") || ($_GET['file']=="pidato_detail") || ($_GET['file']=="pidato_edit") || ($_GET['file']=="pidato_cat")) { 
				nav('on','Pidato','pidato_main'); 
			} else { 
				nav('off','Pidato','pidato_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="wawancara_main") || ($_GET['file']=="wawancara_add") || ($_GET['file']=="wawancara_detail") || ($_GET['file']=="wawancara_edit") || ($_GET['file']=="wawancara_cat")) { 
				nav('on','Wawancara &amp; Kolom','wawancara_main'); 
			} else { 
				nav('off','Wawancara &amp; Kolom','wawancara_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="kliping_main") || ($_GET['file']=="kliping_add") || ($_GET['file']=="kliping_detail") || ($_GET['file']=="kliping_edit") || ($_GET['file']=="kliping_cat")) { 
				nav('on','Kliping','kliping_main'); 
			} else { 
				nav('off','Kliping','kliping_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="perspektif_main") || ($_GET['file']=="perspektif_add") || ($_GET['file']=="perspektif_detail") || ($_GET['file']=="perspektif_edit") || ($_GET['file']=="perspektif_cat")) { 
				nav('on','Perspektif','perspektif_main'); 
			} else { 
				nav('off','Perspektif','perspektif_main'); 
			} 
			?>
		</td>

		<td>
			<?php 
			if (($_GET['file']=="uu_main") || ($_GET['file']=="uu_add") || ($_GET['file']=="uu_detail") || ($_GET['file']=="uu_edit") || ($_GET['file']=="uu_upload")) { 
				nav('on','Produk Hukum','uu_main'); 
			} else { 
				nav('off','Produk Hukum','uu_main'); 
			} 
			?>
		</td>
		<td>
			<?php 
			if (($_GET['file']=="mutiara_main") || ($_GET['file']=="mutiara_add") || ($_GET['file']=="mutiara_detail") || ($_GET['file']=="mutiara_edit") || ($_GET['file']=="mutiara_upload")) { 
				nav('on','Mutiara Kata','mutiara_main'); 
			} else { 
				nav('off','Mutiara Kata','mutiara_main'); 
			} 
			?>
		</td>

		<td width="5">&nbsp;</td>
	</tr>
</table>