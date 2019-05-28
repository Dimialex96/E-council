<?php
class Filter_Forum {

}

//social_hour
class Social_Hour {
  var $suspender;
  var $social_hour_subject;

  function __construct($suspender,$social_hour_subject)
  {
    $this->suspender = $suspender;
    $this->social_hour_subject = $social_hour_subject;
  }

  function voted_already()
  {

  }

  function sh_vote_db_update()
  {

  }

  function redirect_to_rejection_page()
  {

  }
}
?>
