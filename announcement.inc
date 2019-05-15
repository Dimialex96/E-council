<?php
//announcement
class Announcement {
  var $content;
  var $date;
  var $category;
  var $publish_day;
  var $publisher;

  function __construct($content,$date,$category,$publish_day,$publisher)
  {
    $this->content = $content;
    $this->date = $date;
    $this->category = $category;
    $this->publish_day = $publish_day;
    $this->publisher = $publisher;
  }
}
//manage_announcement
class Manage_announcement extends Announcement {
  function __construct()
  {
    parent::__construct("content","date","category","publish_day","publisher")
  }
  function show_options()
  {

  }
  function check_formatting()
  {

  }
  function request_confirm()
  {

  }
  function db_insert_announcement()
  {

  }
  function modification()
  {

  }
  function db_select_announcement()
  {

  }
  function edit_announcement()
  {

  }
  function db_update_announcement()
  {

  }
  function db_delete_announcement()
  {

  }
}
//result
class Results extends Announcement {
  function __construct()
  {
    parent::__construct("content","date","category","publish_day","publisher")
  }
  function show_results()
  {

  }
}
?>
