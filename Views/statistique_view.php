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


<div class="container-dropdown">
 <div class="dropdown">
    <select>
      <?php foreach($matchs as $match){ ?>
      <option value='<?= $match->id_match?>' <?php if($match->id_match == $nextGame->id_match){echo "selected";} ?>><?= $match->id_match.". ".$match->equipe1." - ".$match->equipe2; ?></option>

      <?php } ?>
    </select>
  </div>
   <div class="dropdown">
    <select>
      <?php foreach($parieurs as $parieur){ ?>
      <option value='<?= $parieur->id_parieur?>' <?php if($parieur->id_parieur == $thisparieurID){echo "selected";} ?>>Prono de <?= $parieur->nom_parieur ?></option>

      <?php } ?>
    </select>
  </div>
 </div><!-- end divcontainer dropdown -->


<div class="container-table">
 	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius" >Team 1 Winning</div>
		
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">Total</div>
			<div class="cell-stat">Percentage</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">2</div>
			<div class="cell-stat"> 10%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">1-0</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">2-0</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">2-1</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">3-0</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">3-1</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">3-2</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">4-0</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">4-1</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">4-2</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">4-3</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->

	</div><!-- end div container-table-stat-->
	

 	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius" >Team 1 Winning</div>
		
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">Total</div>
			<div class="cell-stat">Percentage</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">2</div>
			<div class="cell-stat"> 10%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">0-0</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">1-1</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">2-2</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">3-3</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">4-4</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		
	</div><!-- end div container-table-stat-->

	 	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius" >Team 1 Winning</div>
		
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">Total</div>
			<div class="cell-stat">Percentage</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat"></div>
			<div class="cell-stat">2</div>
			<div class="cell-stat"> 10%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">0-1</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">0-2</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">1-2</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">0-3</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">1-3</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">2-3</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">0-4</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">1-4</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">2-4</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->
		<div class="row-table">
			<div class="cell-stat">3-4</div>
			<div class="cell-stat">1</div>
			<div class="cell-stat">2%</div>
		</div><!-- end div row table-->

	</div><!-- end div container-table-stat-->

	
</div><!-- end div container-table-->	

</body>
</html>