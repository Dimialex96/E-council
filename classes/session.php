<?php
  //connection to database
  $db = mysqli_connect('localhost','root','', 'ecounicldb');
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

public class Session {
  
  private $session_id = 0;
  private $session_name = " ";
  private $start_date = GETDATE();
  private $end_date = GETDATE();
  private $avtivity_numbers = 0;
  private $extension = date_create("2019-05-19"); //getdate();
  private $next_session_id = 0;

  public function __construct($session_id,$session_name,$start_date,$end_date,$activity_numbers,$extension,$next_session_id) {
    $this->session_id = $_POST['session_id'];
    $this->session_name = $session_name ; 
    $this->start_date = GETDATE();
    $this->end_date = $_POST['end_date'];
    $this->activity_numbers = $activity_numbers;
    $this->extension = $_POST['extension'];
    $this->next_session_id = $next_session_id;
  }
  //xroniki epektasi tou trexon session kai enimerosi tis start date tou epomenou
  public function updateSession($session_id,$extension,$end_date) {
    this->$end_date = date('Y-m-d', strtotime($end_date. " + {$extension} days "));
    this->$next_session_id = ($session_id + 1) % 3 ; //ginete me mod3 i praksi dioti ta id ton session ine 3 kai otan to session_id einai 3 theloume na pigenei apo tin arxi
    $query = "UPDATE sessions SET end_date = '$end_date'  WHERE session_id = '$session_id'";
    mysqli_query($db, $query);
    $query = "UPDATE sessions SET start_date = '$end_date'  WHERE session_id = '$next_session_id'";
    mysqli_query($db, $query);
    die();
  }
  //anakatefthinsi sto energo session
  public function redirectToActive() {
    $query = "SELECT session_id FROM sessions WHERE activity_numbers = '1'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH) {
      $session_id .= $row['session_id'];
    }
    if ($session_id == 0) {
      header("Location: Post_subject.php");
    } elseif ($session_id == 1) {
      header("Location: Post_solution.php");  
    } else {
      header("Location: Vote_solution.php");
    }
    die();
  }
  //emfanisi pliroforion gia ola ta session
  public function selectSession() {
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
  //epistrofi tou energou session
  public function sessionStatus() {
     $query = "SELECT * FROM sessions WHERE activity_numbers = '1' ";
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

public class Solutions {
  private $solution_id = 0;
  private $solution_content = " ";
  private $solution_date = GETDATE();
  private $solution_subject = 0;
  private $solution_by = " ";
  private $solution_vote_count = 0;

  public function __construct($solution_id,$solution_content,$solution_date,$solution_subject,$solution_by,$solution_vote_count) {
      this->$solution_id = $_POST['solution_id'];
      this->$solution_content = $_POST['solution_content'];
      this->$solution_date = GETDATE();
      this->$solution_subject = $_POST['solution_subject'];
      this->$solution_by = $_POST['username'];
      this->$solution_vote_count = $solution_vote_count;    
  }
  //elegxos periexomenou tou solution an teirei tis prodiagrafes(ligotero apo 500 xaraktires)
  public function formatSolution() {
    $stringlength = strlen($solution_content);
    if ( $stringlength >= 500 ) {
      echo "Too many characters" ;
      header("Location: Post_solution.php");
      die();
    } else {
        insert_solution($solution_content,$solution_date,$solution_subject,$solution_by);
        die();
    }
  }
  //eisagogi tou neou solution pou anaferete se sigkekrimeno subject
  public function insertSolution($solution_content,$solution_date,$solution_subject,$solution_by) {
    $query = "INSERT INTO solutions (solution_content, solution_date, solution_subject, solution_by ) VALUES ('$solution_content','$solution_date','$solution_subject','$solution_by')";
    mysqli_query($db, $query);
  }
  //diadikasia afksisis psifou enos solution otan afto psifizete
  public function updateSolutionVote($solution_id) {
    $query = "SELECT solution_vote_count FROM solutions WHERE solution_id = '$solution_id'";
    $results = mysqli_query($db, $query);
    while($row = mysql_fetch_array($results, MYSQL_BOTH) {
     $solution_vote_count .= $row['solution_vote_count'];
    }
    $solution_vote_count = $solution_vote_count + 1 ;
    $query = "UPDATE solution SET solution_vote_count = '$solution_vote_count'  WHERE solution_id = '$solution_id'";
    mysqli_query($db, $query);
  }
  //emfanisi ton 10  subject,mazi me ta solutions tous, me to megalitero plithos apo psifous
  public function selectSolutions() {
    $query = "SELECT subjects.subject_name , subjects.subject_description , solutions.solutions_content FROM subjects,solutions WHERE subjects.subject_id = solutions.solution_subject
    ORDER BY subjects.subject_vote_count LIMIT 10 , solutions.solution_id DESC ";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "subject_name: " . $row["subject_name"]. "<br>""subject_description" .$row['subject_description']. "&nbsp&nbspΛύση:&nbsp" .$row['solution_content']. "<br>" ;
       }
    } else {
      echo "0 results";
    }
  }

public class Subject {

  private $subject_description = " ";
  private $subject_date = GETDATE();
  private $subject_by = " ";
  private $subject_cat = " ";
  private $subject_name = " ";
  private $subject_id = 0;
  private $subject_checked = 0 ;
  private $subject_vote_count = 0;
  
  public function __construct($subject_description,$subject_date,$subject_by,$subject_cat,$subject_name,$subject_id,$subject_checked,$subject_vote_count) {
    $this->subject_description = $_POST['subject_description'];
    $this->subject_date = GETDATE();
    $this->subject_by = $_POST['username'];
    $this->subject_cat = $_POST['category'];
    $this->subject_name = $_POST['subject_name'];
    $this->subject_id = $subject_id;
    $this->subject_checked = $subject_checked;
    $this->subject_vote_count = $subject_vote_count;
  }
  //elegxos periexomenou tou subject an tirei tis prodiagrafes(ligotero apo 300 xaraktires)
  public function formatSubject() {
    $stringlength = strlen($subject_description);
    if ( $stringlength >= 300 ) {
      echo "Too many characters";
      header("Location: Post_subject.php");
      die();
    } else {
        insert_subject($subject_description,$subject_name,$subject_cat,$subject_by);
        die();
    }
  }
  //eisagogi tou neou subject sto pedio tou forum
  public function insertSubject($subject_description,$subject_name,$subject_cat,$subject_by) {
    $query = "INSERT INTO subjects (subject_description, subject_date, subject_by, subject_name, subject_cat) VALUES ('$subject_description','$subject_date','$subject_by','$subject_name','$subject_cat')";
    mysqli_query($db, $query);
  }
}
          
public class Comment {

  private $comment_id = 0;
  private $comment_content = " ";
  private $comment_date = GETDATE();
  private $comment_by = " ";
  private $comment_subject = 0;
  private $comment_checked = 0;

  public function __construct($comment_id,$comment_content,$comment_date,$comment_by,$comment_subject,$comment_checked) {
    $this->comment_id = $comment_id;
    $this->comment_content = $_POST['comment_content'];
    $this->comment_date = GETDATE();
    $this->comment_by = $_POST['username'];
    $this->comment_subject = $_POST['subject_id'];
    $this->comment_checked = = $comment_checked;
  }
  //elegxos periexomenou tou comment an teirei tis prodiagrafes(ligotero apo 200 xaraktires)
  public function formatComment() {
    $stringlength = strlen($comment_content);
    if ( $stringlength >= 200 ) {
      echo "Too many characters" ;
      header("Location: Post_comment.php");
      die();
    } else {
        insert_comment($comment_content,$comment_by,$comment_subject);
        die();
    }
  }
  //eisagogi tou neou comment sto pedio tou forum
  public function insertComment($comment_content,$comment_by,$comment_subject) {
    $query = "INSERT INTO comments (comment_content, comment_date, comment_by, comment_subject, comment_checked) VALUES ('$comment_content','$comment_date','$comment_by','$comment_subject','$comment_checked')";
    mysqli_query($db, $query);
  }
}
?>
