<?php
//session
class Session {
  var $duration;
  var $start_date;
  var $end_date;
  var $activity;

  function __construct($duration,$start_date,$end_date,$activity)
  {
    $this->duration = $duration;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->activity = $activity;
  }
  function allow_student ()
  {

  }
  function reject_student ()
  {

  }
  function request_confirm_extention ()
  {

  }
  function db_update ()
  {

  }
  function redirect_to_active_session ()
  {

  }
  function db_select_session ()
  {

  }
  function session_status ()
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
