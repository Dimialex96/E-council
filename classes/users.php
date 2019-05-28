<?php
abstract class user {
  protected $username = " ";
  protected $lastname = " ";
  protected $firstname = " ";
  protected $password = " ";
  protected $email = " ";
  protected $id = 0;
  protected $level = " ";

  abstract protected function allow();

  function __construct($username,$lastname,$firstname,$password,$email,$id,$level) {
    $this->username = $_POST['username'];
    $this->lastname = $_POST['lastname'];
    $this->firstname = $_POST['firstname'];
    $this->password = $_POST['password'];
    $this->email = $_POST['email'];
    $this->id = $_POST['id'];
    $this->level = $_POST['level'];
  }
}

class Student extends user {

  private $subject_by;
  private $countpost;
  private $countsolution;
  private $countvotesolution;
  //connection to database
  $db = mysqli_connect('localhost','root','', 'ecounicldb');
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  function __construct($username,$lastname,$firstname,$password,$email,$id,$level,$etos,$subject_by,$countpost,$countsolution,$countvotesolution) {
    parent::__construct($username,$lastname,$firstname,$password,$email,$id,$level);
    $this->subject_by = $_POST['subject_by'];
    $this->countpost = $countpost;
    $this->countsolution = $countsolution;
    $this->countvotesolution = $countvotesolution;
  }
  //getter gia to orio tou student sto na parathesei subject
  public function getCountpost() {
    $query = "SELECT countpost FROM student WHERE student_id = '$student_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH) {
     $countpost .= $row['countpost'];
    }
    return $this->countpost;
  }
  //elegxos an epitrepete ston student na parathesei subject, tou epitrepete 5 subject ana session
  public function allow($countpost,$student_id) {
    if ($countpost > 0) {
      $countpost = $countpost - 1;
      $query = "UPDATE student SET countpost = '$countpost'  WHERE student_id = '$student_id'";
      mysqli_query($db, $query);
      header("Location: post_subject.php");
    } else {
      echo "Den epitrepete na parathesete thema, exete ipervei to orio";
    }
  }
  //getter gia to orio tou student sto na parathesei solution
  public function getCountsolution() {
    $query = "SELECT countsolution FROM submittedsolutions WHERE sub_student = '$student_id' AND onsubject = '$subject_id' ";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH) {
     $countsolution .= $row['countsolution'];
    }
    return $this->countsolution;
  }
  //elegxos an epitrepete ston student na parathesei solution, tou epitrepete mono 1 solution se kathe ena subject ana session
  public function allow($countsolution,$student_id,$subject_id) {
    if ($countsolution > 0) {
      $countsolution = $countsolution - 1;
      $query = "UPDATE submittedsolutions SET countsolution = '$countsolution'  WHERE sub_student = '$student_id' AND onsubject = '$subject_id'";
      mysqli_query($db, $query);
      header("Location: post_solution.php");
    } else {
      echo "Den epitrepete na parathesete lisi, exete ipervei to orio";
    }
  }
  //getter gia to orio tou student sto na psifisei solution
  public function getCountvotesolution() {
    $query = "SELECT countvotesolution FROM student WHERE student_id = '$student_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH) {
     $countvotesolution .= $row['countvotesolution'];
    }
    return $this->countvotesolution;
  }
  //elegxos an epitrepete ston student na psifisei solution, tou epitrepete ana session
  public function allow($countvotesolution,$student_id) {
    if ($countsolution > 0) {
      $countvotesolution = $countvotesolution - 1;
      $query = "UPDATE student SET countpost = '$countvotesolution'  WHERE student_id = '$student_id'";
      mysqli_query($db, $query);
      header("Location: vote_solution.php");
    } else {
      echo "Den epitrepete na psifisi alli lisi, exete ipervei to orio";
    }
  }

  //αυτή η φόρμα κανονικα 'επρεπε να μπεί σε μια php αλλά δν έχει υλοποιήθεί
                      <form method="post",action="writesubject.php">
                      <label for="subject_name">= subject_name:</label><br/>
                      <input type="text" subject_name="subject_name"><br/
                      <label for="subject_cat">= subject_cat:</label><br/>
                      <input type="text" subject_cat="subject_cat"><br/
                       <label for="subject_description">= subject_description:</label><br/>
                      <input type="text" subject_description="subject_descrition"><br/
                       <label for="subject_session">= subject_session:</label><br/>
                      <input type="text" subject_session="subject_session"><br/
                      <button type="submit" name="save">save</button>
                      </form>
                  </body>
                  </html>

  function write_solution() {
                      header('location:write_subject.php')
                    <?php
                      if(isset($_POST['save']))
                         {
                       $sql = "INSERT INTO solutions (solution_content , solution_date, solution_subject, solution_by)
                               VALUES ('".$_POST["solution_content"]."',GETDATE(),'".$_POST["solution_subject"]."',this->id,)";
                         }
                    ?>
                    <form method="post",action="writesolution.php">
                    <label for="solution_content">= solution_content:</label><br/>
                    <input type="text" solution_content="solution_content"><br/
                    <label for="solution_subject">= solution_subject:</label><br/>
                    <input type="text" solution_subject="solution_subject"><br/
                    <button type="submit" name="save">save</button>
                    </form>
                </body>
                </html>
  }

  function confirm() {

  }

  function submit_vote() {

  }

  function validate_vote() {

  }

  function insert_search_parameters() {

  }

  function select_result() {

  }
}

class Admin extends user {

  function __construct() {
    parent::__construct("name","surname","username","password","email","id")
  }

  function selection() {

  }
}

class Professor extends user {

  function __construct() {
    parent::__construct("name","surname","username","password","email","id")
  }

  function post_social_hour_subject() {

  }
}

class Moderator extends user {

  function __construct() {
    parent::__construct("name","surname","username","password","email","id")
  }

  function subject_is_appropriate() {
      //if-else
  }

  function subject_duplicate() {
    //if-else
  }
}
?>
