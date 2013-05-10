<?php
      session_start();
      //recup des variables de session
      include "Module/loadsessionvars.php";
      include "Module/security.php";

      check_admin($parieur_id);
      include "header.php";
      ?>
      <h2> Delete a player</h2>
      <form action="Controller/removeplayer.php" method="POST" id="insert">
                  <div id="container">
                        

            <table>
                  <tr>
                        <td ><? echo "Which player you want ot delete?"; ?></td>
                        <td  ><select size=1 name="player_id">
                              <? asort($parieurs);
                              foreach($parieurs as $key=>$value){
                              echo '<option value="'.$value["id"].'">'.$value["id"]." ".$value["name"].'</option>';
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

