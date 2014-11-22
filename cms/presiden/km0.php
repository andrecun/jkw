
      <!-- badan -->
      <div id="badan">
        <div id="isi">
          <hr />
          <div id="bar">
            <div class="perspektif"><h1>Perspektif</h1></div>
          </div>

          <div id="data">

            <?php
            if ($clsPath->isValidPath("^/perspektif/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([0-9])+(\.html)$")) {
              //detail
		$id = $clsPath->getByArray(4);
		$tempid = str_replace(".html","",$id);
              $sql = mysql_query("select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from perspektif where status='1' and id='".$tempid."' ");
              $row = mysql_fetch_array($sql);
            ?>

              <div class="berita">
                <p><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn'];?></p>
                <h3><?php echo htmlentities($row['judul']); ?></h3>
				<?php if ($row['media']!="") { ?>
				<a href="<?php echo htmlentities($row['media']); ?>" target="_blank"><?php echo "".nl2br(htmlentities($row['penulis'])); ?></a>
				<?php } else { ?>
				<?php echo "".nl2br(htmlentities($row['penulis'])); ?>
				<?php } ?>
				<p>&nbsp;</p>
                <p><?php echo nl2br(htmlentities($row['isi'])); ?></p>
                <div class="blank">&nbsp;</div>
              </div>

            <?php
            } else {
              //index
				$sql1="select *, DAYNAME(waktu) as hari, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, YEAR(waktu) as thn from perspektif where status='1' and judul<>'' and isi<>'' ";
	$limit = " LIMIT 0,5 ";
	$isdetail = true;
	if ($clsPath->isValidPath("^/perspektif/([0-9]{4})/([0-9]{1,2})/$")) {
		$thntopik = $clsPath->getByArray(1);
		$blntopik = $clsPath->getByArray(2);
		$stanggal = sprintf("%04d-%02d",$thntopik,$blntopik);
		$sql1 .= " AND date_format(waktu,'%Y-%m')='$stanggal' ";
		$limit = "";
		$isdetail = false;
	} else if ($clsPath->isValidPath("^/perspektif/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/$")) {
		$thntopik = $clsPath->getByArray(1);
		$blntopik = $clsPath->getByArray(2);
		$tgltopik = $clsPath->getByArray(3);
		$stanggal = sprintf("%04d-%02d-%02d",$thntopik,$blntopik,$tgltopik);
		$sql1 .= " AND date_format(waktu,'%Y-%m-%d')='$stanggal' ";
		$limit = "";
		$isdetail = false;
	}

	$sql1.="order by waktu desc $limit ";
              $sql = mysql_query($sql1);
			  if(mysql_num_rows($sql)>0)
              while ($row = mysql_fetch_array($sql)) {
$clsPath->addPathVarTo("perspektif",true);
$clsPath->addPathVarTo(sprintf("%4d",$row['thn']));
$clsPath->addPathVarTo(sprintf("%02d",$row['bln']));
$clsPath->addPathVarTo(sprintf("%02d",$row['tgl']));
$clsPath->addPathVarTo($row['id'].".html");
	if($isdetail)
		echo "              <div class=\"berita\">";
	else
		echo "              <div class=\"beritaarsip\">";
            ?>


                <p><?php conv_hari($row['hari']); echo ", ".$row['tgl']." "; conv_bln($row['bln']); echo " ".$row['thn']; ?></p>
                <h3><a href="<?php echo $clsPath->getPathVarTo(true);?>"><?php echo htmlentities($row['judul']); ?></a></h3>
                <p>
				<?php if ($row['media']!="") { ?>
				<a href="<?php echo htmlentities($row['media']); ?>" target="_blank"><?php echo "".htmlentities($row['penulis']); ?></a>
				<?php } else { ?>
				<?php echo "".htmlentities($row['penulis']); ?>
				<?php } ?>
				</p>

		<?php if($isdetail) { ?>
                <p><?php echo nl2br(htmlentities($row['ringkasan'])); ?></p>
		<?php } else echo "<br />";?>
                <div class="blank">&nbsp;</div>
              </div>

            <?php
              }
			else
			echo "<p><font color=\"red\"><b>Data Tidak Ditemukan</b></font></p>";
            }
            ?>
          </div>


          <?php //include"perspektifarsip.php"; ?>
          <hr />
        </div>
        <div id="menukiri">
          <?php
          include"menuperspektifarsip.php";
          include"menukabinet.php";
          include"menulink.php";
          include"menuenglishcontent.php";
          include"menusearch.php";
          include"menulayanan.php";
          ?>
          <hr />
        </div>
      </div>
