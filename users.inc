<?php
// user
class user {
  var $name;
  var $surname;
  var $username;
  var $password;
  var $email;
  var $id;

  function __construct($name,$surname,$username,$password,$email,$id)
  {
    $this->name = $name;
    $this->surname = $surname;
    $this->password = $password;
    $this->username = $username;
    $this->email = $emal;
    $this->id = $id;
  }
}
//student
class Student extends user {
  var $etos;
  var $AM;
  function __construct()
  {
    parent::__construct("name","surname","username","password","email","id")
  }
  function write_subject()
  {

  }
  function write_solution()
  {

  }
  function confirm()
  {

  }
  function select_vote_subject()
  {

  }
  function submit_vote()
  {

  }
  function validate_vote()
  {

  }
  function select_solutions()
  {

  }
  function insert_search_parameters()
  {

  }
  function select_result()
  {

  }
}
//admin
class Admin extends user {
  function __construct()
  {
    parent::__construct("name","surname","username","password","email","id")
  }
  function add_title_content()
  {

  }
  function select_announcements()
  {

  }
  function selection()
  {

  }
  function confirm()
  {

  }
  function change_content()
  {

  }
  function show_session_information()
  {

  }
  function request_approve_next()
  {

  }
  function extend_current_session()
  {

  }
  function insert_time_extention()
  {

  }
  function confirm_time_extention()
  {

  }
}
//professor
class Professor extends user {
  function __construct()
  {
    parent::__construct("name","surname","username","password","email","id")
  }
  function post_social_hour_subject()
  {

  }
}
//moderator
class Moderator extends user {
  function __construct()
  {
    parent::__construct("name","surname","username","password","email","id")
  }
  function subject_is_appropriate()
  {
      //if-else
  }
  function subject_duplicate()
  {
    //if-else
  }
}
?>
