<?php include('//////serv.php') ?> //το αρχείο serv.php δεν έχει υλοποιηθεί//
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styling.css">
  <title>E council</title>
</head>
<body >
  <div class="header">
  	<h2>Είσοδος</h2>
  </div>

  <form method="post" action=" login.php">
  	<div class="input">
  		<label>Email</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="input">
  		<label>Κωδικός</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input">
  		<button type="submit" class="btn" name="login_user">Είσοδος</button>
	</div>
	  <p>
		  Δεν είστε xrhsths;&nbsp;  <a href="////registration.php" style="color: #650000" ><u>Εγγραφή</u></a>
  	  </p>
  </form>
 			&nbsp;&nbsp;&nbsp;&nbsp;<a href="/////loginm.php" style="color: #400000">Administrator</a> /
			<a href="////////logind.php" style="color: #500000">Moderator</a>
</body>
</html>
