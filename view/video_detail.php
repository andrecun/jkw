<?php
require_once "lib/application.php";
include('template/meta.php');

$id = $clsPath->getByArray(4);
$tempid = str_replace(".html", "", $id);

$sql = "select *, DAYOFMONTH(waktu) as tgl, MONTH(waktu) as bln, "
        . "YEAR(waktu) as thn, DATE_FORMAT(waktu, '%H:%i:%s') as jam"
        . "  from video where status='1' and id='$tempid' order by waktu desc limit 7";
$result = $DB->query($sql);
$data = $DB->fetch_array($result);
$id = $data['id'];
$ringkasan = $data['deskripsi'];
$waktu = $UTILITY->format_tanggal_time_ind($data[waktu]);
$judul = $data['judul_id'];
$alamat_img = "$url_rewrite" . "imageFokusD.php/" . "$id.jpg";
$video=$data["source"];
?>

<body>
     <div id="mainbody">
          <div class="container presidenRI-container">
               <?php include('template/header.php'); ?>

               <div class="row presidenRI-contentDetail">
                    <div class="col-md-8 contentLeft">
                         <p class="title">Video</p>
                         <div class="contentBerita">
                              <div class="beritaTitle">
                                   <div class="symbol col-md-1">
                                        <img src="<?php echo $url_rewrite; ?>assets/img/judul.png">
                                   </div>
                                   <div class="tagline col-md-10">
                                        <p class="title"><?= $judul ?></p>
                                        <p class="date"><?= $waktu ?></p>
                                   </div>
                                   <div class=“clearfix”></div>
                              </div>
                              <center>
                                  <object type="application/x-shockwave-flash" data="<?=$url_rewrite?>player_flv_maxi.swf" width="445" height="270">
                <param name="movie" value="<?=$url_rewrite?>player_flv_maxi.swf">
                <param name="allowFullScreen" value="true">
                <param name="FlashVars" value="flv=<?=$url_rewrite.$video?>&amp;volume=200&amp;showstop=1&amp;showvolume=1&amp;showfullscreen=1&amp;showiconplay=1">
            </object>
                                   <div class="imgCaption text-center">
                                        <?= $data[deskripsi] ?>
                                   </div>
 </center>

                         </div>
                    </div>
                    <div class="col-md-4 contentRight">
                         <div class="presidenRI-box arsip">
                              <div class="boxHeader">
                                   ARSIP
                              </div>
                              <img src="<?php echo $url_rewrite; ?>assets/img/merahputih.png" class="img-responsive">

                              <div class="boxContent">
                                   <div id="tanggal" >
                                        
                                            <?php
                                             $alamat_web = "$url_rewrite" . "index.php/video";
                                             require_once 'kalender_arsip.php';
                                             prosess_tanggal($tgl, $alamat_web, $days, $status, 5, $DB);
                                             ?>
                                       
                                      <!--  <div class="hasDatepicker">
                                             <div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;">
                                                  <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">
                                                       <a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev">
                                                            <span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next">
                                                            <span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title">
                                                            <span class="ui-datepicker-month">November</span>&nbsp;<span class="ui-datepicker-year">2014</span></div></div><table class="ui-datepicker-calendar">
                                                       <thead>
                                                            <tr>
                                                                 <th scope="col" class="ui-datepicker-week-end">
                                                                      <span title="Sunday">Su</span></th>
                                                                 <th scope="col"><span title="Monday">Mo</span></th>
                                                                 <th scope="col"><span title="Tuesday">Tu</span></th>
                                                                 <th scope="col"><span title="Wednesday">We</span></th>
                                                                 <th scope="col"><span title="Thursday">Th</span></th>
                                                                 <th scope="col"><span title="Friday">Fr</span></th>
                                                                 <th scope="col" class="ui-datepicker-week-end">
                                                                      <span title="Saturday">Sa</span></th></tr>
                                                       </thead>
                                                       <tbody>
                                                            <tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                                                 <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014">
                                                                      <a class="ui-state-default" href="#">1</a>
                                                                 </td></tr>
                                                            <tr>
                                                                 <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014">
                                                                      <a class="ui-state-default" href="#">2</a></td>
                                                                 <td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">3</a></td>
                                                                 <td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">7</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">8</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">9</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default ui-state-highlight ui-state-active" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">13</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">14</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">15</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">19</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">20</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">21</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">22</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">28</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">29</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="10" data-year="2014"><a class="ui-state-default" href="#">30</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td></tr></tbody></table></div></div>
                                        -->
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                         </div>

                         <?php
                        include "view/right_menu.php";
                        ?>
                    </div>
               </div>


               <?php include('template/javascript.php'); ?>
               <?php include('template/footer.php'); ?>
          </div>
     </div>
</body>
</html>