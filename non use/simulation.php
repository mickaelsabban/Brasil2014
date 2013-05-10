<?
session_start();
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
}
?>

  <div class="dropdown">
    <select>
      <option value="[1,24]">Poule</option>
      <option value="[25,28]">Quarts</option>
      <option value="[29,30]">Demi</option>
      <option value="[31,31]">Finale</option>
    </select>
  </div>
  <div class="containerInputProno">
  <div class="top-table radius"> <? echo $parieur_name;?>, Enter Your Simulation <? //echo $TypeNextPhase; ?></div>
  <form action="Controller/updatesimulation.php" method="POST" id="insert">
        <input type="hidden" name="matchdebut" value= <?= $matchdebut ?> >
        <input type="hidden" name="matchfin" value= <?= $matchfin ?> >

        <div class="BlockProno">
              <div class="input-line">
                          <? echo $TypeNextPhase; ?>
                    </div><!-- end div input line -->
              <? for($i = $matchdebut ; $i <= $matchfin; $i++){
                    ?>
                          
                    <div class="input-line">
                          <label><? echo $matchs_equipe[1][$i] ?></label>
                          <input type="text" size=2 name="score_e1_m<? echo $i; ?>" value=<?echo $score[1][$i];  ?>>
                          <span> - </span>
                          <input type="text" size=2 name="score_e2_m<? echo $i; ?>"  value=<?echo $score[2][$i];  ?>>
                          <label><? echo $matchs_equipe[2][$i] ?></label>
                    </div><!-- end div input line -->
                    <? 
                      if(($i%($nombreMatchsPoule/3)==0 && $i < $nombreMatchsPoule)||($i == $nombreMatchsPoule && $matchfin!=$nombreMatchsPoule) || ($i == $nombreMatchsHuitiemes && $matchfin!=$nombreMatchsHuitiemes) || ( $i == $nombreMatchsQuarts && $matchfin!=$nombreMatchsQuarts)|| ($i == $nombreMatchsdemi && $matchfin!=$nombreMatchsdemi)){
                            echo "</div><!-- end div Block Prono-->";
                            echo "<div class='BlockProno'>";
                            $TypeNextPhase = $array_phase[array_search($TypeNextPhase, $array_phase) + 1];
                            echo "<div class='input-line'>".$TypeNextPhase."</div> <!-- end div input line -->";
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
      var parsedTest = JSON.parse($(".dropdown select option:selected").val());
      var mytext="bob=bob";
      $('#insert input:not([type="submit"])').each(function(){
        mytext =mytext+"&"+this.name+"="+this.value;
      });
      //alert(mytext);
      $.post('Controller/updatesimulation.php', mytext,function(data){
        console.log(data);
      });
      //$('#insert').submit();
      
      /*var input = $("<input>").attr("type", "hidden").attr("name", "nogo").val("nogo");
      $('#insert').append($(input));
      $('#insert').submit();
      */
      $.post('simulation.php', "matchdebut="+parsedTest[0]+"&matchfin="+parsedTest[1],function(data){
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