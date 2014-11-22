 <div class="presidenRI-box linkRI">
                              <div class="boxContent">
                                   <div class="ibuNegara pull-left">
                                        <img src="<?php echo $url_rewrite; ?>assets/img/ibunegara.jpg" class="img-responsive">
                                        <p>Ibu</p>
                                        <p>Negara RI</p>
                                   </div>

                                   <div class="pull-left">
                                        <img src="<?php echo $url_rewrite; ?>assets/img/merahputih-2.png" style="height: 149px; margin-left:8px;">
                                   </div>

                                   <div class="istanaRI pull-right">
                                        <img src="<?php echo $url_rewrite; ?>assets/img/istananegara.jpg" class="img-responsive">
                                        <p>Istana</p>
                                        <p>Kepresidenan RI</p>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                         </div>


<div class="presidenRI-box agenda">
                    <div class="boxHeader">
                          <a>Mutiara Kata</a>
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>

                     <div class="front-berita">
                              <p class="content text-justify">
                              <?php
                                $sql="select * from mutiara where status='1' order by waktu desc limit 1";
                                $result=$DB->query($sql);
                                $data=$DB->fetch_array($result);
                                $mutiara=$data['mutiara'];
                                $tempat=$data['tempat'];
                                $event=$data['event'];
                                echo "<i style=\"font-size: small\">$mutiara</i><br/><i>$event </i>"
                              ?>          
                              </p>
                    </div>
                </div>