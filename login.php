<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Morning Glory Coffee</title>
</head>
<body class="bg-img1">
  <div class="header">
  	<h2>Είσοδος</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Κωδικός</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Είσοδος</button>
  	</div>
  	<p>
		  Δεν είστε μέλος;&nbsp;  <a href="register.php" style="color: #800000" ><u>Εγγραφή</u></a>
  	</p>
  </form>
 			&nbsp;&nbsp;&nbsp;&nbsp;<a href="loginm.php" style="color: #800000">Manager</a> /
			<a href="logind.php" style="color: #800000">Διανομέας</a>
			<h1><i><br><br><font color = 'white'>Morning Glory<br>Coffee</i></font></h1>

</body>
</html>
