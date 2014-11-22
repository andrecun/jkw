<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="thm11px">
			<?php
			if(isset($_GET['page'])) { $page=$_GET['page']; } else { $page=1; }
			echo"$bhs_page : &nbsp;";
			if ($page != 1) {
				echo "<a href='".$_SERVER['PHP_SELF']."?$target&amp;page=1' title='$bhs_first'>$bhs_first</a>&nbsp;&nbsp;&nbsp;";
				$prevpage = $page - 1;
				echo "&nbsp;<a href='".$_SERVER['PHP_SELF']."?$target&amp;page=$prevpage' title='$bhs_prev'>$bhs_prev</a>&nbsp;";
			}

			if ($page == $total_pages) { $to = $total_pages; }
			elseif ($page == $total_pages-1) { $to = $page+1; }
			elseif ($page == $total_pages-2) { $to = $page+2; }
			else { $to = $page+3; }
		
			if ($page == 1 || $page == 2 || $page == 3) { $from = 1; }
			else { $from = $page-3; }
		
			for ($i = $from; $i <= $to; $i++) {
				if ($i == $total_results) $to=$total_results;
				if ($i != $page) { echo "<a href='".$_SERVER['PHP_SELF']."?$target&amp;showold=yes&amp;page=$i' title='$bhs_page $i'>$i</a>"; }
				else { echo "<b>[$i]</b>"; }
				if ($i != $total_pages) { echo "&nbsp;"; }
			}

			if ($page != $total_pages) {
				$nextpage = $page + 1;
				echo "&nbsp;<a href='".$_SERVER['PHP_SELF']."?$target&amp;page=$nextpage' title='$bhs_next'>$bhs_next</a>&nbsp;";
				echo "&nbsp;&nbsp;&nbsp;<a href='".$_SERVER['PHP_SELF']."?$target&amp;page=$total_pages' title='$bhs_last'>$bhs_last</a>";
			}
			?>
		</td>
		<td align="right" class="thm11px">
			<?php echo "$bhs_page $page $bhs_from $total_pages"; ?>
		</td>
	</tr>
</table>