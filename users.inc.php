<?php
// user
abstract class user {
  protected $name;
  protected $surname;
  protected $username;
  protected $password;
  protected $email;
  protected $id;
  protected $date;
  protected $level;

  abstract protected function allow();

  function __construct($name,$surname,$username,$password,$email,$id,$date,$level)
  {
    $this->name = $name;
    $this->surname = $surname;
    $this->password = $password;
    $this->username = $username;
    $this->email = $emal;
    $this->id = $id;
    $this->date = $date;
    $this->level = $level;
  }
}
//student
class Student extends user {
  protected $etos;
  protected $AM;
  protected $subject_by;
  protected $countpost;

  $db = mysqli_connect('localhost','root','', 'ecounicldb'); //connection to database
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  function __construct($etos,$AM,$subject_by)
  {
    parent::__construct("name","surname","username","password","email","id","level")
  }

  public function getCountpost() //epistrefei to orio gia post gia sigkekrimeno student
  {
    $query = "SELECT countpost FROM student WHERE student_id = '$student_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH)
    {
     $countpost .= $row['countpost'];
    }
    return $this->countpost;
  }

  public function allow($countpost,$student_id) // elegxos an epitrepete o student na parathesei thema
  {
    if ($countpost > 0) {
      $countpost = $countpost - 1;
      $query = "UPDATE student SET countpost = '$countpost'  WHERE student_id = '$student_id'";
      mysqli_query($db, $query);
      header("Location: post_subject.php");
    } else {
      echo "Den epitrepete na parathesete thema, exete ipervei to orio";
    }
  }

  public function getCountsolution() //epistrefei to orio gia solution gia sigkekrimeno student
  {
    $query = "SELECT countsolution FROM student WHERE student_id = '$student_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH)
    {
     $countsolution .= $row['countsolution'];
    }
    return $this->countsolution;
  }

  public function allow($countsolution,$student_id) // elegxos an epitrepete o student na parathesei lisi
  {
    if ($countsolution > 0) {
      $countsolution = $countsolution - 1;
      $query = "UPDATE student SET countpost = '$countsolution'  WHERE student_id = '$student_id'";
      mysqli_query($db, $query);
      header("Location: post_solution.php");
    } else {
      echo "Den epitrepete na parathesete lisi, exete ipervei to orio";
    }
  }

  public function getCountvotesolution() //epistrefei to orio gia vote solution gia sigkekrimeno student
  {
    $query = "SELECT countvotesolution FROM student WHERE student_id = '$student_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH)
    {
     $countvotesolution .= $row['countvotesolution'];
    }
    return $this->countvotesolution;
  }

  public function allow($countvotesolution,$student_id) // elegxos an epitrepete o student na psifisei lisi
  {
    if ($countsolution > 0) {
      $countvotesolution = $countvotesolution - 1;
      $query = "UPDATE student SET countpost = '$countvotesolution'  WHERE student_id = '$student_id'";
      mysqli_query($db, $query);
      header("Location: vote_solution.php");
    } else {
      echo "Den epitrepete na psifisi alli lisi, exete ipervei to orio";
    }
  }
















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
///αυτή η φόρμα κανονικα 'επρεπε να μπεί σε μια php αλλά δν έχει υλοποιήθεί/////

  }
  function write_solution()
  {
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
  function confirm()
  {

  }
  function submit_vote()
  {

  }
  function validate_vote()
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
  }
  function selection()
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
