<?php
function check_admin($parieur_id){
	//echo "vous etes ici";
      if($parieur_id == 1){
      		return true;
      	}else{
            $mess = "Access Forbidden, please Login as an Admin to access this page";
    		header('Location: login.php?Message='.$mess);
    		exit();
      		return false;
       	}
}

function check_user($parieur_id){
	//echo "vous etes ici";
      if(isset($parieur_id)){
      		return true;
      	}else{
            $mess = "Please Log in to access this page";
    		header('Location: login.php?Message='.$mess);
    		exit();
      		return false;
      	}
}



 /*if($parieur_id !=1){
      		//echo "vous etes la";
            $mess = "Access Forbidden, please Login as an Admin to access this page";
    		header('Location: login.php?Message='.$mess);
      }
*/
?>