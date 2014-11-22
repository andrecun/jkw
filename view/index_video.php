<div class="presidenRI-box videoStreaming">
                    <div class="boxHeader ">
                         <a href="<?=$url_rewrite?>index.php/video/"> VIDEO STREAMING</a>
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>
      <?php
     $sql="select * from video where status='1' order by waktu desc limit 1";
     $result=$DB->query($sql);
     $data=$DB->fetch_array($result);
     $id=$data['id'];
     $ringkasan=$data['Ringkasan'];
     $judul=$data['judul_id'];
     $alamat_img="$url_rewrite"."imageBeritafotoR.php/"."$id.jpg";
     $video=$data["source"];
     ?>             
                    <div class="boxContent text-center">
                        <p><?=$judul?></p>
                   <!--     <img src="<?php echo $base_url;?>public_assets/banner/1.jpg" class="img-responsive" style="margin-bottom: 10px;">-->
                     <!--  <video id="example_video_1" class="img-responsive video-js vjs-default-skin" controls preload="none" width="238" height="158"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">
    <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track>
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>-->
                  <script type="text/javascript" src="<?php echo $url_rewrite;?>swfobject.js"></script>
 <embed src="<?php echo $url_rewrite;?>mediaplayer.swf" width="230" height="178" allowscriptaccess="always" allowfullscreen="true" flashvars="width=230&height=178&file=<?=$url_rewrite.$video?>" />

                    </div>
                </div>