<?php
session_start();
$email = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'ecouncildb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $user_email = mysqli_real_escape_string($db, $_POST['user_email']);
  $user_pass = mysqli_real_escape_string($db, $_POST['user_pass']);
  $user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']);
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $user_firstname = mysqli_real_escape_string($db, $_POST['user_firstname']);
  $user_lastname = mysqli_real_escape_string($db, $_POST['user_lastname']);
  $user_date = mysqli_real_escape_string($db, $_POST['user_date']);


  if (empty($user_email)) { array_push($errors, "Απαιτείται email"); }
  if (empty($user_pass)) { array_push($errors, "Απαιτείται κωδικός"); }
  if ($user_pass != $user_pass2) {
	array_push($errors, "Οι δυο κωδικοί δεν ταιριάζουν");
  }
  
  if ($user) { 
        if ($user['user_email'] === $user_email) {
      array_push($errors, "Το email υπάρχει ήδη");
    }
  }
  if (count($errors) == 0) {
  	$user_pass =$user_pass;

  	$query = "INSERT INTO student (user_email, password )
  			  VALUES('$user_email', '$user_pass' )";
  	mysqli_query($db, $query);
  	$_SESSION['user_email'] = $user_email;
  	$_SESSION['success'] = "Είστε Συνδεδεμένος";
  	header('location: ///////////index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $user_email = mysqli_real_escape_string($db, $_POST['user_email']);
  $user_pass = mysqli_real_escape_string($db, $_POST['user_pass']);

  if (empty($user_email)) {
  	array_push($errors, "Απαιτείται email");
  }
  if (empty($user_pass)) {
  	array_push($errors, "Απαιτείται κωδικός");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM student WHERE email='$user_email' AND password='$user_pass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "";
  	  header('location: //////////index.php');
  	}else {
  		array_push($errors, "Λανθασμένος συνδιασμός user_email/user_password");
  	}
  }
}

?>
