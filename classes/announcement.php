<?php
//announcement
class Announcement {
  var $announcement_content;
  var $announcement_category;
  var $announcement_date;
  var $announcement_by;

  function __construct($content,$date,$category,$publish_day,$publisher)
  {
    $this->announcement_content = $announcement_content;
    $this->announcement_date = $announcement_date;
    $this->announcement_category = $announcement_category;
    $this->announcement_by = $announcement_by;
  }
}

//manage_announcement class
class Manage_announcement extends Announcement {
  private $announcement_id = $_POST['announcement_id'];
  private $announcement_content = $_POST['announcement_content'];
  private $kindofannouncement = $_POST['kindofannouncement'];
  private $option = $_POST['option'];

  public function __construct()
  {
    parent::__construct("content","date","category","publish_day","publisher")
  }

  public function show_options()
  {
    header("Location: announcements.php");
  }

  public function check_formatting_announcement($announcement_content,$kindofannouncement)
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
        update_announcement($announcement_content,$announcement_id);
        die();
      }
    }
    }
  }

  public function insert_announcement($announcement_content,$announcement_date,$announcement_by,$announcement_category)
  {
    $announcement_date = GETDATE();
    $announcement_by = $_POST['username']
    $query = "INSERT INTO announcements (announcement_content, announcement_date, announcement_by, announcement_category) VALUES ('$announcement_content','$announcement_date','$announcement_by','$announcement_category')";
    mysqli_query($db, $query);
  }

  public function select_options($option)
  {
    if ($option = 'add') {
      header("Location: add_announcement.php");
    } else {
      header("Location: edit_announcement.php"); // to edit exei modify kai delete kai prin to select poia
    }
  }

  public function select_announcement()
  {
    $query = "SELECT * FROM announcements ORDER BY announcement_date DESC";
    $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo ":announcement_id " . $row['announcement_id'].  "&nbsp&nbspContents&nbsp" .$row['announcement_content'].
              "&nbsp&nbspDate&nbsp" .$row['announcement_date']."&nbsp&nbspBy&nbsp" .$row['announcement_by']. "<br>" ;
            }
      } else {
              echo "0 results";
      }
  }

  public function update_announcement($announcement_content,$announcement_id)
  {
    $query = "UPDATE announcement SET announcements_content = '$announcement_content'  WHERE anouncement_id = '$announcement_id'";
    mysqli_query($db, $query);
  }

  public function delete_announcement($announcement_id)
  {
    $query = "DELETE FROM announcements WHERE anouncement_id = '$announcement_id' ";
    mysqli_query($db, $query);
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
