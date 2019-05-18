<?php
//session
class Session {
 
  $db = mysqli_connect('localhost','root','', 'ecounicldb');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
  
  
  var $session_id;
  var $duration;
  var $start_date;
  var $end_date;
  var $extention;
  var $session_status;
  $extention = $_POST['extention'];
  $end_date = $_POST['end_date'];
  function __construct($duration,$start_date,$end_date,$activity)
  {
    $this->duration = $duration;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->session_status = $session_status;
    $this->session_id = $session_id;
  }
  function update_session ($session_id,$extention,$end_date)
  {
    $end_date = $end_date + $extention;
    $next_session_id = ($session_id + '1') % '3' ;
    $query = "UPDATE sessions SET end_date = '$end_date'  WHERE session_id = '$session_id'";
    $query = "SELECT start_date FROM sessions WHERE session_id = '$next_session_id'";
    $query = "UPDATE sessions SET start_date = '$end_date'  WHERE session_id = '$next_session_id'";
  }
  function redirect_to_active_session ()
  {
    $query = "SELECT session_id FROM sessions WHERE session_status = '1'";
    if (session_id = 0) {
      header('forum_session.php');
    } elseif (session_id = 1) {
      header('post_solution.php');
    } else {
      header('vote_solution.php');
    }

  }
  function select_session ()
  {
    $query = "SELECT * FROM sessions ";
    $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo ":session_id " . $row["session_id"].  "&nbsp&nbspSession&nbspName&nbsp" .$row['session_name'].
              "&nbsp&nbspStart&nbspDate&nbsp" .$row['start_date']."&nbsp&nbspEnd&nbspDate&nbsp" .$row['end_date']."&nbsp&nbspActivity&nbsp" .$row['activity_numbers']. "<br>" ;
            }
      } else {
            echo "0 results";
      }
  }
  function session_status ()
  {
     $query = "SELECT * FROM sessions WHERE session_status = '1' ";
    $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo ":session_id " . $row["session_id"].  "&nbsp&nbspSession&nbspName&nbsp" .$row['session_name'].
              "&nbsp&nbspStart&nbspDate&nbsp" .$row['start_date']."&nbsp&nbspEnd&nbspDate&nbsp" .$row['end_date']."&nbsp&nbspActivity&nbsp" .$row['activity_numbers']. "<br>" ;
            }
      } else {
            echo "0 results";
      }

  }
}
//council_session
class Council_Session extends Session {
  var $solution_vote_count;
  var $solution_id;
  $solution_id = $_POST['solution_id'];
  
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
 function update_solution_vote() {
   $query = "SELECT solution_vote_count FROM solutions WHERE solution_id = '$solution_id'";
   $solution_vote_count++ ;
   $query = "UPDATE solution SET solution_vote_count = '$solution_vote_count'  WHERE solution_id = '$solution_id'";
}
  function select_solutions(){
    $query = "SELECT * FROM subjects ORDER BY subject_vote_count DESC LIMIT 10";
    $result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "&nbspid Θέματος:&nbsp". $row["solution_id"]. "&nbspΑναγνωριστικό Θέματος:&nbsp" . $row["subject_name"].  "&nbsp&nbspΠεριεχόμενο&nbsp" .$row['subject_description'].  "<br>" ;
    }
} else {
    echo "0 results";
} 
    $query = "SELECT * FROM subjects ORDER BY subject_vote_count DESC LIMIT 10";
    $result1 = mysqli_query($db, $query);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
        echo "solution_subject: " . $row["solution_subject"]. "<br>""solution_i" .$row['solution_id']. "&nbsp&nbspΛύση:&nbsp" .$row['solution_content'].
         "<br>" ;
    }
} else {
    echo "0 results";
} 

  }
//forum_session
class Forum_Session extends Session {
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
  function show_search_modes()
  {

  }
  function show_selected_mode()
  {

  }
  function db_search_subject()
  {

  }
  function db_select_subject()
  {

  }
}
class Post_Subject extends Forum_Session {
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
  function request_subject()
  {

  }
  function request_confirm()
  {

  }
  function db_insert_subject()
  {

  }
  function send_to_moderator()
  {

  }
}
//comment_subject
class Comment_Subject extends Post_Subject {

}
//post solution
class Post_Solution extends Council_Session {
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
  function check_formatting()
  {

  }
  function db_insert_solution()
  {

  }
  function db_select_solution()
  {

  }
  function send_solution_to_moderator()
  {

  }
}
//vote solution
class Vote_Solution extends Council_Session {
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
  function check_for_not_selected_solution()
  {

  }
  function request_confirm()
  {

  }
  function db_select_vote_solution()
  {

  }
  function db_vote_select()
  {

  }
}
?>
