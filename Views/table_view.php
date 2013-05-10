<div id='container-prono' class='cfx'>
	<div id="container-groupes" class='cfx'>			
		<?php foreach ($groupes as $groupe) { ?>
			<div class='groupe cfx'>
				<div class="top-table radius gradient-greytoblack"><?php echo $groupe->name." ".$groupe->name2 ?></div><!-- end div top-table-->
				<div class="row-table">Resultats</div><!-- end div row-table -->

				<?php
				for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){ ?>
				<div class="row-table cfx">
					<div class='country'><?php echo $matchs[$correspondance[$match]]->equipe1 ?></div><!-- end div country-->
					<div class="score-match"><?php echo $matchs[$correspondance[$match]]->score_e1 ?></div><!-- end div score match-->
					<div class="score-match">:</div><!-- end div score match-->
					<div class="score-match"><?php echo $matchs[$correspondance[$match]]->score_e2 ?></div><!-- end div score match-->
					<div class='country'><?php echo $matchs[$correspondance[$match]]->equipe2 ?></div><!-- end div country-->
				</div><!-- end div row-table-->
				<?php } ?>			
			</div><!-- end div groupe -->
		<?php } ?>
	</div> <!-- end div container groupes -->
	<div id="container_scores" class='cfx'>
		<?php foreach ($groupes as $groupe) { ?>
			<div class="container-score-par-groupe">
				<?php foreach ($parieurs as $id=>$parieur){ ?>
					<div class="score">
						<div class="top-table"><?php echo $parieur->nom_parieur; ?></div><!-- end div top-table-->
						<div class="row-table cfx">
							<div class="score-match">E1</div><!-- end div score match -->
							<div class="score-match">E2</div><!-- end div score match -->
							<div class="point-match">Pts</div><!-- end div score match -->
						</div><!-- end div row-table-->

						<?php for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){ ?>
							<div class="row-table cfx">
								<div class="score-match"><?php echo $paris[$id]->{'nb_but_e1_m'.$correspondance[$match]};//$nb_buts[1][$correspondance[$match]][$parieurs[$parieur]['id']] ?></div><!-- end div score match -->
								<div class="score-match"><?php echo $paris[$id]->{'nb_but_e2_m'.$correspondance[$match]};//$nb_buts[2][$correspondance[$match]][$parieurs[$parieur]['id']] ?></div><!-- end div score match -->
								<div class="point-match"><?php echo $points[$id][$correspondance[$match]]; ?></div><!-- end div score match -->
							</div><!-- end div row-table-->
						<?php	} ?>
					</div><!-- end div score -->
				<?php } ?>
			</div><!-- end div container-score-par-groupe -->
		<?php } ?>
	</div> <!-- end div container-scores -->
</div> <!-- end div container-prono -->
</body>
</html>