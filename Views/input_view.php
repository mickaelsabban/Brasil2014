      <div class="containerInputProno">
      <div class="top-table radius"> <?=$parieur->nom_parieur;?>, Input your prono for <?= $TypeNextPhase ?></div>
      <form action="update" method="POST" id="insert">
            <div class="BlockProno">
                  <div class="input-line">
                              <?= $TypeNextPhase ?>
                        </div><!-- end div input line -->
                  <?php for($i = $matchdebut ; $i <= $matchfin; $i++){
                        ?>
                              
                        <div class="input-line">
                              <label><?= $matchs[$i]->equipe1 ?></label>
                              <input type="text" size=2 name="nb_but_e1_m<?php echo $i; ?>" value=<?= $pari->{"nb_but_e1_m".$i};  ?>>
                              <span> - </span>
                              <input type="text" size=2 name="nb_but_e2_m<?php echo $i; ?>"  value=<?= $pari->{"nb_but_e2_m".$i};  ?>>
                              <label><?= $matchs[$i]->equipe2 ?></label>
                        </div><!-- end div input line -->
                        <?php if ($TypeNextPhase=="Poule"){
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
            <?php if ($TypeNextPhase=="Poule"){?>
                  <div class="input-line">
                        <label><?= $bonusTable[1]; ?></label>
                        <select size=1 name="<? echo $bonusTable[1]; ?>">
                              <?php asort($equipes);
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
                        <label><?= $bonusTable[2]; ?></label>
                        <select size=1 name="<? echo $bonusTable[2]; ?>">
                              <?php asort($Strikers);
                              foreach($Strikers as $key=>$value){
                              if($parisBonus[2][$parieur_id]==$value){
                                          echo '<option value="'.$value.'"" selected = "selected">'.$value.'</option>';
                                    }else{     
                                          echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                              }?>
                        </select>
                  </div><!-- end div input line -->
            <?php } ?>
            <div><input type="submit" class="button" id="signup" value="Envoyer"></div>


                 
      </form>
</body>
</html>
