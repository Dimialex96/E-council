<?php
abstract class Text{

protected $id = 0 ;
protected $content = " ";
protected $date = GETDATE();
protected $by =_POST['username'];
protected $checked=0;

abstract protected function format();
abstract protected function insert();

  function __construct($id,$content,$date,$by,$checked) {
    $this->id = $id;
    $this->content = $_POST['content'];
    $this->date = $date;
    $this->by = $_POST['password'];
    $this->checked = $checked;
  }

}

public class Solutions {

 // private $solution_id = 0;
 //private $solution_content = " ";
 // private $solution_date = GETDATE();
  private $solution_subject = 0;
//private $solution_by = " ";
 // private $solution_vote_count = 0;
  
  public function __construct($id,$content,$date,$solution_subject,$by,$solution_vote_count) {
  
  parent::__construct($id,$content,$date,$by,$checked);
      
      this->$solution_subject = $_POST['solution_subject'];
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
