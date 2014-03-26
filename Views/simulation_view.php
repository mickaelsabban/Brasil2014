<div class="container-dropdown">
	<div class="dropdown">
		<select>
			<?php foreach($groupes as $element){ ?>
			<option value='<?= serialize($element)?>' <?php if($element->name ==$groupe->name){echo "selected";} ?>><?= $element->name ?></option>

			<?php } ?>
		</select>
	</div><!-- end div dropdown -->
</div><!-- end div container dropdown -->

<div class="containerInputProno">
	<div class="top-table radius"> <?= $parieur->nom_parieur;?>, Enter Your Simulation <? //echo $TypeNextPhase; ?></div>
	
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
				<?php if(($i%($nombreMatchsPoule/3)==0 && $i < $nombreMatchsPoule)||($i == $nombreMatchsPoule && $groupe->matchfin!=$nombreMatchsPoule)){ //|| ($i == $nombreMatchsHuitiemes && $groupe->matchfin!=$nombreMatchsHuitiemes) || ( $i == $nombreMatchsQuarts && $groupe->matchfin!=$nombreMatchsQuarts)|| ($i == $nombreMatchsdemi && $groupe->matchfin!=$nombreMatchsdemi)){
							echo "</div><!-- end div Block Prono-->";
							echo "<div class='BlockProno'>";
							//$TypeNextPhase = $array_phase[array_search($TypeNextPhase, $array_phase) + 1];
							echo "<div class='input-line'>".$groupe->name."</div> <!-- end div input line -->";
					}
			}?>
		</div><!-- end div BlockProno -->
		<div><input type="submit" class="button" id="signup" name ="action" value="Envoyer"></div>
		<div><input type="submit" class="button" id="signup" name ="action" value="Reset"></div>
	</form>
</div> <!-- end div containerInputProno -->

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

	$('.dropdown select:not(.bound)').addClass('bound').bind('change',  onSelectChanged);
	function onSelectChanged(){
		//alert ("toto");
		var parsedTest = $(".dropdown select option:selected").val();
		var postData="groupe="+parsedTest;
		//console.log(postData);
		var FormData=$('#insert').serialize();
			console.log(FormData);
		$.post('updatesimulation', FormData,function(data){
			//console.log(data);
		});
		$.post('simulation', postData,function(data){
			// console.log(data);
			var content = $(data).find('.containerInputProno');
			//console.log(content.html());
			$(".containerInputProno").fadeOut('200',function(){
				$(".containerInputProno").html(content.html());
				$(".containerInputProno").fadeIn('400');
			});
		});
	}
});

</script>

