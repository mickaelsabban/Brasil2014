<table class="table container-table-main">
	<thead>
	<tr>
		<td colspan="3" class="top-table gradient-greytoblack radius">Ranking</td>
		<td colspan="1" class="blank"></td>
		<td colspan="5" class="top-table gradient-greytoblack radius">Next Game</td>
	
	</tr>
	<tr>
		<td>Rank</td>
		<td>Name</td>
		<td>Total Pts</td>
		<td class="blank"></td>
		<td colspan="5"><?= $nextGame->Type_match.": ".$nextGame->equipe1.' '.$nextGame->equipe2; ?></td>

	</tr>
</thead>
	<? $rank=0;$rank2=0;
	foreach($sortedtotalpoints as $parieur_id=>$totalpoint){ ?>
	<tr>
		<td><? $rank +=1; echo $rank; ?></td>
		<td><?= $parieurs[$parieur_id]->nom_parieur; ?></td>
		<td><?= round($totalpoint,2)." pts"; ?></td>
		<td class="blank"></td>
		<td><? $rank2 +=1; echo $rank2; ?></td>
		<td><?= $parieurs[$parieur_id]->nom_parieur; ?></td>
		<td><?= $paris[$parieur_id]->{'nb_but_e1_m'.$nextGame->id_match}; ?></td>
		<td>-</td>
		<td><?= $paris[$parieur_id]->{'nb_but_e2_m'.$nextGame->id_match} ?></td>
	</tr>
	<? } ?>
</table>