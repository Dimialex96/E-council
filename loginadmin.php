<?php include('/////////////////serverm.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styling.css">
  <title>E council</title>
</head>
    <style> 
       body {
         background-image: url("images/vote1.jpg");
         min-height: 690px;
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         position: relative;}
      </style>

  
  	<h2>Είσοδος Administrator</h2>

  <form method="post" action="loginadmin.php">
  	
  	<div class="input">
  		<label>Username</label>
  		<input type="text" name="user_name" >
  	</div>
  	<div class="input">
  		<label>Κωδικός</label>
  		<input type="user_pass" name="user_word">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_administrator">Είσοδος</button>
  	</div>
  </form>
  </br> </br> </br> </br><h1><font color="white"><i>E council Online</br>Voting n Forum</i></font></h1>
</body>
</html>
