<?php
	/*session_start();
	//recup des variables de session
	include "Module/loadsessionvars.php";
	include "Module/functioneuro2012.php";
	include "Module/security.php";

	check_user($parieur_id);

	$classementtransposetable = array_keys($totaljoueurpoints);
	include "header.php";*/
?>
<div class="container-table">
 	<div class="container-table1">
		<div class="top-table gradient-greytoblack radius" >Classement</div>
		
		<div class="row-table">
			<div class="cell-classement">Place</div>
			<div class="cell-classement-gde">Nom</div>
			<div class="cell-classement-gde">Total Pts</div>
			<div class="cell-classement-double2">Bons pronostics</div>
			<div class="cell-classement-double2">Scores exacts</div>
			<div class="cell-classement-double">Bonus</div>
			<div class="cell-classement-double">Bonus</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-classement"></div>
			<div class="cell-classement-gde"></div>
			<div class="cell-classement-gde"></div>
			<div class="cell-classement">Nb</div>
			<div class="cell-classement-gde">Pts</div>
			<div class="cell-classement">Nb</div>
			<div class="cell-classement-gde">Pts</div>
			<div class="cell-classement-double">Meilleur butteur</div>
			<div class="cell-classement-double">Equipe gagnante</div>
		</div><!-- end div row table-->

		<?php 
		foreach($sortedtotalpoints as $parieur_id=>$totalpoint){ ?>
		
		<div class='row-table'>			
			<div class="cell-classement"><?php $rank +=1; echo $rank?></div>
			<div class="cell-classement-gde"><?php echo $parieurs[$parieur_id]->nom_parieur; ?></div>
			<div class="cell-classement-gde"><?php echo $totalpoint." pts"; ?></div>	
			<div class="cell-classement"><?php echo $csens[$parieur_id]; ?></div>
			<div class="cell-classement-gde"><?php echo $psens[$parieur_id]; ?> pts</div>
			<div class="cell-classement"><?php echo $cscore[$parieur_id]; ?></div>
			<div class="cell-classement-gde"><?php echo $pscore[$parieur_id]; ?> pts</div>
			<div class="cell-classement-gde"><?php echo $paris[$parieur_id]->winner; ?></div>
			<div class="cell-classement-gde"><?php echo ""."pts";//echo calculpointbonus(2,$j); ?> </div>
			<div class="cell-classement-gde"><?php echo $paris[$parieur_id]->best_scorer; ?></div>
			<div class="cell-classement-gde"><?php echo ""."pts"//echo calculpointbonus(1,$j); ?></div>
		</div><!-- end div row-table -->
	<?php } ?>
	</div><!-- end div container-table1-->
	

	<div class="container-table2">
		<div class="top-table gradient-greytoblack radius"><?php echo $nextGame->Type_match.": ".$nextGame->equipe1; ?> 
			- <?php echo $nextGame->equipe2; ?></div>
	
		<div class='row-table'></div>
		<div class='row-table'></div>
		
		<?php foreach($sortedtotalpoints as $parieur_id=>$totalpoint){ ?>
		<div class='row-table'>
			
			<div class="cell-classement"><?php $rank2 +=1; echo $rank2; ?></div>
			<div class="cell-classement-gde"><?php echo $parieurs[$parieur_id]->nom_parieur; ?></div>
			<div class="cell-classement"><?php echo $paris[$parieur_id]->{'nb_but_e1_m'.$nextGame->id_match}; ?></div>	
			<div class="cell-classement">-</div>
			<div class="cell-classement"><?php echo $paris[$parieur_id]->{'nb_but_e2_m'.$nextGame->id_match} ?></div>
		</div><!-- end div row-table -->
		<?php } ?>


	</div><!-- end div container-table2-->
</div><!-- end div container-table-->	

</body>
</html>