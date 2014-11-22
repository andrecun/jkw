<?php
$query = mysql_query($sql);
$total_results = mysql_num_rows($query);
$total_pages = ceil($total_results / $limit);

if(isset($_GET['page'])) { $page=$_GET['page']; } else { $page=1; }
$offset = ($page - 1) * $limit;
?>