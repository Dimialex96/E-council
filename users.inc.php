<?php
// user
class user {
  protected $name;
  protected $surname;
  protected $username;
  protected $password;
  protected $email;
  protected $id;
  protected $date;
  protected $level;

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
  
  function __construct($etos,$AM,$subject_by)
  {
    parent::__construct("name","surname","username","password","email","id","level")
  }
  function write_subject($subject_id,$subject_name,$subject_date,$subject_cat,$subject_by,$subject_description,$subject_session,$subject_checked,$subject_vote__count)
  {
    
    header('location:write_subject.php')
      
    <?php
      if(isset($_POST['save']))
         {
       $sql = "INSERT INTO subjects (subject_name,subject_date,subject_cat,subject_by,subject_description,subject_session)
               VALUES ('".$_POST["subject_name"]."',GETDATE(),'".$_POST["subject_cat"]."',this->id,'".$_POST["subject_description"]."','".$_POST["subject_session"])."')';
         }
    ?>
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
