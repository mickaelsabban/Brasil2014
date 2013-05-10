      <h2> Delete a player</h2>
      <form action="remove" method="POST" id="insert">
                  <div id="container">
                        

            <table>
                  <tr>
                        <td ><?= "Which player you want ot delete?"; ?></td>
                        <td  ><select size=1 name="player_id">
                              <?php
                              foreach($parieurs as $parieur){
                              echo '<option value="'.$parieur->id_parieur.'">'.$parieur->id_parieur." ".$parieur->nom_parieur.'</option>';
                              }?>
                        </td>
                        
                  </tr>
                   <tr>
                        <td colspan=15 id="sub"><input type="submit" name="submit" value="submit" ></td>
                  </tr>
            </table>
      </div><!-- end div container -->
                 
      </form>
      <a href="pronostic.php" > go back to index </a>
</BODY>
</Html>

