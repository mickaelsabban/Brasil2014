<?php
/*session_start();
include "Module/functioneuro2012.php";
//recup des variables de session
include "Module/loadsessionvars.php";
include "Module/security.php";

check_user($parieur_id);

$array_phase=array(0 => "Premiere Journee",1 => "Deuxieme Journee",2 => "Troisieme Journee",3=> "Quarter Finals",4=> "Semi Finals",5=> "Finals");
$TypeNextPhase=$array_phase[0];
include "header.php";
//$_POST['matchdebut'];

if(!isset($_POST['matchdebut'])||!isset($_POST['matchfin'])){
  //echo "form non set";
  $matchdebut = 1;
  $matchfin = $nombreMatchsPoule;
  //$TypeNextPhase = "Premier jour";
}else{
  //echo "FORM SET SET  set";
  $matchdebut = $_POST['matchdebut'];
  $matchfin = $_POST['matchfin'];
  //$TypeNextPhase=$_POST['typenextphase'];
  <option value='[<?= $element->matchdebut.",".$element->matchfin ?>]'><?= $element->name ?></option>
}*/
?>

  <div class="dropdown">
    <select>
      <?php foreach($groupes as $element){ ?>
      <option value='<?= serialize($element)?>' <?php if($element->name ==$groupe->name){echo "selected";} ?>><?= $element->name ?></option>

      <?php } ?>
    </select>
  </div>
  <div class="containerInputProno">
  <div class="top-table radius"> <?=$parieur->nom_parieur;?>, Enter Your Simulation <? //echo $TypeNextPhase; ?></div>
  <form action="updatesimulation" method="POST" id="insert">
        <input type="hidden" name="matchdebut" value= <?= $groupe->matchdebut ?> >
        <input type="hidden" name="matchfin" value= <?= $groupe->matchfin ?> >

        <div class="BlockProno">
              <div class="input-line">
                          <?php echo $groupe->name; ?>
                    </div><!-- end div input line -->
              <?php for($i = $groupe->matchdebut ; $i <= $groupe->matchfin; $i++){
                    ?>
                          
                    <div class="input-line">
                          <label><?php echo $matchs[$i]->equipe1 ?></label>
                          <input type="number" size=2 name="score_e1_m<?php echo $i; ?>" value=<?php echo $matchs[$i]->score_e1;  ?>>
                          <span> - </span>
                          <input type="number" size=2 name="score_e2_m<?php echo $i; ?>"  value=<?php echo $matchs[$i]->score_e2;  ?>>
                          <label><?php echo $matchs[$i]->equipe2 ?></label>
                    </div><!-- end div input line -->
                    <?php 
                      if(($i%($nombreMatchsPoule/3)==0 && $i < $nombreMatchsPoule)||($i == $nombreMatchsPoule && $groupe->matchfin!=$nombreMatchsPoule) || ($i == $nombreMatchsHuitiemes && $groupe->matchfin!=$nombreMatchsHuitiemes) || ( $i == $nombreMatchsQuarts && $groupe->matchfin!=$nombreMatchsQuarts)|| ($i == $nombreMatchsdemi && $groupe->matchfin!=$nombreMatchsdemi)){
                            echo "</div><!-- end div Block Prono-->";
                            echo "<div class='BlockProno'>";
                            //$TypeNextPhase = $array_phase[array_search($TypeNextPhase, $array_phase) + 1];
                            echo "<div class='input-line'>".$groupe->name."</div> <!-- end div input line -->";
                      }
              }//print_r($score);
              ?>
        </div><!-- end div BlockProno -->
        <div><input type="submit" class="button" id="signup" name ="update" value="Envoyer"></div>
        <div><input type="submit" class="button" id="signup" name ="reset" value="Reset"></div>

    </form>
<script type="text/javascript">

  
  $(document).ready(function(){

    $('.dropdown select:not(.bound)').addClass('bound').bind('change',  onSelectChanged);

    function onSelectChanged(){
      //alert ("toto");
      var parsedTest = $(".dropdown select option:selected").val();
      
      var postData="groupe="+parsedTest;
      //console.log(postData);
      var FormData=$('#insert').serialize();
     
     /* $('#insert input:not([type="submit"])').each(function(){
        mytext =mytext+"&"+this.name+"="+this.value;
      });
      //alert(parsedTest);
      */
      $.post('updatesimulation', FormData,function(data){
        console.log(data);
      });
      //$('#insert').submit();
      
      /*var input = $("<input>").attr("type", "hidden").attr("name", "nogo").val("nogo");
      $('#insert').append($(input));
      $('#insert').submit();
      */

      //alert( "matchdebut="+parsedTest[0]+"&matchfin="+parsedTest[1]);
      $.post('simulation', postData,function(data){
        //console.log(data);
        var content = $(data).filter('.containerInputProno');
        $(".containerInputProno").fadeOut('200',function(){
          $(".containerInputProno").html(content.html());
          $(".containerInputProno").fadeIn('400',function(){
             
          })
        }) 
      })
    }
    
  })

</script>
</body>
</html>