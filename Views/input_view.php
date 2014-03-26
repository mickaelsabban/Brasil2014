      <div class="containerInputProno">
      <div class="top-table radius"><?= $parieur->nom_parieur;?>, Input your prono for <?= $TypeNextPhase ?></div>
      <form action="update" method="POST" id="insert" name="update">
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
                        <?php if ($TypeNextPhase=="Group"){
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
            <?php if ($TypeNextPhase=="Group"){?>
                  <div class="input-line">
                        <label><?= $bonus[1]->Bonus_name; ?></label>
                        <?php //echo "la";?>
                        <select size=1 name="<?= $bonus[1]->Bonus_name; ?>">
                              <?php //echo "la2";//asort($teams);
                              foreach($teams as $key=>$team){
                                    //echo "la3";
                                    //var_dump($team);
                                    //echo "la4";
                                    if($pari->winner==$team->Equipe_name){
                                          echo '<option value="'.$team->Equipe_name.'"" selected = "selected">'.$team->Equipe_name.'</option>';
                                    }else{     
                                          echo '<option value="'.$team->Equipe_name.'">'.$team->Equipe_name.'</option>';
                                    }
                              }?>
                        </select>
                  </div>  <!-- end div input line -->
                  <div class="input-line">
                        <label><?= $bonus[2]->Bonus_name; ?></label>
                        <select size=1 name="<? echo $bonus[2]->Bonus_name; ?>">
                              <?php //asort($Strikers);
                              foreach($strikers as $key=>$striker){
                              if($pari->best_striker==$striker->Buteur_name){
                                          echo '<option value="'.$striker->Buteur_name.'"" selected = "selected">'.$striker->Buteur_name.'</option>';
                                    }else{     
                                          echo '<option value="'.$striker->Buteur_name.'">'.$striker->Buteur_name.'</option>';
                                    }
                              }?>
                        </select>
                  </div><!-- end div input line -->
            <?php } ?>
            <div><input type="submit" class="button" id="signup" value="Envoyer"></div>


                 
      </form>

      <script type="text/javascript">

      $(document).ready(function(){
            $("#signup").on("click", function(e){
                  e.preventDefault();
                  //return false;
                  if(e.timeStamp > <?php echo $timestamp*1000 ?>){
                      console.log('temps ecoule');
                      //alert($("#insert").attr("action"));
                      $('#insert').attr('action','table');
                      $("#insert").submit();
                  }else{
                        console.log('ok3 '  + e.timeStamp + 'ok2 ' + <?php echo $timestamp*1000 ?>);
                        //alert($("#insert").attr("action"));
                        //$("#insert").attr('action','stat');
                        //alert($("#insert").attr("action"));
                        $("#insert").submit();
                  }
                  //return false;
            });
      });

      </script>

</body>
</html>
