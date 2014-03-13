<div class="container-dropdown">
 <div class="dropdown match">
    <select>
      <?php foreach($matchs as $match){ ?>
      <option value='<?= $match->id_match?>' <?php if($match->id_match == $nextGame->id_match){echo "selected";} ?>><?= $match->id_match.". ".$match->equipe1." - ".$match->equipe2; ?></option>

      <?php } ?>
    </select>
  </div>
   <div class="dropdown parieur">
    <select>
      <?php foreach($parieurs as $parieur){ ?>
      <option value='<?= $parieur->id_parieur?>' <?php if($parieur->id_parieur == $thisparieurID){echo "selected";} ?>>Prono de <?= $parieur->nom_parieur ?></option>

      <?php } ?>
    </select>
  </div>
 </div><!-- end divcontainer dropdown -->

<div id="chartdiv" style="width:600px; height:400px;">

</div><!-- end div pie -->


<div class="container-table">
	<div id="equipetest">test equipe</div>
 	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius4" ><div id="equipe1"><?= $nextGame->equipe1 ?></div><?= ": "?><div class="count1"><?= $count1; ?></div><?= " ; ".round(100*$count1/$NombreParieurs,2)."%"; ?>
		</div>
		
		<div class="top-table gradient-greytoblack radius" >
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<?php foreach ($state1 as $stat){ ?>
			<div class="row-table">
			<div class="cell-stat"><?=$stat->score_e1."-".$stat->score_e2 ?></div>
			<div class="cell-stat"><?= $stat->nb ?></div>
			<div class="cell-stat"><?= round($stat->nb/$NombreParieurs*100,2); ?></div>
		</div><!-- end div row table-->
		<?php } ?>
	</div><!-- end div container-table-stat-->
	

 	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius4 " ><?= "Draw : "?><span id="countN"><?=$countN ;?></span> <?=round(100*$countN/$NombreParieurs,2)."%"; ?></div>

		<div class="top-table gradient-greytoblack radius" >
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<?php foreach ($statdraw as $stat){ ?>
		<div class="row-table">
			<div class="cell-stat"><?=$stat->score_e1."-".$stat->score_e2 ?></div>
			<div class="cell-stat"><?= $stat->nb ?></div>
			<div class="cell-stat"><?= round($stat->nb/$NombreParieurs*100,2); ?></div>
		</div><!-- end div row table-->
		<?php } ?>

	</div><!-- end div container-table-stat-->

	<div class="container-table-stat">
		<div class="top-table gradient-greytoblack radius4" ><span id="equipe2"><?= $nextGame->equipe2 ?></span><?= ": "?><span id="count1"><?= $count2; ?></span><?= " ; ".round(100*$count1/$NombreParieurs,2)."%"; ?></div>

		<div class="top-table gradient-greytoblack radius" >
			<div class="cell-stat">score</div>
			<div class="cell-stat">#</div>
			<div class="cell-stat">%</div>
		</div><!-- end div row table-->
		<?php foreach ($state2 as $stat){ ?>
		<div class="row-table">
			<div class="cell-stat"><?=$stat->score_e1."-".$stat->score_e2 ?></div>
			<div class="cell-stat"><?= $stat->nb ?></div>
			<div class="cell-stat"><?= round($stat->nb/$NombreParieurs*100,2); ?></div>
		</div><!-- end div row table-->
		<?php } ?>

	</div><!-- end div container-table-stat-->

	
</div><!-- end div container-table-->	
<script type="text/javascript">

  $(document).ready(function(){
  	 console.log("entre javascript 2");
  	$('.match select:not(.bound)').addClass('bound').bind('change',  onSelectChanged);
  	function onSelectChanged(){

		var parsedTest = $(".match select option:selected").val();
		var postData="match="+parsedTest;
		
		$.post('stat', postData,function(data){
	        
	        var $content = $(data).filter('#equipetest');
	        console.log($content.html());

	        //console.log(content);
			$(".container-table").fadeOut('200',function(){
			//	$(".container-table").html(content.html());
				//$("#chartdiv").html(pie.html());
				onSelectChangedParieur();
				//RunAmCharts();
				$(".container-table").fadeIn('400',function(){
				})
			})
		})

	}
	$('.parieur select:not(.bound)').addClass('bound').bind('change',  onSelectChangedParieur);
	onSelectChangedParieur();
	function onSelectChangedParieur(){
		$(".highlighted").removeClass("highlighted");
		var parieur_id = $(".parieur select option:selected").val();
		var paris = <?php echo json_encode($paris) ?>;
		var pari =paris[parieur_id];
		var id_match= $(".match select option:selected").val();

		var aux1 = "nb_but_e1_m"+id_match;
		var aux2 = "nb_but_e2_m"+id_match;
		var pari_e1 = pari[aux1];
		var pari_e2 = pari[aux2];
		var testif=pari_e1+"-"+pari_e2;
		console.log(testif);
		$(".cell-stat").each(function(){
			if($(this).text()==testif){
				console.log('rentre');
				$(this).parent().addClass('highlighted');
			}
		})

	}



	 console.log("entre javascript");
        function RunAmCharts() {
        	console.log("entre fonction RunAmcharts");
            var chart;

            var chartData = [
                {
                    "country":  "Germany" ,
                    "visits": <?php echo $count1;?>
                },
                {
                    "country": "Draw",
                    "visits": <?php echo $countN;?>
                },
                {
                    "country": "Ghana",
                    "visits": <?php echo $count2;?>
                }
                
            ];

          
            	 // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("Visitors countries", 16);

                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "visits";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE                                 
                chart.write("chartdiv");
            }
            AmCharts.ready(function () {
               RunAmCharts();
            });



  });	


 </script>

</body>
</html>