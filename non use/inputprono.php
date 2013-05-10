<?php
      session_start();
      //recup des variables de session
      include "Module/loadsessionvars.php";
      include "Module/security.php";

      // test sur la date
      $endInputPoule="2013-04-18";
      $endInputHuitieme="2013-04-18";
      $endInputQuart="2013-04-19";
      $endInputDemi="2013-04-20";
      $endInputFinale="2013-04-21";      

      $endInputPoule_timestamp=strtotime($endInputPoule);
      $endInputHuitieme_timestamp=strtotime($endInputHuitieme);
      $endInputQuart_timestamp=strtotime($endInputQuart);
      $endInputDemi_timestamp=strtotime($endInputDemi);
      $endInputFinale_timestamp=strtotime($endInputFinale);

      check_user($parieur_id);

      $today_date=date("Y-m-d");
      $today_timestamp=strtotime($today_date);

      if($today_timestamp<$endInputPoule_timestamp){
            $_SESSION['$TypeNextPhase']="Poule";
            $_SESSION['$MatchBefore']=0;
            $_SESSION['$MatchAfter']=$nombreMatchsPoule;
      }elseif($today_timestamp<$endInputHuitieme_timestamp){
            echo $_SESSION['$TypeNextPhase']="Huitiemes";
            $_SESSION['$MatchBefore']=$nombreMatchsPoule;
            $_SESSION['$MatchAfter']=$nombreMatchsHuitiemes;    
      }elseif($today_timestamp<$endInputQuart_timestamp){
            $_SESSION['$TypeNextPhase']="Quarts";
            $_SESSION['$MatchBefore']=$nombreMatchsHuitiemes;
            $_SESSION['$MatchAfter']=$nombreMatchsQuarts;    
      }elseif($today_timestamp<$endInputDemi_timestamp){
            $_SESSION['$TypeNextPhase']="Demi";
            $_SESSION['$MatchBefore']=$nombreMatchsQuarts;
            $_SESSION['$MatchAfter']=$nombreMatchsdemi;    
      }elseif($today_timestamp<$endInputFinale_timestamp){
            $_SESSION['$TypeNextPhase']="Finals";
            $_SESSION['$MatchBefore']=$nombreMatchsdemi;
            $_SESSION['$MatchAfter']=$nombrematchsfinale;    
      }else{
            echo "rien";
      }

      $MatchBefore=$_SESSION['$MatchBefore'];
      $MatchAfter=$_SESSION['$MatchAfter'];
      $TypeNextPhase=$_SESSION['$TypeNextPhase'];


      include "header.php";
      ?>

      <div class="containerInputProno">
      <div class="top-table radius"> <? echo $parieur_name;?>, Input your prono for <? echo $TypeNextPhase ?></div>
      <form action="Controller/insertprono.php" method="POST" id="insert">
            <div class="BlockProno">
                  <div class="input-line">
                              <? echo $TypeNextPhase ?>
                        </div><!-- end div input line -->
                  <? for($i = $MatchBefore+1 ; $i <= $MatchAfter; $i++){
                        ?>
                              
                        <div class="input-line">
                              <label><? echo $matchs_equipe[1][$i] ?></label>
                              <input type="text" size=2 name="nb_but_e1_m<? echo $i; ?>" value=<?echo $nb_buts_temp[1][$i][$parieur_id];  ?>>
                              <span> - </span>
                              <input type="text" size=2 name="nb_but_e2_m<? echo $i; ?>"  value=<?echo $nb_buts_temp[2][$i][$parieur_id];  ?>>
                              <label><? echo $matchs_equipe[2][$i] ?></label>
                        </div><!-- end div input line -->
                        <? if ($TypeNextPhase=="Poule"){
                              if($i%($nombreMatchsPoule/3)==0 && $i!= $nombreMatchsPoule){
                                    echo "</div><!-- end div Block Prono-->";
                                    echo "<div class='BlockProno'>";
                                    if($i/($nombreMatchsPoule/3)==1){
                                          $text_aux = "Deuxieme";
                                    }else{
                                          $text_aux = "Troisieme";
                                    }
                                    echo "<div class='input-line'>".$text_aux." Jour</div> <!-- end div input line -->";
                              }
                        }
                  


                  }
                  ?>
            </div><!-- end div BlockProno -->




            <!-- Affichage des bonus dans le cas de la phase de poule-->
            <? if ($TypeNextPhase=="Poule"){?>
                  <div class="input-line">
                        <label><? echo $bonusTable[1]; ?></label>
                        <select size=1 name="<? echo $bonusTable[1]; ?>">
                              <? asort($equipes);
                              foreach($equipes as $key=>$value){
                                    if($parisBonus[1][$parieur_id]==$value){
                                          echo '<option value="'.$value.'"" selected = "selected">'.$value.'</option>';
                                    }else{     
                                          echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                              }?>
                        </select>
                  </div>  <!-- end div input line -->
                  <div class="input-line">
                        <label><? echo $bonusTable[2]; ?></label>
                        <select size=1 name="<? echo $bonusTable[2]; ?>">
                              <? asort($Strikers);
                              foreach($Strikers as $key=>$value){
                              if($parisBonus[2][$parieur_id]==$value){
                                          echo '<option value="'.$value.'"" selected = "selected">'.$value.'</option>';
                                    }else{     
                                          echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                              }?>
                        </select>
                  </div><!-- end div input line -->
            <?}?>
            <div><input type="submit" class="button" id="signup" value="Envoyer"></div>


                 
      </form>
</body>
</html>
