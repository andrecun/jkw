 <div class="presidenRI-box agenda">
                    <div class="boxHeader">
                         <a href="<?=$url_rewrite?>index.php/agenda/"> AGENDA</a>
                    </div>
                    <div class="doubleLine">
                        <div class="tick"></div>
                        <div class="thin"></div>
                    </div>

                    <div class="boxContent">
                         
                        <p class="date">
                             <?php
                             $tgl_sistem=date("Y-m-d H:i:s");
                             $tgl_query=date("Y-m-d");
                             $tgl=$UTILITY->format_tanggal_time_ind($tgl_sistem);
                             $hari=$UTILITY->hari(date("N"));
                             echo "$hari , $tgl";
                            ?>
                             </p>
                             <?php
                             $sql="select * from km0 where status='1' and waktu like '$tgl_query%' order by waktu desc";
                           
                             $data=$DB->_fetch_array($sql,1);
                             $jmlh_data=count($data);
                             if($jmlh_data>0){
                                  echo "<ul>";
                                  foreach ($data as $key => $value) {
                                       $time=$UTILITY->format_time($value['waktu']);
                                       $judul=$value["judul"];
                                       $text_time="Pukul $time WIB :".$judul;
                                  
                             ?>
                            <li>
                                <a class="title"><?=$text_time?></a>
                            </li>
                             <?php
                                  }
                                  echo "</ul>";
                             }else
                             echo "<center>Agenda Intern</center>";
                             
                             $clsPath->addPathVarTo("agenda",true);
                             ?>
                    </div>
                    <div class="boxFooter text-right">
                        <a href="<?=$clsPath->getPathVarTo(true);?>/" class="arsip">Arsip >></a>
                    </div>
                </div>