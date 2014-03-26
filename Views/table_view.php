<div id="content-fix">
	<table class='table container-groupes'>
		<? foreach ($groupes as $groupe) { ?>
			
			<thead>
				<tr></tr>
				<tr>
					<td class='top-table gradient-greytoblack radius' colspan="5"><? echo $groupe->name." ".$groupe->name2 ?></td>
				</tr>
				<tr class="blue-row"> 
					<td colspan="5"> Resultats </td>
				</tr>
			</thead>
			<? for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){ ?>
			<tr>
				<td><?php echo $matchs[$correspondance[$match]]->equipe1 ?></td>
				<td><? echo $matchs[$correspondance[$match]]->score_e1 ?></td>
				<td>:</td>
				<td><? echo $matchs[$correspondance[$match]]->score_e2 ?></td>
				<td><? echo $matchs[$correspondance[$match]]->equipe2 ?></td>
			</tr>
			<? }?>
			<tr class="blank"><td class="blank"></td>
			</tr>

		<? } ?>
	</table>

	<div class="container_scores">
		<? foreach ($parieurs as $id=>$parieur){ ?>
			<table class="table score">
				<? foreach ($groupes as $groupe) { ?>
					<tr></tr>
					<tr>
						<td class="top-table radius" colspan="3"><? echo $parieur->nom_parieur; ?></td>
					</tr>
					<tr>
						<td>E1</td>
						<td>E2</td>
						<td>Pts</td>
					</tr>
					<? for ($match = $groupe->matchdebut; $match <= $groupe->matchfin; $match++){ ?>
						<tr>
							<? if ($groupe->visible==true){ ?>
								<td><?php echo (isset($paris[$id]->{'nb_but_e1_m'.$correspondance[$match]}) ? $paris[$id]->{'nb_but_e1_m'.$correspondance[$match]} : "") ;?></td>
								<td><?php echo (isset($paris[$id]->{'nb_but_e2_m'.$correspondance[$match]}) ? $paris[$id]->{'nb_but_e2_m'.$correspondance[$match]} : "") ;?></td>
								<td><?php echo round($points[$id][$correspondance[$match]],2); ?></td>
							<? }else{ ?>
								<td><?php echo " ";?></td>
								<td><?php echo " ";?></td>
								<td><?php echo 0; ?></td>
							<? } ?>
						</tr>
					<? } ?>	
					<tr class="blank"><td class="blank"></td>
					</tr>	
				<? } ?>
			</table>	
		<? } ?>
	</div>
</div>


