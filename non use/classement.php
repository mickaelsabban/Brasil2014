<?php
	session_start();
	//recup des variables de session
	include "Module/loadsessionvars.php";
	include "Module/functioneuro2012.php";
	include "Module/security.php";

	check_user($parieur_id);

	$classementtransposetable = array_keys($totaljoueurpoints);
	include "header.php";
?>
 	<div class="container-table1">
			<div class="top-table gradient-greytoblack radius" >Classement</div>
		
		<div class="row-table">
			<div class="cell-classement">Place</div>
			<div class="cell-classement">Nom</div>
			<div class="cell-classement">Total Points</div>
			<div class="cell-classement-double">Bons pronostics</div>
			<div class="cell-classement-double">Scores exacts</div>
			<div class="cell-classement-double">Bonus</div>
			<div class="cell-classement-double">Bonus</div>

		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-classement-vide"></div>
			<div class="cell-classement-vide"></div>
			<div class="cell-classement-vide"></div>
			<div class="cell-classement">Nb</div>
			<div class="cell-classement">Points</div>
			<div class="cell-classement">Nb</div>
			<div class="cell-classement">Points</div>
			<div class="cell-classement-double">Meilleur butteur</div>
			<div class="cell-classement-double">Equipe gagnante</div>

		</div><!-- end div row table-->

		<?php 
		for($i=0;$i<$NombreParieurs;$i++){
			$k = $parieurs_transpose[$classementtransposetable[$i]];
			$j = $classementtransposetable[$i];
			if ($i&1){
				echo "<div class='row-table'>";
			}else{
				echo '<div class="row-table" class="odd">';
			}
			?>
			<div class="cell-classement"><? echo $i+1?></div>
			<div class="cell-classement"><?php echo $parieurs[$k]["name"]; ?></div>
			<div class="cell-classement"><? echo $totaljoueurpoints[$j]." points" ?></div>	
			<div class="cell-classement"><? echo $nbBonsens[$j] ?></div>
			<div class="cell-classement"><? echo $pointsbonsens[$j] ?> points</div>
			<div class="cell-classement"><? echo $nbscoresexact[$j] ?></div>
			<div class="cell-classement"><? echo $pointsbonscore[$j] ?> points</div>
			<div class="cell-classement"><? echo $parisBonus[2][$j] ?></div>
			<div class="cell-classement"><? echo calculpointbonus(2,$j); ?> </div>
			<div class="cell-classement"><? echo $parisBonus[1][$j] ?></div>
			<div class="cell-classement"><? echo calculpointbonus(1,$j); ?></div>
		</div><!-- end div row-table -->
	<?}?>
	</div><!-- end div container-classement-->
	<div class="container-table2">
				<div class="top-table gradient-greytoblack radius"><? echo $TypeNetxGame.": ".$matchs_equipe[1][$nextgametoplay] ; ?> 
				- <? echo $matchs_equipe[2][$nextgametoplay] ; ?></div>
	
				<div class='row-table'></div>
				<div class='row-table'></div>
		<?php for($i=0;$i<$NombreParieurs;$i++){
			$k = $parieurs_transpose[$classementtransposetable[$i]];
			$j = $classementtransposetable[$i];
			if ($i&1){
				echo "<div class='row-table'>";
			}else{
				echo '<div class="row-table" class="odd">';
			}
		?>
			<div class="classement-rank"><? echo $i+1; ?></div>
			<div class="classement-name"><?php echo $parieurs[$k]["name"]; ?></div>
			<div class="classement-score"><? echo $nb_buts[1][$nextgametoplay][$j]; ?></div>	
			<div class="classement-score">-</div>
			<div class="classement-score"><? echo $nb_buts[2][$nextgametoplay][$j] ?></div>
		</div><!-- end div row-table -->
		<?}?>


	</div><!-- end div container-classement-->
	
</div>
</body>
</html>