<?php
//session
class Session {

  $db = mysqli_connect('localhost','root','', 'ecounicldb'); //connection to database
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  protected $session_id = 0;
  protected $duration = 0;
  protected $start_date = date_create("2019-05-19");
  protected $end_date = date_create("2019-05-19");
  protected $extension = date_create("2019-05-19");
  protected $session_status = 0;
  protected $next_session_id = 0;
  $extension = $_POST['extension'];
  $end_date = $_POST['end_date'];

  public function __construct($duration,$start_date,$end_date,$activity)
  {
    $this->duration = $duration;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->session_status = $session_status;
    $this->session_id = $session_id;
  }
  public function update_session ($session_id,$extension,$end_date) //Χρονική επεκταση του τρεχων σεσσιον και ενημερωση του επομενου.
  {
    this->$end_date = date('Y-m-d', strtotime($end_date. " + {$extension} days "));
    this->$next_session_id = ($session_id + 1) % 3 ;  //ginete me mod3 i praksi dioti ta id ton session ine 3 kai otan to session_id einai 3 theloume na pigenei apo tin arxi
    $query = "UPDATE sessions SET end_date = '$end_date'  WHERE session_id = '$session_id'";
    mysqli_query($db, $query);
    $query = "UPDATE sessions SET start_date = '$end_date'  WHERE session_id = '$next_session_id'";
    mysqli_query($db, $query);
    die();
  }
  public function redirect_to_active_session () //anakatefthinsi sto energo session
  {
    $query = "SELECT session_id FROM sessions WHERE session_status = '1'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH)
    {
      $session_id .= $row['session_id'];
    }
    if ($session_id == 0) {
      header('forum_session.php');
    } elseif ($session_id == 1) {
      header('post_solution.php');
    } else {
      header('vote_solution.php');
    }
    die();
  }
  public function select_session ()   //emfanisi pliroforion gia ola ta session
  {
    $query = "SELECT * FROM sessions ";
    $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo ":session_id " . $row["session_id"].  "&nbsp&nbspSession&nbspName&nbsp" .$row['session_name'].
              "&nbsp&nbspStart&nbspDate&nbsp" .$row['start_date']."&nbsp&nbspEnd&nbspDate&nbsp" .$row['end_date']."&nbsp&nbspActivity&nbsp" .$row['activity_numbers']. "<br>" ;
            }
      } else {
            echo "0 results";
      }
  }
  public function session_status ()  // epistrefei to energo session
  {
     $query = "SELECT * FROM sessions WHERE session_status = '1' ";
     $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1) {
            while($row = mysqli_fetch_assoc($result)) {
              echo ":session_id " . $row["session_id"].  "&nbsp&nbspSession&nbspName&nbsp" .$row['session_name'].
              "&nbsp&nbspStart&nbspDate&nbsp" .$row['start_date']."&nbsp&nbspEnd&nbspDate&nbsp" .$row['end_date']."&nbsp&nbspActivity&nbsp" .$row['activity_numbers']. "<br>" ;
            }
      } else {
            echo "0 results";
      }
  }
//council_session
class Council_Session extends Session {
  private $solution_vote_count = 0;
  private $solution_id = 0;
  private $solution_content='';
  private $solution_date;
  private $solution_by;

  public function __construct($duration,$start_date,$end_date,$activity)
  {
    parent::__construct("duration","start_date","end_date","activity")
      this->$solution_vote_count = $_POST['solution_vote_count'];
      this->$solution_id = $_POST['solution_id'];
      this->$solution_content = $_POST['solution_content'];
      this->$solution_date = GETDATE();
      this->$solution_by = $_POST['username'];
      this->$solution_subject = $_POST['solution_subject'];
  }
  public function check_formatting_solution($solution_content) //elegxos ean to periexomeno tou subject einai mikrotero apo 500 xaraktires
  {
    $stringlength = strlen($solution_content);
    if ( $stringlength >= "400" ) {
      echo "Too many characters" ;
      header("Location: post_solution.php");
      die();
    } else {
        insert_solution($solution_content,$solution_date,$solution_subject,$solution_by);
        die();
    }
  }
  public function insert_solution($solution_content,$solution_date,$solution_subject,$solution_by) //eisagogi tou subject sto forum
  {
    $query = "INSERT INTO solutions (solution_content, solution_date, solution_subject, solution_by ) VALUES ('$solution_content','$solution_date','$solution_subject','$solution_by')";
    mysqli_query($db, $query);
  }
  public function update_solution_vote($solution_id) {  // enimerosi plithous psifon gia to kathe solution
    $query = "SELECT solution_vote_count FROM solutions WHERE solution_id = '$solution_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH)
    {
     $solution_vote_count .= $row['solution_vote_count'];
    }
    $solution_vote_count = $solution_vote_count + 1 ;
    $query = "UPDATE solution SET solution_vote_count = '$solution_vote_count'  WHERE solution_id = '$solution_id'";
    mysqli_query($db, $query);
 }
  public function select_solutions() {          //emfanisi ton 10 pio psifismenon subject kai emfanisi olon ton solution gia ta antistoixa subject
    $query = "SELECT subjects.subject_name , subjects.subject_description , solutions.solutions_content FROM subjects,solutions WHERE subjects.subject_id = solutions.solution_subject
    ORDER BY subjects.subject_vote_count LIMIT 10 , solutions.solution_id DESC ";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "subject_name: " . $row["subject_name"]. "<br>""subject_description" .$row['subject_description']. "&nbsp&nbspΛύση:&nbsp" .$row['solution_content'].
        "<br>" ;
       }
      } else {
        echo "0 results";
      }
  }
//forum_session
class Forum_Session extends Session {
  private $subject_description;
  private $subject_date;
  private $subject_session;
  private $subject_by;
  private $subject_cat;
  private $subject_name ;

  public function __construct($duration,$start_date,$end_date,$activity,$subject_description,$subject_date,$subject_session,$subject_by,$subject_cat,$subject_name)
  {
    parent::__construct("duration","start_date","end_date","activity");
    $this->$subject_description = $_POST['subject_description'];
    $this->$subject_date = GETDATE();
    $this->$subject_session= $_POST['subject_session'];
    $this->$subject_by = $_POST['username'];
    $this->$subject_cat = $_POST['category'];
    $this->$subject_name = = $_POST['subject_name'];
  }

public function check_formatting_subject($subject_description) //elegxos ean to periexomeno tou subject einai mikrotero apo 500 xaraktires
  {
    $stringlength = strlen($subject_description);
    if ( $stringlength >= "500" ) {
      echo "Too many characters" ;
      header("Location: post_subject.php");
      die();
    } else {
        insert_subject($subject_description,$subject_name,$subject_cat,$subject_by,$subject_session);
        die();
    }
  }
  public function insert_subject($subject_description,$subject_name,$subject_cat,$subject_by,$subject_session) //eisagogi tou subject sto forum
  {
    $query = "INSERT INTO subjects (subject_description, subject_date, subject_by, subject_name, subject_cat,subject_session ) VALUES ('$subject_description','$subject_date','$subject_by','$subject_name','$subject_cat','$subject_session')";
    mysqli_query($db, $query);
  }
}
?>
