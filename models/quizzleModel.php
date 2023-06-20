<?php
 
  require_once('../models/db.php');

  class quizzleModel extends Connect {

    function getQuestions(){
      
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $coursesAssoc = $this->select_as_assoc($this->get_connection(), 'courses');

      $questionsArr = array_values($questionsAssoc);
      $coursesArr = array_values($coursesAssoc);
      $selectedCourse=1;
      $questions=[];
      
      for($i = 0 ; $i < count($coursesArr); $i++){ 
        if(isset($_SESSION['course'])){
          if($_SESSION['course'] == $coursesArr[$i]['name']){
            $selectedCourse=$coursesArr[$i]['c_id'];
          } 
        } 
      }
      $temp=[];

      $empty = true;
      for($i = 0 ; $i < count($questionsArr); $i++){
        if($questionsArr[$i]['c_id']==$selectedCourse){
          $empty = false;
          $temp[0]= $questionsArr[$i]['q_id'];

          $temp[1]= $questionsArr[$i]['questions'];
          $temp[1]= htmlspecialchars_decode($temp[1], ENT_QUOTES);

          $temp[2]= $questionsArr[$i]['comment'];
          $temp[2]= htmlspecialchars_decode($temp[2], ENT_QUOTES);

          $temp[3]= $questionsArr[$i]['votes'];

          array_push($questions, $temp);  
        }
      }

      if($empty){
        header("Location:../views/week-select.php?empty=true");
      }

      file_put_contents("../JSON/questions.js", json_encode($questions));
    }

    function getAnswers(){
      $answersAssoc = $this->select_as_assoc($this->get_connection(), 'answers');
      $answersArr = array_values($answersAssoc);
      $temp = [];
      $answers=[];
      $coursesAssoc = $this->select_as_assoc($this->get_connection(), 'courses');
      $coursesArr = array_values($coursesAssoc);

      for($i = 0 ; $i < count($coursesArr); $i++){ 
        if(isset($_SESSION['course'])){
          if($_SESSION['course'] == $coursesArr[$i]['name']){
            $selectedCourse=$coursesArr[$i]['c_id'];
          } 
        } 
      }


      for($i=0 ; $i<sizeof($answersArr) ; $i++){
        if($answersArr[$i]['c_id']==$selectedCourse){
          $temp[0] = $answersArr[$i]['q_id'];
          $temp[1] = $answersArr[$i]['right_answer_index'];
          $temp[2] = $answersArr[$i]['answers'];
          $temp[2] = htmlspecialchars_decode($temp[2], ENT_QUOTES);
        
          array_push($answers, $temp);        
        }
      }
        
      file_put_contents("../JSON/pass.json", json_encode($answers));     
      return json_encode($answers);
    }

    function getScores(){
      $scoresAssoc = $this->select_as_assoc($this->get_connection(), 'scores');
      $scoresArr = array_values($scoresAssoc);
      $score=0;
      
      for($i = 0 ; $i < count($scoresArr); $i++){ 
        if(isset($_SESSION['c_id'])){
          if($_SESSION['c_id'] == $scoresArr[$i]['c_id'] && $_SESSION['u_id'] == $scoresArr[$i]['u_id']){
            $score=$scoresArr[$i]['score'];
            break;
          } 
        } 
      }
     
      file_put_contents("../JSON/scores.js", json_encode($score));
      return json_encode($score);
    }

    function getVotes(){
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $questionsArr = array_values($questionsAssoc);
      $votes=0;
      
      for($i = 0 ; $i < count($questionsArr); $i++){ 
        if(isset($_SESSION['q_id'])){
          if($_SESSION['q_id'] == $questionsArr[$i]['q_id']){
            $votes+=$questionsArr[$i]['votes'];
            break;
          } 
        } 
      }
     
      file_put_contents("../JSON/votes.js", json_encode($votes));
      return json_encode($votes);
    }

    function getIfVoted(){
      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      $votedArr = array_values($votedAssoc);
      $voted=[];

      $temp=[];
      for($i = 0 ; $i < count($votedArr); $i++){ 
          if($_SESSION['u_id'] == $votedArr[$i]['u_id']){

            $temp[0]= $votedArr[$i]['voted'];
            $temp[1]= $votedArr[$i]['q_id'];
          
            array_push($voted, $temp);  
          } 
      }
     
      file_put_contents("../JSON/voted.js", json_encode($voted));
      return json_encode($voted);
    }

    function getIfVotedComment(){
      $commentAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      $commentArr = array_values($commentAssoc);
      $voted=[];

      $temp=[];
      for($i = 0 ; $i < count($commentArr); $i++){ 
          if($_SESSION['u_id'] == $commentArr[$i]['u_id']){

            $temp[0]= $commentArr[$i]['voted'];
            $temp[1]= $commentArr[$i]['comm_id'];
          
            array_push($voted, $temp);  
          } 
      }
     
      file_put_contents("../JSON/votedComment.js", json_encode($voted));
      return json_encode($voted);
    }

    function setVoted(){
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $questionsArr = array_values($questionsAssoc);

      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      $votedArr = array_values($votedAssoc);

      $u_id = $_SESSION['u_id'];
      $qids=[];
          
      for($i = 0 ; $i < count($questionsArr); $i++){
        array_push($qids, $questionsArr[$i]['q_id']);
      }

      $addVoted = true;
      for($i = 0 ; $i < count($qids); $i++){
        $addVoted = true;

        
        $q_id = $qids[$i];
        $fields = "voted, q_id, u_id";
        $values = "'0', '$q_id', '$u_id'";

        for($i2 = 0 ; $i2 < count($votedArr); $i2++){

          if($qids[$i] == $votedArr[$i2]['q_id'] && $votedArr[$i2]['u_id'] == $u_id){
            $addVoted = false;
          }  
        }   

        if($addVoted == true){
          $this->insert($this->get_connection(), 'voted', $fields, $values);
        }
      }    
    }

    function setVotedComments(){
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $questionsArr = array_values($questionsAssoc);

      $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
      $commentsArr = array_values($commentsAssoc);

      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      $votedArr = array_values($votedAssoc);

      $u_id = $_SESSION['u_id'];
      $comm_ids=[];
          
      $addVoted = true;
      for($i = 0 ; $i < count($commentsArr); $i++){
        $addVoted = true;

        $comm_id = $commentsArr[$i]['comm_id'];
        $q_id = $commentsArr[$i]['q_id'];

        $fields = "voted, comm_id, u_id, q_id";
        $values = "'0', '$comm_id', '$u_id', '$q_id'";

        for($i2 = 0 ; $i2 < count($votedArr); $i2++){

          if($commentsArr[$i]['comm_id'] == $votedArr[$i2]['comm_id'] && $votedArr[$i2]['u_id'] == $u_id){
            $addVoted = false;
          }  
        }   

        if($addVoted == true){
          $this->insert($this->get_connection(), 'votedcomments', $fields, $values);
        }
      }    
    }

    function setVotePassing(){
      $votedCommentsAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      $votedCommentsArr = array_values($votedCommentsAssoc);

      $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
      $commentsArr = array_values($commentsAssoc);
      
      $temp=[];
      $pass=[];
      for($i = 0 ; $i < count($votedCommentsArr); $i++){
        $temp[0]= $votedCommentsArr[$i]['comm_id'];
        $temp[1]= $votedCommentsArr[$i]['voted'];
    
        for($i2 = 0 ; $i2 < count($commentsArr); $i2++){
          if($commentsArr[$i2]['comm_id']==$votedCommentsArr[$i]['comm_id']){
            $temp[2]= $commentsArr[$i2]['votes'];
          }
        }

        array_push($pass, $temp);  
        
      }

      file_put_contents("../JSON/commentsPass.js", json_encode($pass));
    }


  } 
?>