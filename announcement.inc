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
  $announcement_id = $_POST['announcement_id'];
  $announcement_content = $_POST['announcement_content'];
  $kindofannouncement = $_POST['kindofannouncement'];
  $option = $_POST['option'];


  function __construct()
  {
    parent::__construct("content","date","category","publish_day","publisher")
  }
  function show_options()
  {
    header("Location: announcements.php");
  }
  function check_formatting($announcement_content,$kindofannouncement)
  {
    $stringlength = strlen($announcement_content);
    if ( $stringlength >= "200" ) {
      echo "Too many characters" ;
      header("Location: post_announcement.php");
      die();
    } else {
      if ($kindofannouncement == 'new' ) {
        insert_announcement($announcement_content);
        die();
      } else ($kindofannouncement == 'old') {
        update_announcement($announcement_content);
        die();
      }
    }
    }
  }
  function insert_announcement($announcement_content)
  {
    $announcement_date = date();
    $announcement_by = $_POST['username']
    // $announcement_content = $_POST['announcement_content'];
    $query = "INSERT INTO announcements (announcement_id, announcement_content, announcement_date, announcement_by) VALUES ('$announcement_id', '$announcement_content','$announcement_date','$announcement_by')";

  }
  function options($option)
  {
    if ($option = 'add') {
      header("Location: add_announcement.php");
    } else {
      header("Location: edit_announcement.php"); // to edit exei modify kai delete kai prin to select poia
    }

  }
  function select_announcement()
  {

    $query = "SELECT * FROM announcements ORDER BY announcement_date DESC";
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
  function edit_announcement()
  {

  }
  function update_announcement($announcement_content,$announcement_id)
  {
    $query = "UPDATE announcement SET announcements_content = '$announcement_content'  WHERE anouncement_id = '$announcement_id'";
  }
  function delete_announcement($announcement_id)
  {
    $query = "DELETE FROM announcements WHERE anouncement_id = '$announcement_id' ";
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
      //results
      echo"results.php"
  }
}
?>
