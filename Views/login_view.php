<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <title>Brasil 2014</title>
</head>

<body>
    
    <header>
      <div id='wrapper'><h1>Brasil 2014</h1></div>
    </header> 
<div id="login_container" class='cfx'>
  <?php

        if( !empty( $message ) )
      {
        //echo "oui";
        echo "<div class='LogMessage'>".sprintf( '<p>%s</p>', $message )."</div> <!-- end div LogMessage-->"; 
      }
    ?>
  <div id="loginleft">

  	
  	<form action="signup" method="POST" id="insert">
  		
      <div class="input-line">
        NEW PLAYER
      </div><!-- end div input line -->
      <div class="input-line">
        <label for="cname">NickName</label>
        <input type="text" size=40 id="cname" class="required" minlength="2" name="name" value=<?=$name?>>
      </div><!-- end div input line -->
      <div class="input-line">
        <label for="cemail">email</label>
        <input type="text" id="cemail" name="email" size="25"  class="required email" value=<?=$email?>>
      </div><!-- end div input line -->

      <div class="input-line">
        <label for="cpassword">Password</label>
        <input type="password" id="cpassword" size=25 class="required" minlength="4" name="password">
      </div><!-- end div input line -->

      <div class="input-line">
        <label for="cpassword2">Re input Password</label>
        <input type="password" id="cpassword2" size=25 class="required" minlength="4" name="RePassword">
      </div><!-- end div input line -->

     <input type="submit" class="button" id="signup" name="submit" value="SignUp">
    </form>

  </div> <!-- end div login left -->
  <div id="loginright">
  		<form action="signin" method="POST" id="insert2">
  		<div class="input-line">
        EXISTING PLAYER
      </div><!-- end div input line -->
      <div class="input-line">
        <label>NickName</label>
        <input type="text" size=40 name="name">
      </div><!-- end div input line -->
      
      <div class="input-line">
        <label>Password</label>
        <input type="password" size=40 name="password">
      </div><!-- end div input line -->


     <input type="submit" class="button" name="submit" id="signup" value="SignIn">
</form>
     </table>`
  </div> <!-- end div login right -->
</div> <!-- end div login container -->
<script type="text/javascript">

	$(document).ready(function(){
		console.log("test");
		$("#insert").validate();

	});
</script>

</body>
</html>

