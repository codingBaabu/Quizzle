<?php
  require('db.php');

class courseSelectModel extends Connect{

  function setCourse($coursePOST){
    $_SESSION['course'] = $coursePOST;
  
    $course = $_SESSION['course'];
    $courseRow = $this->select_row($this->get_connection(), 'courses', 'name', "'$course'");
    
    $_SESSION['c_id'] = $courseRow['c_id'];
    $_SESSION['courseName'] = $courseRow['fullName'];

    header('Location:../views/week-select.php');    
  }
}

?>