<? //var_dump($matchs[$nextGame->id_match]->visible); ?>
<table class="table">
	<thead>
		<tr></tr>
	<tr>
		<td colspan="11" class="top-table gradient-greytoblack radius">Classement</td>
		<td class="blank"></td>
		<td colspan="5" class="top-table gradient-greytoblack radius">Next Game</td>
	</tr>
	<tr class="blue-row">
		<th>Rank</th>
		<th>Name</th>
		<th>Total Pts</th>
		<td colspan="2">Good Outcome</td>
		<td colspan="2">Perfect Score</td>
		<td colspan="2">Bonus</td>
		<td colspan="2">Bonus</td>
		<td class="blank"></td>
		<td colspan="5"><?= $nextGame->Type_match.": ".$nextGame->equipe1.' '.$nextGame->equipe2; ?></td>
	</tr>
	</thead>
	<tr></tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>#</td>
		<td>Pts</td>
		<td>#</td>
		<td>Pts</td>
		<td colspan="2">Winner</td>
		<td colspan="2">Best Stricker</td>
		<td class="blank"></td>
		<td colspan="5"></td>
	</tr>
	<? $rank=0;$rank2=0;$score1="";$score2="";
	if (isset($sortedtotalpoints)){
		foreach($sortedtotalpoints as $parieur_id=>$totalpoint){ 
			if ($matchs[$nextGame->id_match]->visible){ 
				//echo "ecjo";
				$score1 = $paris[$parieur_id]->{'nb_but_e1_m'.$nextGame->id_match};
				$score2 = $paris[$parieur_id]->{'nb_but_e2_m'.$nextGame->id_match};
			}
			?>
		<tr>
			<td><? $rank +=1; echo $rank?></td>
			<td><?= $parieurs[$parieur_id]->nom_parieur; ?></td>
			<td><?= round($totalpoint,2)." pts"; ?></td>
			<td><?= $csens[$parieur_id]; ?></td>
			<td><?= $psens[$parieur_id]; ?> pts</td>
			<td><?= $cscore[$parieur_id]; ?></td>
			<td><?= $pscore[$parieur_id]; ?></td>
			<td><?= $paris[$parieur_id]->winner; ?></td>
			<td><?= ""."pts";//echo calculpointbonus(2,$j); ?></td>
			<td><?= $paris[$parieur_id]->best_striker; ?></td>
			<td><?= ""."pts"//echo calculpointbonus(1,$j); ?></td>
			<td class="blank"></td>
			<td><? $rank2 +=1; echo $rank2; ?></td>
			<td><?= $parieurs[$parieur_id]->nom_parieur; ?></td>
			<td><?= $score1; ?></td>
			<td>-</td>
			<td><?= $score2; ?></td>
		</tr>
		<? } 
	}else{
		foreach($parieurs as $parieur_id=>$parieur){ 
			if ($matchs[$nextGame->id_match]->visible){ 
				//echo "ecjo";
				$score1 = $paris[$parieur_id]->{'nb_but_e1_m'.$nextGame->id_match};
				$score2 = $paris[$parieur_id]->{'nb_but_e2_m'.$nextGame->id_match};
			}
			?>
			<tr>
			<td><? $rank +=1; echo $rank?></td>
			<td><?= $parieur->nom_parieur; ?></td>
			<td><?= "0 pts"; ?></td>
			<td><?= 0; ?></td>
			<td><?= 0; ?> pts</td>
			<td><?= 0; ?></td>
			<td><?= 0; ?></td>
			<td><?= $paris[$parieur_id]->winner; ?></td>
			<td><?= ""."pts";//echo calculpointbonus(2,$j); ?></td>
			<td><?= $paris[$parieur_id]->best_striker; ?></td>
			<td><?= ""."pts"//echo calculpointbonus(1,$j); ?></td>
			<td class="blank"></td>
			<td><? $rank2 +=1; echo $rank2; ?></td>
			<td><?= $parieurs[$parieur_id]->nom_parieur; ?></td>
			<td><?= $score1; ?></td>
			<td>-</td>
			<td><?= $score2; ?></td>
		</tr>
		<? }
	}?>
</table>
