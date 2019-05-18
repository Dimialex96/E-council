<?php
//session
class Session {
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
    $query = "SELECT session_id FROM sessions WHERE session_status = 'ACTIVE'";
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
    $query = "SELECT * FROM sessions WHERE session_status = '1' ";
    $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo ":announcement_id " . $row["announcement_id"].  "&nbsp&nbspContents&nbsp" .$row['announcement_content'].
              "&nbsp&nbspDate&nbsp" .$row['announcement_date']."&nbsp&nbspBy&nbsp" .$row['announcement_by']. "<br>" ;
            }
      } else {
            echo "0 results";
      }
  }
  function session_status ()
  {

  }
  function show_session_infos()
  {

  }
}
//council_session
class Council_Session extends Session {
  function __construct()
  {
    parent::__construct("duration","start_date","end_date","activity")
  }
  function session_active()
  {

  }
  function request_student()
  {

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
