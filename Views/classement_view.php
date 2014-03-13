<table class="table">
	<tr>
		<td colspan="11" class="top-table gradient-greytoblack radius">Classement</td>
		<td class="blank"></td>
		<td colspan="5" class="top-table gradient-greytoblack radius"></td>
	</tr>
	<tr>
		<td>Rank</td>
		<td>Name</td>
		<td>Total Pts</td>
		<td colspan="2">Good Outcome</td>
		<td colspan="2">Perfect Score</td>
		<td colspan="2">Bonus</td>
		<td colspan="2">Bonus</td>
		<td class="blank"></td>
		<td colspan="5"><?= $nextGame->Type_match.": ".$nextGame->equipe1.' '.$nextGame->equipe2; ?></td>
	</tr>
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
	<? foreach($sortedtotalpoints as $parieur_id=>$totalpoint){ ?>
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
		<td><?= $paris[$parieur_id]->{'nb_but_e1_m'.$nextGame->id_match}; ?></td>
		<td>-</td>
		<td><?= $paris[$parieur_id]->{'nb_but_e2_m'.$nextGame->id_match} ?></td>
	</tr>
	<? } ?>
</table>
