<?php

session_start();
//recup variables de session
	include "Module/loadsessionvars.php";
	include "Module/security.php";

	check_user($parieur_id);
class Groupe
{
    public $name;
    public $matchdebut;
    public $matchfin;
}

$groupeA = new Groupe();
$groupeA->name = 'Groupe A';
$groupeA->matchdebut = '1';
$groupeA->matchfin = '6';

$groupeB = new Groupe();
$groupeB->name = 'Groupe B';
$groupeB->matchdebut = '7';
$groupeB->matchfin = '12';

$groupeC = new Groupe();
$groupeC->name = 'Groupe C';
$groupeC->matchdebut = '13';
$groupeC->matchfin = '18';


$groupeD = new Groupe();
$groupeD->name = 'Groupe D';
$groupeD->matchdebut = '19';
$groupeD->matchfin = '24';

$Huitiemes = new Groupe();
$Huitiemes->name = 'Huitiemes';
$Huitiemes->matchdebut = '25';
$Huitiemes->matchfin = '24';

$Quarts = new Groupe();
$Quarts->name = 'Quarts';
$Quarts->matchdebut = '25';
$Quarts->matchfin = '28';

$Demis = new Groupe();
$Demis->name = 'Demis';
$Demis->matchdebut = '29';
$Demis->matchfin = '30';

$Finales = new Groupe();
$Finales->name = 'Finale';
$Finales->matchdebut = '31';
$Finales->matchfin = '31';

$groupes = array($groupeA, $groupeB, $groupeC, $groupeD, $Huitiemes,$Quarts, $Demis,$Finales);

      	
    include "header.php";
	?>


		
		<div id='container-prono' class='cfx'>
		<div id="container-groupes" class='cfx'>			
			<?php foreach ($groupes as $groupe) { ?>
			<div class='groupe cfx'>
				
				<div class="top-table radius gradient-greytoblack"><? echo $groupe->name ?></div><!-- end div top-table-->

				<div class="row-table">Resultats</div><!-- end div row-table -->
				
				<?php
					for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){ ?>
						<div class="row-table cfx">
						<div class='country'><? echo $matchs_equipe[1][$correspondance[$match]] ?></div><!-- end div country-->
						<div class="score-match"><? echo $score[1][$correspondance[$match]] ?></div><!-- end div score match-->
						<div class="score-match">:</div><!-- end div score match-->
						<div class="score-match"><? echo $score[2][$correspondance[$match]] ?></div><!-- end div score match-->
						<div class='country'><? echo $matchs_equipe[2][$correspondance[$match]] ?></div><!-- end div country-->
						</div><!-- end div row-table-->
						
					<?}?>			
			 </div>
			<?}?>
		</div> <!-- end div container groupes -->
	<div id="container_scores" class='cfx'>
	<?php
	foreach ($groupes as $groupe) {?>
		<div class="container-score-par-groupe">
		<?for ($parieur=1;$parieur <=$NombreParieurs; $parieur++){
			?>
		<div class="score">

				<div class="top-table"><?php echo $parieurs[$parieur]["name"]; ?></div><!-- end div top-table-->
				<div class="row-table cfx">
					<div class="score-match">E1</div><!-- end div score match -->
					<div class="score-match">E2</div><!-- end div score match -->
					<div class="score-match">Pts</div><!-- end div score match -->
				</div><!-- end div row-table-->
				
				<?php
					for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){
				?>
						<div class="row-table cfx">
			    			<div class="score-match"><? echo $nb_buts[1][$correspondance[$match]][$parieurs[$parieur]['id']] ?></div><!-- end div score match -->
			    			<div class="score-match"><? echo $nb_buts[2][$correspondance[$match]][$parieurs[$parieur]['id']] ?></div><!-- end div score match -->
			    			<div class="score-match"><? echo $points[$correspondance[$match]][$parieurs[$parieur]['id']] ?></div><!-- end div score match -->
		    			</div><!-- end div row-table-->
		   		<?	}
				?>

		</div><!-- end div score -->
<?php
		}?>
		</div><!-- end div container-score-par-groupe -->
<?	}
?>
</div> <!-- end div container-scores -->
	</div> <!-- end div container-prono -->
</body>

</html>
