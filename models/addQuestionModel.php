<?php
  //ini_set('session.cache_limiter','public');
  //session_cache_limiter(false);
  //session_start();

  require('db.php');
  class addQuestionModel extends Connect {

    function addQuestionRow(){
      $c_id = $this->getCID();
      $question = $_POST["add-question"];
      $comment = $_POST["add-comment"];
      $questionField = 'questions, c_id, comment';
      
      $question = htmlspecialchars($question, ENT_QUOTES);
      $comment = htmlspecialchars($comment, ENT_QUOTES);

      $questionValues = "'$question', '$c_id', '$comment'";      
      $this->insert($this->get_connection(), 'questions', $questionField, $questionValues);
    }

    function addAnswerRow(){
      $c_id = $this->getCID();
      $q_id = $this->getQID();
      $option1  = $_POST["add-option1"];
      $option2  = $_POST["add-option2"];
      $option3  = $_POST["add-option3"];
      $rightAnswerIndex = $_POST["rightAnswer"];

      $option1 = htmlspecialchars($option1, ENT_QUOTES);
      $option2 = htmlspecialchars($option2, ENT_QUOTES);
      $option3 = htmlspecialchars($option3, ENT_QUOTES);

      $answerField1 = 'answers, right_answer_index, q_id, c_id';
      $answerValues1 = "'$option1', '$rightAnswerIndex', '$q_id', '$c_id'";

      $answerField2 = 'answers, right_answer_index, q_id, c_id';
      $answerValues2 = "'$option2', '$rightAnswerIndex', '$q_id', '$c_id'";

      $answerField3 = 'answers, right_answer_index, q_id, c_id';
      $answerValues3 = "'$option3', '$rightAnswerIndex', '$q_id', '$c_id'";

      $this->insert($this->get_connection(), 'answers', $answerField1, $answerValues1);
      $this->insert($this->get_connection(), 'answers', $answerField2, $answerValues2);
      $this->insert($this->get_connection(), 'answers', $answerField3, $answerValues3);
    }

    function incrementInvestment(){
      $usersAssoc = $this->select_as_assoc($this->get_connection(), 'users');
      $usersArr = array_values($usersAssoc);
      $u_id = $_SESSION['u_id'];

      for($i = 0; $i < count($usersArr) ; $i++){
        if($usersArr[$i]['u_id'] == $_SESSION['u_id']){
          $investments = $usersArr[$i]['investments'] + 1;
          $this->updateDB($this->get_connection(), 'users', 'investments', "$investments", 'u_id', "$u_id");      
        }
      }
    }

    function getCID(){
      $course = $_SESSION['course'];
      echo $course;
      $course_row = $this->select_row($this->get_connection(), 'courses', 'name', "'$course'");
      $c_id = $course_row['c_id'];
      
      return $c_id;
    }
    
    function getQID(){
      $q_id = $this->select_last($this->get_connection(), 'questions', 'q_id');

      return $q_id;
    }
  }
?>

